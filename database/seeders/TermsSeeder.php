<?php

namespace Database\Seeders;

use App\Models\PageTermItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageTermItem::create(
            [
                'heading'       => 'Sal Harvey',
                'content'       => '<div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id iste, minus non possimus, iusto officiis quas ea ipsum dolorum distinctio ex, esse accusamus maiores? Fugit officia delectus sit possimus necessitatibus. Quae laboriosam sed maiores quidem tenetur. Nam qui illum, sed veniam, dignissimos voluptatum, iusto mollitia quo repudiandae tenetur ullam harum.</div><div>&nbsp;</div><div><div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id iste, minus non possimus, iusto officiis quas ea ipsum dolorum distinctio ex, esse accusamus maiores? Fugit officia delectus sit possimus necessitatibus. Quae laboriosam sed maiores quidem tenetur. Nam qui illum, sed veniam, dignissimos voluptatum, iusto mollitia quo repudiandae tenetur ullam harum.</div><div>&nbsp;</div><div><div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id iste, minus non possimus, iusto officiis quas ea ipsum dolorum distinctio ex, esse accusamus maiores? Fugit officia delectus sit possimus necessitatibus. Quae laboriosam sed maiores quidem tenetur. Nam qui illum, sed veniam, dignissimos voluptatum, iusto mollitia quo repudiandae tenetur ullam harum.</div></div></div>',
                'created_at'    => date('Y-m-d H:i:s', time()),
                'updated_at'    => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
