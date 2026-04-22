<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Armchair',
            'slug' => 'armchair'
        ]);

        Category::create([
            'name' => 'Sofa',
            'slug' => 'sofa'
        ]);

        Category::create([
            'name' => 'Bed',
            'slug' => 'bed'
        ]);
    }
}