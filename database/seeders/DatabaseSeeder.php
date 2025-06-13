<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\SuppliersTableSeeder;
use Database\Seeders\ProductsListsTableSeeder;

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
           SuppliersTableSeeder::class,
           ProductsListsTableSeeder::class,
        ]);
    }
}
