<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create(['nom' => 'Ferrari']);
        Brand::create(['nom' => 'Ford']);
        Brand::create(['nom' => 'Subaru']);
        Brand::create(['nom' => 'Lamborghini']);
        Brand::create(['nom' => 'Toyota']);
        Brand::create(['nom' => 'Porsche']);
        Brand::create(['nom' => 'Nissan']);
        Brand::create(['nom' => 'Tesla']);
    }
}
