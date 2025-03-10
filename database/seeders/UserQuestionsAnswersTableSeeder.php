<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class UserQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        DB::table('questions')->delete();
        DB::table('answers')->delete();
        
        User::factory(3)->create()->each(function ($user) {
            $questions = Question::factory(rand(1, 5))->make();
            $user->questions()->saveMany($questions)->each(function ($q) {
                $q->answers()->saveMany(Answer::factory(rand(1, 5))->make());
            });
        });
    }
}
