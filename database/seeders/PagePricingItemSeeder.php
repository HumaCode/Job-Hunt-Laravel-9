<?php

namespace Database\Seeders;

use App\Models\PagePricingItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagePricingItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PagePricingItem::create(
            [
                'heading'           => 'Pricing',
                'title'             => 'Pricing',
                'meta_description'  => 'Pricing',
                'created_at'        => date('Y-m-d H:i:s', time()),
                'updated_at'        => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
