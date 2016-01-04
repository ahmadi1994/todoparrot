<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todolist')->delete();
        $this->call('TodoListTableSeeder');

        // $this->call(UserTableSeeder::class);
    }
}
