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
        // $this->call(UsersTableSeeder::class);
        
        DB::table("products")->truncate();
        DB::table("category")->truncate();
        DB::table("brand")->truncate();

        $this->call(ProductsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        
    }
}
