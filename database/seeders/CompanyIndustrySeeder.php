<?php

namespace Database\Seeders;

use App\Models\CompanyIndustry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyIndustry::create(
            [
                'name' => 'Google',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );

        CompanyIndustry::create(
            [
                'name' => 'Amplify',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );

        CompanyIndustry::create(
            [
                'name' => 'Gimpo',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );

        CompanyIndustry::create(
            [
                'name' => 'Kite Solution',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );

        CompanyIndustry::create(
            [
                'name' => 'ABC Media',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );

        CompanyIndustry::create(
            [
                'name' => 'Tingshu Limited',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        );
    }
}
