<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BattleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('battles')->insert([
            [
                'game_id' => '2',
                'user_id' => '2',
                'score' => '3'
            ],
            [
                'game_id' => '2',
                'user_id' => '3',
                'score' => '3'
            ],
            [
                'game_id' => '2',
                'user_id' => '4',
                'score' => '4'
            ],
            [
                'game_id' => '2',
                'user_id' => '1',
                'score' => '2'
            ],
        ]);
    }
}
