<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Tag;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Event :: factory()
        -> count(30)
        -> create()->each(function($event) {

            $evento = Tag :: inRandomOrder()->first();
            $event -> tags() -> attach($evento);
            $event -> save();
        });
    }
}
