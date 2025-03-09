<?php

namespace Database\Seeders;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create()->each(function ($user) {
            // Criando entre 1 e 5 perguntas para cada usuário
            $questions = Question::factory(rand(1, 5))->make();

            // Salvando as perguntas associadas ao usuário
            $user->questions()->saveMany($questions);
        });
    }
}
