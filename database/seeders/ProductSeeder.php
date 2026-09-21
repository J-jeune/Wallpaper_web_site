<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ferrari = Brand::where('nom', 'Ferrari')->first();
        $ford = Brand::where('nom', 'Ford')->first();

        $sportCar = Category::where('nom', 'Sport Car')->first();
        $muscleCar = Category::where('nom', 'Muscle Car')->first();
        $luxury = Category::where('nom', 'Luxury')->first();

        $product1 = Product::create([
            'titre' => 'Ferrari 488 Sunset',
            'description' => 'Vue de côté au coucher du soleil',
            'prix' => 4.99,
            'image' => 'ferrari488.jpg',
            'brand_id' => $ferrari->id,
        ]);
        $product1->categories()->attach([$sportCar->id, $luxury->id]);

        $product2 = Product::create([
            'titre' => 'Mustang GT500 Track',
            'description' => 'Sur circuit, fumée des pneus',
            'prix' => 3.99,
            'image' => 'mustang.jpg',
            'brand_id' => $ford->id,
        ]);
        $product2->categories()->attach([$muscleCar->id, $sportCar->id]);
    }
}
