<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $r1 = [
            'user_id' => 1,
            'discussion_id' => 1,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, iusto quaerat impedit aperiam cupiditate suscipit atque eveniet quia rem! Aperiam quo ipsa hic. Odio, mollitia. Aperiam excepturi quasi vel! Necessitatibus.'
        ];

        $r2 = [
            'user_id' => 2,
            'discussion_id' => 2,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, iusto quaerat impedit aperiam cupiditate suscipit atque eveniet quia rem! Aperiam quo ipsa hic. Odio, mollitia. Aperiam excepturi quasi vel! Necessitatibus.'
        ];

        $r3 = [
            'user_id' => 1,
            'discussion_id' => 4,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, iusto quaerat impedit aperiam cupiditate suscipit atque eveniet quia rem! Aperiam quo ipsa hic. Odio, mollitia. Aperiam excepturi quasi vel! Necessitatibus.'
        ];

        $r4 = [
            'user_id' => 2,
            'discussion_id' => 3,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, iusto quaerat impedit aperiam cupiditate suscipit atque eveniet quia rem! Aperiam quo ipsa hic. Odio, mollitia. Aperiam excepturi quasi vel! Necessitatibus.'
        ];

        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
    }
}
