<?php

namespace Database\Seeders;

use App\Models\PageHomeItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminHomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageHomeItem::create([
            'heading'                   => 'Find Your Desired Job',
            'text'                      => 'Search the best, perfect and suitable jobs that matches your skills in your expertise area.',
            'job_title'                 => 'Job Title',
            'job_category'              => 'Job Category',
            'job_location'              => 'Job Location',
            'search'                    => 'Search',
            'background'                => '',
            'job_category_heading'      => 'Job Categories',
            'job_category_subheading'   => 'Get the list of all the popular job categories here',
            'job_category_status'       => 'Show',
            'why_choose_heading'        => 'Why Choose Us',
            'why_choose_subheading'     => 'Our Methods to help you build your career in future',
            // 'why_choose_background'     => '',
            'why_choose_status'         => 'Show',
            'feature_jobs_heading'      => 'Featured Jobs',
            'feature_jobs_subheading'   => 'Find the awesome jobs that matches your skill',
            'feature_jobs_status'       => 'Show',
            'created_at'                => date('Y-m-d H:i:s', time()),
            'updated_at'                => date('Y-m-d H:i:s', time()),
        ]);
    }
}
