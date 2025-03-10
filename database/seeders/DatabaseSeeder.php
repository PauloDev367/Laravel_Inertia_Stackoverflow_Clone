<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Database\Seeders\VotablesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserQuestionsAnswersTableSeeder::class,
            FavoritesTableSeeder::class,
            VotablesTableSeeder::class
        ]);

        // User::factory(3)->create()->each(function ($user) {
        //     $questions = Question::factory(rand(1, 5))->make();
        //     $user->questions()->saveMany($questions)->each(function ($q) {
        //         $q->answers()->saveMany(Answer::factory(rand(1, 5))->make());
        //     });
        // });
    }
}
