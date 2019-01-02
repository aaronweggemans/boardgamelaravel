<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            [
                'name' => 'Carcassone',
                'aop' => '6',
                'dor' => Carbon::now()->format('Y-m-d H:i:s'),
                'time' => '4',
                'description' => 'Mooie omschrijving nogwat',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Ganzenbord',
                'aop' => '8',
                'dor' => Carbon::now()->format('Y-m-d H:i:s'),
                'time' => '10',
                'description' => 'Ganzenbord is een leuk spel met allerlei mogelijkheden',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Mens erger je niet',
                'aop' => '6',
                'dor' => Carbon::now()->format('Y-m-d H:i:s'),
                'time' => '8',
                'description' => 'Mens met een poppetje die je naar voor moet doen',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Catan',
                'aop' => '2',
                'dor' => Carbon::now()->format('Y-m-d H:i:s'),
                'time' => '2',
                'description' => 'Leuk spel voor jong en oud',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
