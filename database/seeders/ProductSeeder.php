<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'iPhone 16',
            'description' => 'support for Apple Intelligence, a new Camera Control Button, and increased battery life across the board',
            'sku' => 'ip16-apple',
            'price' => 16000000,
            'stock' => 10,
            'category_id' => 1,
        ]);
    }
}
