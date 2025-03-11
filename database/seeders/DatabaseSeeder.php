<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Brand;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Brand::factory(5)->create();
        \App\Models\Product::factory(20)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Order::factory(30)->create();
    }
}
