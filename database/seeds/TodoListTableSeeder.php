<?php

use App\TodoList;
use Illuminate\Database\Seeder;

class TodoListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        TodoList::create([
//            'name' => 'San Juan Vacation',
//            'description' => 'Things to do before we leave for Puerto Rico!'
//        ]);
//
//        TodoList::create([
//            'name' => 'Home Winterization',
//            'description' => 'Winter is coming.'
//        ]);
//        TodoList::create([
//            'name' => 'Rental Maintenance',
//            'description' => 'Cleanup and improvements for new tenants'
//        ]);
        $faker = \Faker\Factory::create();
//        TodoList::truncate();
         foreach(range(0,500) as $index)
         {
             Todolist::create([
             'name' => $faker->sentence(2),
             'description'=> $faker->sentence(4)
             ]);

            }

    }
}
