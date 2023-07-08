<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CompanyController extends Controller
{
    public function dashboard()
    {
        return view('company.dashboard');
    }

    public function make_payment()
    {
        $current_plan   = Order::with('rPackage')->where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();
        $packages       = Package::get();

        return view('company.make_payment', compact('current_plan', 'packages'));
    }

    public function paypal(Request $request)
    {
        $request->validate(
            [
                'package_id' => 'required',
            ],
            [
                'package_id.required' => 'Please choose package.!',
            ]
        );

        $single_package_data = Package::where('id', $request->package_id)->first();


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('company_paypal_success'),
                "cancel_url" => route('company_paypal_cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $single_package_data->package_price
                    ]
                ]
            ]
        ]);

        //dd($response);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {

                    session()->put('package_id', $single_package_data->id);
                    session()->put('package_price', $single_package_data->package_price);
                    session()->put('package_days', $single_package_data->package_days);

                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function paypal_success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        //dd($response);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $data['currently_active'] = 0;
            Order::where('company_id', Auth::guard()->user()->id)->update($data);

            $obj = new Order();
            $obj->company_id        = Auth::guard()->user()->id;
            $obj->package_id        = session()->get('package_id');
            $obj->order_no          = time();
            $obj->paid_amount       = session()->get('package_price');
            $obj->payment_method    = 'PayPal';
            $obj->start_date        = date('Y-m-d');
            $days = session()->get('package_days');
            $obj->expire_date       = date("Y-m-d", strtotime("+$days days"));
            $obj->currently_active  = 1;
            $obj->save();

            session()->forget('package_id');
            session()->forget('package_price');
            session()->forget('package_days');

            return redirect()->route('company_make_payment')->with('success', 'Payment is successfully');
        } else {
            return redirect()->route('company_paypal_cancel')->with('info', 'Payment is cancelled');
        }
    }

    public function paypal_cancel()
    {
        return redirect()->route('company_make_payment')->with('error', 'Payment is cancelled');
    }

    public function stripe(Request $request)
    {
        $request->validate(
            [
                'package_id' => 'required',
            ],
            [
                'package_id.required' => 'Please choose package.!',
            ]
        );

        $single_package_data = Package::where('id', $request->package_id)->first();

        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));
        $response = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $single_package_data->package_name,
                        ],
                        'unit_amount' => $single_package_data->package_price * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('company_stripe_success'),
            'cancel_url' => route('company_stripe_cancel'),
        ]);

        session()->put('package_id', $single_package_data->id);
        session()->put('package_price', $single_package_data->package_price);
        session()->put('package_days', $single_package_data->package_days);

        return redirect()->away($response->url);
    }

    public function stripe_success()
    {

        $data['currently_active'] = 0;
        Order::where('company_id', Auth::guard()->user()->id)->update($data);

        $obj = new Order();
        $obj->company_id        = Auth::guard()->user()->id;
        $obj->package_id        = session()->get('package_id');
        $obj->order_no          = time();
        $obj->paid_amount       = session()->get('package_price');
        $obj->payment_method    = 'Stripe';
        $obj->start_date        = date('Y-m-d');
        $days = session()->get('package_days');
        $obj->expire_date       = date("Y-m-d", strtotime("+$days days"));
        $obj->currently_active  = 1;
        $obj->save();

        session()->forget('package_id');
        session()->forget('package_price');
        session()->forget('package_days');

        return redirect()->route('company_make_payment')->with('success', 'Payment is successfully');
    }

    public function stripe_cancel()
    {
        return redirect()->route('company_make_payment')->with('error', 'Payment is cancelled');
    }
}
