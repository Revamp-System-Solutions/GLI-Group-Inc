<?php

namespace Database\Seeders;

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
        
        $this->call([
            UsersTableSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            BrandColorSeeder::class,
            MediaSeeder::class,
            CategoriesSeeder::class,
            SubcategoriesSeeder::class,
        ]);
    }
}
