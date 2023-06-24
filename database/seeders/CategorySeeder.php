<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobCategory::create(
            [
                'name' => 'Accounting',
                'icon' => '<i class="fas fa-landmark fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );

        JobCategory::create(
            [
                'name' => 'Engineering',
                'icon' => '<i class="fas fa-magic fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );

        JobCategory::create(
            [
                'name' => 'Medical',
                'icon' => '<i class="fas fa-stethoscope fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );

        JobCategory::create(
            [
                'name' => 'Production',
                'icon' => '<i class="fas fa-sitemap fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Data Entry',
                'icon' => '<i class="fas fa-share-alt fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Marketing',
                'icon' => '<i class="fas fa-bullhorn fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Technician',
                'icon' => '<i class="fas fa-street-view fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Security',
                'icon' => '<i class="fas fa-lock fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Garments',
                'icon' => '<i class="fas fa-users fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Telecommunication',
                'icon' => '<i class="fas fa-vector-square fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Education',
                'icon' => '<i class="fas fa-user-graduate fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Commercial',
                'icon' => '<i class="fas fa-suitcase fs-2"></i>',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
