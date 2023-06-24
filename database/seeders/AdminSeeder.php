<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'          => 'Administrator',
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make(1),
            'photo'         => '',
            'token'         => 0,
            'created_at'    => date('Y-m-d H:i:s', time()),
            'updated_at'    => date('Y-m-d H:i:s', time()),
        ]);
    }
}
