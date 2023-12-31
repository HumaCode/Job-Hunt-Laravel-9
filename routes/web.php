<?php

use App\Http\Controllers\Admin\AdminBlogPageController;
use App\Http\Controllers\Admin\AdminCompanyIndustryController;
use App\Http\Controllers\Admin\AdminCompanyLocationController;
use App\Http\Controllers\Admin\AdminCompanySizeController;
use App\Http\Controllers\Admin\AdminContactPageController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminFaqPageController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminJobCategory;
use App\Http\Controllers\Admin\AdminJobCategoryPageController;
use App\Http\Controllers\Admin\AdminJobExperienceController;
use App\Http\Controllers\Admin\AdminJobGenderController;
use App\Http\Controllers\Admin\AdminJobLocationController;
use App\Http\Controllers\Admin\AdminJobSalaryRangeController;
use App\Http\Controllers\Admin\AdminJobTypeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminOtherPageController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPricingPageController;
use App\Http\Controllers\Admin\AdminPrivacyPageController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminTermPageController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminWhyChooseController;
use App\Http\Controllers\Candidate\CandidateController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\ForgetPasswordController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\JobCategoryController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\PricingController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\SignupController;
use App\Http\Controllers\Front\TermsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/terms', [TermsController::class, 'index'])->name('terms');
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/job-categories', [JobCategoryController::class, 'category'])->name('job_categories');
Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('/blog/single/{slug}', [PostController::class, 'detail'])->name('blog_single');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact_submit');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

// signup company
Route::get('/create-account', [SignupController::class, 'index'])->name('signup');
Route::post('/company-signup-submit', [SignupController::class, 'company_signup_submit'])->name('company_signup_submit');
Route::get('/company-signup-verify/{token}/{email}', [SignupController::class, 'company_signup_verify'])->name('company_signup_verify');

// login company
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/company-login-submit', [LoginController::class, 'company_login_submit'])->name('company_login_submit');

// reset company password
Route::get('/forget-password/company', [ForgetPasswordController::class, 'company_forget_password'])->name('company_forget_password');
Route::post('/forget-password/company/submit', [ForgetPasswordController::class, 'company_forget_password_submit'])->name('company_forget_password_submit');
Route::get('/reset-password/company/{token}/{email}', [ForgetPasswordController::class, 'company_reset_password'])->name('company_reset_password');
Route::post('/reset-password/company/submit', [ForgetPasswordController::class, 'company_reset_password_submit'])->name('company_reset_password_submit');



// signup candidate
Route::post('/candidate-login-submit', [LoginController::class, 'candidate_login_submit'])->name('candidate_login_submit');
Route::post('/candidate-signup-submit', [SignupController::class, 'candidate_signup_submit'])->name('candidate_signup_submit');
Route::get('/candidate-signup-verify/{token}/{email}', [SignupController::class, 'candidate_signup_verify'])->name('candidate_signup_verify');

// reset candidate password
Route::get('/forget-password/candidate', [ForgetPasswordController::class, 'candidate_forget_password'])->name('candidate_forget_password');
Route::post('/forget-password/candidate/submit', [ForgetPasswordController::class, 'candidate_forget_password_submit'])->name('candidate_forget_password_submit');
Route::get('/reset-password/candidate/{token}/{email}', [ForgetPasswordController::class, 'candidate_reset_password'])->name('candidate_reset_password');
Route::post('/reset-password/candidate/submit', [ForgetPasswordController::class, 'candidate_reset_password_submit'])->name('candidate_reset_password_submit');


// auth candidate
Route::middleware(['candidate:candidate'])->group(function () {
    Route::get('/candidate/dashboard', [CandidateController::class, 'dashboard'])->name('candidate_dashboard');
    Route::get('/candidate/logout', [LoginController::class, 'candidate_logout'])->name('candidate_logout');
});

