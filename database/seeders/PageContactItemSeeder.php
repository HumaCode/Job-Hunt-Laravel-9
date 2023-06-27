<?php

namespace Database\Seeders;

use App\Models\PageContactItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageContactItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageContactItem::create(
            [
                'heading'           => 'Contact',
                'map_code'          => 'map_code',
                'meta_description'  => 'Contact',
                'created_at'        => date('Y-m-d H:i:s', time()),
                'updated_at'        => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
