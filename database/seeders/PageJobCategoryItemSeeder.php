<?php

namespace Database\Seeders;

use App\Models\PageJobCategoryItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageJobCategoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageJobCategoryItem::create(
            [
                'heading'           => 'Job Categories',
                'title'             => 'Job Categories',
                'meta_description'  => 'Job Categories',
                'created_at'        => date('Y-m-d H:i:s', time()),
                'updated_at'        => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
