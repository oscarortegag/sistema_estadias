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
        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserSeeder::class);

        $files = [
            'database/queries/colors.sql',
            'database/queries/states.sql',
        ];

        foreach ($files as $path) {
            DB::unprepared(file_get_contents($path));
            $this->command->info("{$path} has been run");
        }
    }
}
