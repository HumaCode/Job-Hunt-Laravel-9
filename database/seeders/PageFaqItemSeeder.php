<?php

namespace Database\Seeders;

use App\Models\PageFaqItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageFaqItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageFaqItem::create(
            [
                'heading'           => 'FAQ',
                'title'             => 'FAQ',
                'meta_description'  => 'FAQ',
                'created_at'        => date('Y-m-d H:i:s', time()),
                'updated_at'        => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
