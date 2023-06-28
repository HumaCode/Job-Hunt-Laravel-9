<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create(
            [
                'package_name'                  => 'Basic',
                'package_price'                 => '19',
                'package_days'                  => '7',
                'package_display_time'          => '1 Week',
                'total_allowed_jobs'            => '5',
                'total_allowed_featured_jobs'   => '0',
                'total_allowed_photos'          => '0',
                'total_allowed_videos'          => '0',
                'created_at'                    => date('Y-m-d H:i:s', time()),
                'updated_at'                    => date('Y-m-d H:i:s', time()),
            ]
        );

        Package::create(
            [
                'package_name'                  => 'Standart',
                'package_price'                 => '29',
                'package_days'                  => '30',
                'package_display_time'          => '1 Month',
                'total_allowed_jobs'            => '5',
                'total_allowed_featured_jobs'   => '2',
                'total_allowed_photos'          => '2',
                'total_allowed_videos'          => '2',
                'created_at'                    => date('Y-m-d H:i:s', time()),
                'updated_at'                    => date('Y-m-d H:i:s', time()),
            ]
        );

        Package::create(
            [
                'package_name'                  => 'Gold',
                'package_price'                 => '49',
                'package_days'                  => '90',
                'package_display_time'          => '3 Month',
                'total_allowed_jobs'            => '-1',
                'total_allowed_featured_jobs'   => '15',
                'total_allowed_photos'          => '10',
                'total_allowed_videos'          => '10',
                'created_at'                    => date('Y-m-d H:i:s', time()),
                'updated_at'                    => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
