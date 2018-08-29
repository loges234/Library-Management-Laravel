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
        Eloquent::unguard();

        $this->call([
            UsersTableSeeder::class
        ]);
        
        $path = 'db/lms.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Databases seeded Successfully!');
    }
}
