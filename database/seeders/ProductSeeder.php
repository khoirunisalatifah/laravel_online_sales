<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'elektronik')->first();

        if (!$category) {
            return;
        }

        $products = [
            [
                'sku' => 'SKU-001',
                'name' => 'Mouse Wireless',
                'slug' => 'mouse-wireless',
                'description' => 'Mouse wireless untuk kebutuhan komputer.',
                'price' => 150000,
                'stock' => 20,
                'is_active' => true,
            ],
            [
                'sku' => 'SKU-002',
                'name' => 'Keyboard Mechanical',
                'slug' => 'keyboard-mechanical',
                'description' => 'Keyboard mechanical untuk mengetik dan bekerja.',
                'price' => 350000,
                'stock' => 15,
                'is_active' => true,
            ],
            [
                'sku' => 'SKU-003',
                'name' => 'Headset Gaming',
                'slug' => 'headset-gaming',
                'description' => 'Headset dengan mikrofon untuk komunikasi.',
                'price' => 250000,
                'stock' => 10,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['sku' => $product['sku']],
                ['category_id' => $category->id] + $product
            );
        }
    }
}