// route company
Route::middleware(['company:company'])->group(function () {
    Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company_dashboard');
    Route::get('/company/make-payment', [CompanyController::class, 'make_payment'])->name('company_make_payment');
    Route::get('/company/logout', [LoginController::class, 'company_logout'])->name('company_logout');

    // order
    Route::get('/company/orders', [CompanyController::class, 'orders'])->name('company_orders');

    // payment paypal
    Route::post('/company/paypal/payment', [CompanyController::class, 'paypal'])->name('company_paypal');
    Route::get('/company/paypal/success', [CompanyController::class, 'paypal_success'])->name('company_paypal_success');
    Route::get('/company/paypal/cancel', [CompanyController::class, 'paypal_cancel'])->name('company_paypal_cancel');

    // payment stripe
    Route::post('/company/stripe/payment', [CompanyController::class, 'stripe'])->name('company_stripe');
    Route::get('/company/stripe/success', [CompanyController::class, 'stripe_success'])->name('company_stripe_success');
    Route::get('/company/stripe/cancel', [CompanyController::class, 'stripe_cancel'])->name('company_stripe_cancel');

    // profil
    Route::get('/company/edit-profile', [CompanyController::class, 'edit_profile'])->name('company_edit_profile');
    Route::post('/company/edit-profile/update', [CompanyController::class, 'edit_profile_update'])->name('company_edit_profile_update');

    // company photo
    Route::get('/company/photos', [CompanyController::class, 'photos'])->name('company_photos');
    Route::post('/company/photos/submit', [CompanyController::class, 'photos_submit'])->name('company_photos_submit');
    Route::get('/company/photos/delete/{id}', [CompanyController::class, 'photos_delete'])->name('company_photos_delete');
});

