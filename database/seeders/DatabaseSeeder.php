<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            AdminSeeder::class,
            AdminHomePageSeeder::class,
            WhyChooseItemSeeder::class,
            TestimonialSeeder::class,
            PostsSeeder::class,
            PageFaqItemSeeder::class,
            PageBlogItemSeeder::class,
            FaqsSeeder::class,
            TermsSeeder::class,
            PagePrivacyItemSeeder::class,
            PageContactItemSeeder::class,
            PageJobCategoryItemSeeder::class,
            PackageSeeder::class,
            PagePricingItemSeeder::class,
            PageOtherItemSeeder::class,
            JobLocationSeeder::class,
            JobTypeSeeder::class,
            JobExperienceSeeder::class,
            JobGenderSeeder::class,
            JobSalaryRangeSeeder::class,
            CompanyLocationSeeder::class,
            CompanyIndustrySeeder::class,
        ]);
    }
}
