<?php

use Illuminate\Database\Seeder;
use App\Models\Tweet;

class TweetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Tweet::class, 100)->create();
    }
}