// auth admin panel
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('forget-password-submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('reset_password_submit');


Route::middleware(['admin:admin'])->group(function () {

    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');

    // home page
    Route::get('/admin/home-page', [AdminHomePageController::class, 'index'])->name('admin_home_page');
    Route::post('/admin/home-page/update', [AdminHomePageController::class, 'update'])->name('admin_home_page_update');

    // faq
    Route::get('/admin/faq-page', [AdminFaqPageController::class, 'index'])->name('admin_faq_page');
    Route::post('/admin/faq-page/update', [AdminFaqPageController::class, 'update'])->name('admin_faq_page_update');

    // blog
    Route::get('/admin/blog-page', [AdminBlogPageController::class, 'index'])->name('admin_blog_page');
    Route::post('/admin/blog-page/update', [AdminBlogPageController::class, 'update'])->name('admin_blog_page_update');

    // term
    Route::get('/admin/term-page', [AdminTermPageController::class, 'index'])->name('admin_term_page');
    Route::post('/admin/term-page/update', [AdminTermPageController::class, 'update'])->name('admin_term_page_update');

    // privacy
    Route::get('/admin/privacy-page', [AdminPrivacyPageController::class, 'index'])->name('admin_privacy_page');
    Route::post('/admin/privacy-page/update', [AdminPrivacyPageController::class, 'update'])->name('admin_privacy_page_update');

    // contact
    Route::get('/admin/contact-page', [AdminContactPageController::class, 'index'])->name('admin_contact_page');
    Route::post('/admin/contact-page/update', [AdminContactPageController::class, 'update'])->name('admin_contact_page_update');

    // job category
    Route::get('/admin/job-category-page', [AdminJobCategoryPageController::class, 'index'])->name('admin_job_category_page');
    Route::post('/admin/job-category-page/update', [AdminJobCategoryPageController::class, 'update'])->name('admin_job_category_page_update');

    // pricing item
    Route::get('/admin/pricing-page', [AdminPricingPageController::class, 'index'])->name('admin_pricing_page');
    Route::post('/admin/pricing-page/update', [AdminPricingPageController::class, 'update'])->name('admin_pricing_page_update');

    // others
    Route::get('/admin/other-page', [AdminOtherPageController::class, 'index'])->name('admin_other_page');
    Route::post('/admin/other-page/update', [AdminOtherPageController::class, 'update'])->name('admin_other_page_update');

    // category
    Route::get('/admin/job-category/view', [AdminJobCategory::class, 'index'])->name('admin_job_category');
    Route::get('/admin/job-category/create', [AdminJobCategory::class, 'create'])->name('admin_job_category_create');
    Route::post('/admin/job-category/store', [AdminJobCategory::class, 'store'])->name('admin_job_category_store');
    Route::get('/admin/job-category/edit/{id}', [AdminJobCategory::class, 'edit'])->name('admin_job_category_edit');
    Route::post('/admin/job-category/update/{id}', [AdminJobCategory::class, 'update'])->name('admin_job_category_update');
    Route::get('/admin/job-category/delete/{id}', [AdminJobCategory::class, 'delete'])->name('admin_job_category_delete');

    // job location
    Route::get('/admin/job-location/view', [AdminJobLocationController::class, 'index'])->name('admin_job_location');
    Route::get('/admin/job-location/create', [AdminJobLocationController::class, 'create'])->name('admin_job_location_create');
    Route::post('/admin/job-location/store', [AdminJobLocationController::class, 'store'])->name('admin_job_location_store');
    Route::get('/admin/job-location/edit/{id}', [AdminJobLocationController::class, 'edit'])->name('admin_job_location_edit');
    Route::post('/admin/job-location/update/{id}', [AdminJobLocationController::class, 'update'])->name('admin_job_location_update');
    Route::get('/admin/job-location/delete/{id}', [AdminJobLocationController::class, 'delete'])->name('admin_job_location_delete');

    // job type
    Route::get('/admin/job-type/view', [AdminJobTypeController::class, 'index'])->name('admin_job_type');
    Route::get('/admin/job-type/create', [AdminJobTypeController::class, 'create'])->name('admin_job_type_create');
    Route::post('/admin/job-type/store', [AdminJobTypeController::class, 'store'])->name('admin_job_type_store');
    Route::get('/admin/job-type/edit/{id}', [AdminJobTypeController::class, 'edit'])->name('admin_job_type_edit');
    Route::post('/admin/job-type/update/{id}', [AdminJobTypeController::class, 'update'])->name('admin_job_type_update');
    Route::get('/admin/job-type/delete/{id}', [AdminJobTypeController::class, 'delete'])->name('admin_job_type_delete');

    // job experience
    Route::get('/admin/job-experience/view', [AdminJobExperienceController::class, 'index'])->name('admin_job_experience');
    Route::get('/admin/job-experience/create', [AdminJobExperienceController::class, 'create'])->name('admin_job_experience_create');
    Route::post('/admin/job-experience/store', [AdminJobExperienceController::class, 'store'])->name('admin_job_experience_store');
    Route::get('/admin/job-experience/edit/{id}', [AdminJobExperienceController::class, 'edit'])->name('admin_job_experience_edit');
    Route::post('/admin/job-experience/update/{id}', [AdminJobExperienceController::class, 'update'])->name('admin_job_experience_update');
    Route::get('/admin/job-experience/delete/{id}', [AdminJobExperienceController::class, 'delete'])->name('admin_job_experience_delete');

    // job genders
    Route::get('/admin/job-gender/view', [AdminJobGenderController::class, 'index'])->name('admin_job_gender');
    Route::get('/admin/job-gender/create', [AdminJobGenderController::class, 'create'])->name('admin_job_gender_create');
    Route::post('/admin/job-gender/store', [AdminJobGenderController::class, 'store'])->name('admin_job_gender_store');
    Route::get('/admin/job-gender/edit/{id}', [AdminJobGenderController::class, 'edit'])->name('admin_job_gender_edit');
    Route::post('/admin/job-gender/update/{id}', [AdminJobGenderController::class, 'update'])->name('admin_job_gender_update');
    Route::get('/admin/job-gender/delete/{id}', [AdminJobGenderController::class, 'delete'])->name('admin_job_gender_delete');

    // job salary range
    Route::get('/admin/job-salary-range/view', [AdminJobSalaryRangeController::class, 'index'])->name('admin_job_salary_range');
    Route::get('/admin/job-salary-range/create', [AdminJobSalaryRangeController::class, 'create'])->name('admin_job_salary_range_create');
    Route::post('/admin/job-salary-range/store', [AdminJobSalaryRangeController::class, 'store'])->name('admin_job_salary_range_store');
    Route::get('/admin/job-salary-range/edit/{id}', [AdminJobSalaryRangeController::class, 'edit'])->name('admin_job_salary_range_edit');
    Route::post('/admin/job-salary-range/update/{id}', [AdminJobSalaryRangeController::class, 'update'])->name('admin_job_salary_range_update');
    Route::get('/admin/job-salary-range/delete/{id}', [AdminJobSalaryRangeController::class, 'delete'])->name('admin_job_salary_range_delete');

    // job company location
    Route::get('/admin/company-location/view', [AdminCompanyLocationController::class, 'index'])->name('admin_company_location');
    Route::get('/admin/company-location/create', [AdminCompanyLocationController::class, 'create'])->name('admin_company_location_create');
    Route::post('/admin/company-location/store', [AdminCompanyLocationController::class, 'store'])->name('admin_company_location_store');
    Route::get('/admin/company-location/edit/{id}', [AdminCompanyLocationController::class, 'edit'])->name('admin_company_location_edit');
    Route::post('/admin/company-location/update/{id}', [AdminCompanyLocationController::class, 'update'])->name('admin_company_location_update');
    Route::get('/admin/company-location/delete/{id}', [AdminCompanyLocationController::class, 'delete'])->name('admin_company_location_delete');

    // job company industry
    Route::get('/admin/company-industry/view', [AdminCompanyIndustryController::class, 'index'])->name('admin_company_industry');
    Route::get('/admin/company-industry/create', [AdminCompanyIndustryController::class, 'create'])->name('admin_company_industry_create');
    Route::post('/admin/company-industry/store', [AdminCompanyIndustryController::class, 'store'])->name('admin_company_industry_store');
    Route::get('/admin/company-industry/edit/{id}', [AdminCompanyIndustryController::class, 'edit'])->name('admin_company_industry_edit');
    Route::post('/admin/company-industry/update/{id}', [AdminCompanyIndustryController::class, 'update'])->name('admin_company_industry_update');
    Route::get('/admin/company-industry/delete/{id}', [AdminCompanyIndustryController::class, 'delete'])->name('admin_company_industry_delete');

    // job company size
    Route::get('/admin/company-size/view', [AdminCompanySizeController::class, 'index'])->name('admin_company_size');
    Route::get('/admin/company-size/create', [AdminCompanySizeController::class, 'create'])->name('admin_company_size_create');
    Route::post('/admin/company-size/store', [AdminCompanySizeController::class, 'store'])->name('admin_company_size_store');
    Route::get('/admin/company-size/edit/{id}', [AdminCompanySizeController::class, 'edit'])->name('admin_company_size_edit');
    Route::post('/admin/company-size/update/{id}', [AdminCompanySizeController::class, 'update'])->name('admin_company_size_update');
    Route::get('/admin/company-size/delete/{id}', [AdminCompanySizeController::class, 'delete'])->name('admin_company_size_delete');

    // why choose
    Route::get('/admin/why-choose/view', [AdminWhyChooseController::class, 'index'])->name('admin_why_choose_item');
    Route::get('/admin/why-choose/create', [AdminWhyChooseController::class, 'create'])->name('admin_why_choose_item_create');
    Route::post('/admin/why-choose/store', [AdminWhyChooseController::class, 'store'])->name('admin_why_choose_item_store');
    Route::get('/admin/why-choose/edit/{id}', [AdminWhyChooseController::class, 'edit'])->name('admin_why_choose_item_edit');
    Route::post('/admin/why-choose/update/{id}', [AdminWhyChooseController::class, 'update'])->name('admin_why_choose_item_update');
    Route::get('/admin/why-choose/delete/{id}', [AdminWhyChooseController::class, 'delete'])->name('admin_why_choose_item_delete');

    // testimonial
    Route::get('/admin/testimonial/view', [AdminTestimonialController::class, 'index'])->name('admin_testimonial');
    Route::get('/admin/testimonial/create', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create');
    Route::post('/admin/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
    Route::get('/admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('/admin/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
    Route::get('/admin/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');

    // post
    Route::get('/admin/post/view', [AdminPostController::class, 'index'])->name('admin_post');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin_post_create');
    Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
    Route::get('/admin/post/edit/{slug}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('/admin/post/update/{slug}', [AdminPostController::class, 'update'])->name('admin_post_update');
    Route::get('/admin/post/delete/{slug}', [AdminPostController::class, 'delete'])->name('admin_post_delete');
    Route::get('/admin/post/checkSlug', [AdminPostController::class, 'checkSlug']);

    // faq
    Route::get('/admin/faq/view', [AdminFaqController::class, 'index'])->name('admin_faq');
    Route::get('/admin/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
    Route::post('/admin/faq/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
    Route::get('/admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('/admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
    Route::get('/admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');

    // package
    Route::get('/admin/package/view', [AdminPackageController::class, 'index'])->name('admin_package');
    Route::get('/admin/package/create', [AdminPackageController::class, 'create'])->name('admin_package_create');
    Route::post('/admin/package/store', [AdminPackageController::class, 'store'])->name('admin_package_store');
    Route::get('/admin/package/edit/{id}', [AdminPackageController::class, 'edit'])->name('admin_package_edit');
    Route::post('/admin/package/update/{id}', [AdminPackageController::class, 'update'])->name('admin_package_update');
    Route::get('/admin/package/delete/{id}', [AdminPackageController::class, 'delete'])->name('admin_package_delete');


    // Profil
    Route::get('/admin/admin-profile', [AdminProfileController::class, 'admin_profile'])->name('admin_profile');
    Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');
});
