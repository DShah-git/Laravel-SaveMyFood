<?php

namespace Database\Seeders;

use App\Models\FoodTracker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        FoodTracker::create([
            'user_id'=>2,
            'food_name'=>'pasta',
            'quantity_made'=>'400',
            'quantity_wasted'=>'40',
            'unit'=>'gm',
            'meal_type'=>'dinner',
        ]);

        FoodTracker::create([
            'user_id'=>2,
            'food_name'=>'meat balls',
            'quantity_made'=>'7',
            'quantity_wasted'=>'1',
            'unit'=>'unit',
            'meal_type'=>'lunch',
        ]);
    }
}
