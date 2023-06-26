<?php

namespace Database\Seeders;

use App\Models\PageBlogItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageBlogItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageBlogItem::create(
            [
                'heading'           => 'Blog',
                'title'             => 'Blog',
                'meta_description'  => 'Blog',
                'created_at'        => date('Y-m-d H:i:s', time()),
                'updated_at'        => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
