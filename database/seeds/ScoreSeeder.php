<?php

use Illuminate\Database\Seeder;
use App\Score;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Score::class, 2)->create();
    }
}
