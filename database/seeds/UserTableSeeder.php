<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'aaron',
                'email' => 'aaronweggemans@hotmail.nl',
                'password' => '$2y$10$RwOdO8i.AqwDGLJ9jdz0fOZPA5czHo0Qo/T3LoOJz0Hs29wPFLzbi',
                'role' => 'admin'
            ],
            [
                'name' => 'Ruben',
                'email' => 'ruben@hotmail.nl',
                'password' => '$2y$10$RwOdO8i.AqwDGLJ9jdz0fOZPA5czHo0Qo/T3LoOJz0Hs29wPFLzbi',
                'role' => 'admin'
            ],
            [
                'name' => 'Michael',
                'email' => 'michaeldezanden@hotmail.nl',
                'password' => '$2y$10$RwOdO8i.AqwDGLJ9jdz0fOZPA5czHo0Qo/T3LoOJz0Hs29wPFLzbi',
                'role' => 'admin'
            ],
            [
                'name' => 'Rob',
                'email' => 'jettenrob@hotmail.nl',
                'password' => '$2y$10$RwOdO8i.AqwDGLJ9jdz0fOZPA5czHo0Qo/T3LoOJz0Hs29wPFLzbi',
                'role' => 'admin'
            ],
            [
                'name' => 'mitchell',
                'email' => 'michellvandijk@hotmail.nl',
                'password' => '$2y$10$RwOdO8i.AqwDGLJ9jdz0fOZPA5czHo0Qo/T3LoOJz0Hs29wPFLzbi',
                'role' => 'admin'
            ],
            [
                'name' => 'Lania',
                'email' => 'landiavanlong@chello.nl',
                'password' => '$2y$10$RwOdO8i.AqwDGLJ9jdz0fOZPA5czHo0Qo/T3LoOJz0Hs29wPFLzbi',
                'role' => 'admin'
            ],
            [
                'name' => 'dekfd',
                'email' => 'dekdf@dekne.nl',
                'password' => '$2y$10$RwOdO8i.AqwDGLJ9jdz0fOZPA5czHo0Qo/T3LoOJz0Hs29wPFLzbi',
                'role' => 'admin'
            ],
            [
                'name' => 'Rosalien',
                'email' => 'Rosaliendewilde@hotmail.nl',
                'password' => '$2y$10$RwOdO8i.AqwDGLJ9jdz0fOZPA5czHo0Qo/T3LoOJz0Hs29wPFLzbi',
                'role' => 'admin'
            ]
        ]);
    }
}
