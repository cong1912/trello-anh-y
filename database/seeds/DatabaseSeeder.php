<?php

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
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:fresh');
            $this->command->warn("Data cleared, starting from blank database.");
        }
        if ($this->command->confirm('Do you wish to auto generate data sample ?')) {
            factory("App\Models\Project", 6)->create();
            $this->command->info('Project 6 added.');
            factory("App\Models\Board", 30)->create();
            $this->command->info('Board 30 added.');
            factory("App\Models\ListItem", 60)->create();
            $this->command->info('ListItem 60 added.');
            factory("App\Models\CheckItem", 90)->create();
            $this->command->info('CheckItem 90 added.');
            factory("App\Models\Todo", 10)->create();
            $this->command->info('Todo 90 added.');
        }
    }
}
