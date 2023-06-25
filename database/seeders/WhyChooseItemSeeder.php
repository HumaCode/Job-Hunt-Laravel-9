<?php

namespace Database\Seeders;

use App\Models\WhyChooseItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyChooseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WhyChooseItem::create(
            [
                'icon'          => 'fas fa-briefcase',
                'heading'       => 'Quick Apply',
                'text'          => 'You can just create your account in our website and apply for desired job very quickly.',
                'created_at'    => date('Y-m-d H:i:s', time()),
                'updated_at'    => date('Y-m-d H:i:s', time()),
            ]
        );

        WhyChooseItem::create(
            [
                'icon'          => 'fas fa-search',
                'heading'       => 'Search Tool',
                'text'          => 'We provide a perfect and advanced search tool for job seekers, employers or companies.',
                'created_at'    => date('Y-m-d H:i:s', time()),
                'updated_at'    => date('Y-m-d H:i:s', time()),
            ]
        );

        WhyChooseItem::create(
            [
                'icon'          => 'fas fa-share-alt',
                'heading'       => 'Best Companies',
                'text'          => 'The best and reputed worldwide companies registered here and so you will get the quality jobs.',
                'created_at'    => date('Y-m-d H:i:s', time()),
                'updated_at'    => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
