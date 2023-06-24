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
            'created_at'                => date('Y-m-d H:i:s', time()),
            'updated_at'                => date('Y-m-d H:i:s', time()),
        ]);
    }
}
