<?php

namespace Database\Seeders;

use App\Models\PageOtherItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageOtherItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        PageOtherItem::create(
            [
                'login_page_heading'                    => 'Login',
                'signup_page_heading'                   => 'Signup',
                'forget_password_page_heading'          => 'Forget Password',
                'created_at'                            => date('Y-m-d H:i:s', time()),
                'updated_at'                            => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
