<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $t1 = 'Implementing OAUTH2 with laravel passport';
        $t2 = 'Pagination in vuejs is not working properly';
        $t3 = 'Vuejs event listeners for child components';
        $t4 = 'Laravel homestead error - undetected database';
        
        $d1 = [
            'title' => $t1,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium deleniti quae eaque commodi quaerat adipisci iusto omnis assumenda laboriosam, optio illo at libero a quos necessitatibus animi explicabo laudantium voluptatum!',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t1)
        ];

        $d2 = [
            'title' => $t2,
            'content' => 'Pagination Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium deleniti quae eaque commodi quaerat adipisci iusto omnis assumenda laboriosam, optio illo at libero a quos necessitatibus animi explicabo laudantium voluptatum!',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t2)
        ];

        $d3 = [
            'title' => $t3,
            'content' => 'Vuejs Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium deleniti quae eaque commodi quaerat adipisci iusto omnis assumenda laboriosam, optio illo at libero a quos necessitatibus animi explicabo laudantium voluptatum!',
            'channel_id' => 4,
            'user_id' => 2,
            'slug' => str_slug($t3)
        ];

        $d4 = [
            'title' => $t4,
            'content' => 'Homestead Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium deleniti quae eaque commodi quaerat adipisci iusto omnis assumenda laboriosam, optio illo at libero a quos necessitatibus animi explicabo laudantium voluptatum!',
            'channel_id' => 5,
            'user_id' => 1,
            'slug' => str_slug($t4)
        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
    }
}
