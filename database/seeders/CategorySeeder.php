<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['nom' => 'Sport Car']);
        Category::create(['nom' => 'Muscle Car']);
        Category::create(['nom' => 'Rally']);
        Category::create(['nom' => 'Offroad']);
        Category::create(['nom' => 'Luxury']);
        Category::create(['nom' => 'Supercar']);
        Category::create(['nom' => 'JDM']);
        Category::create(['nom' => 'Classic']);
        Category::create(['nom' => 'Electric']);
    }
}
