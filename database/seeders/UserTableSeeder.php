<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User :: factory()
        -> count(50)
        -> make()
        ->each(function($user) {

            $evento = Event :: inRandomOrder()->first();
            $user -> event() -> associate($evento);
            $user -> save();
        });
    }
}
