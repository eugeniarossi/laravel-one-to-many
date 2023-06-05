<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // per eseguire tutti i seeder insieme li specifico: 

        $this->call([
            TypeSeeder::class,
            ProjectSeeder::class
        ]);
    }
}
