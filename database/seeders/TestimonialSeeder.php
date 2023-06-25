<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::create(
            [
                'name'          => 'Robert Krol',
                'designation'   => 'CEO, ABCERFG Company',
                'comment'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, tempore aut odit rem illum nobis, debitis odio soluta dolorem officiis tenetur sed necessitatibus delectus iusto voluptate velit laudantium eum dicta qui mollitia aspernatur neque unde.',
                'created_at'    => date('Y-m-d H:i:s', time()),
                'updated_at'    => date('Y-m-d H:i:s', time()),
            ]
        );

        Testimonial::create(
            [
                'name'          => 'Sal Harvey',
                'designation'   => 'Director, HIJKLMN Company',
                'comment'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, tempore aut odit rem illum nobis, debitis odio soluta dolorem officiis tenetur sed necessitatibus delectus iusto voluptate velit laudantium eum dicta qui mollitia aspernatur neque unde.',
                'created_at'    => date('Y-m-d H:i:s', time()),
                'updated_at'    => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
