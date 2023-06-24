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
                'icon' => 'fas fa-landmark',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );

        JobCategory::create(
            [
                'name' => 'Engineering',
                'icon' => 'fas fa-magic',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );

        JobCategory::create(
            [
                'name' => 'Medical',
                'icon' => 'fas fa-stethoscope',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );

        JobCategory::create(
            [
                'name' => 'Production',
                'icon' => 'fas fa-sitemap',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Data Entry',
                'icon' => 'fas fa-share-alt',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Marketing',
                'icon' => 'fas fa-bullhorn',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Technician',
                'icon' => 'fas fa-street-view',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Security',
                'icon' => 'fas fa-lock',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Garments',
                'icon' => 'fas fa-users',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Telecommunication',
                'icon' => 'fas fa-vector-square',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Education',
                'icon' => 'fas fa-user-graduate',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );

        JobCategory::create(
            [
                'name' => 'Commercial',
                'icon' => 'fas fa-suitcase',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
