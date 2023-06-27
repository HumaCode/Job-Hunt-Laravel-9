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
                'map_code'          => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.9619217966912!2d109.58063648032793!3d-7.027183018673381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e701f12383c773b%3A0xac910543c8268034!2sTravel%20Kajen%20Solo!5e0!3m2!1sid!2sid!4v1687882073553!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'title'             => 'Contact',
                'meta_description'  => 'Contact',
                'created_at'        => date('Y-m-d H:i:s', time()),
                'updated_at'        => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
