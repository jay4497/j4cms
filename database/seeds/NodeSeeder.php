<?php

use Illuminate\Database\Seeder;

class NodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('node')->delete();

        $data = [
            [
                'name' => '新闻中心',
                'show_type' => 1,
                'content_type' => 2,
            ],
            [
                'name' => '产品中心',
                'show_type' => 1,
                'content_type' => 1
            ],
            [
                'name' => '关于我们',
                'show_type' => 3,
                'content' => 'about us is here'
            ]
        ];
        DB::table('node')->insert($data);
    }
}
