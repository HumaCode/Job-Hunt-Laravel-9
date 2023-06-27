<?php

namespace Database\Seeders;

use App\Models\PagePrivacyItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagePrivacyItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PagePrivacyItem::create(
            [
                'heading'           => 'Privacy Policy',
                'content'           => 'Content Here',
                'title'             => 'Privacy Policy',
                'meta_description'  => 'Privacy Policy',
                'created_at'        => date('Y-m-d H:i:s', time()),
                'updated_at'        => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
