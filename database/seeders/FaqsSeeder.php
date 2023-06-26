<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create(
            [
                'question'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, autem?',
                'answer'        => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> <p>Modi consequuntur sapiente, mollitia odio officia debitis dolore nobis rerum iusto,</p> <p>quisquam cumque eligendi provident fugit voluptatem molestiae,</p> <p>et perferendis eius blanditiis.</p>',
                'created_at'    => date('Y-m-d H:i:s', time()),
                'updated_at'    => date('Y-m-d H:i:s', time()),
            ]
        );

        Faq::create(
            [
                'question'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, autem?',
                'answer'        => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> <p>Modi consequuntur sapiente, mollitia odio officia debitis dolore nobis rerum iusto,</p> <p>quisquam cumque eligendi provident fugit voluptatem molestiae,</p> <p>et perferendis eius blanditiis.</p>',
                'created_at'    => date('Y-m-d H:i:s', time()),
                'updated_at'    => date('Y-m-d H:i:s', time()),
            ]
        );

        Faq::create(
            [
                'question'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, autem?',
                'answer'        => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> <p>Modi consequuntur sapiente, mollitia odio officia debitis dolore nobis rerum iusto,</p> <p>quisquam cumque eligendi provident fugit voluptatem molestiae,</p> <p>et perferendis eius blanditiis.</p>',
                'created_at'    => date('Y-m-d H:i:s', time()),
                'updated_at'    => date('Y-m-d H:i:s', time()),
            ]
        );
    }
}
