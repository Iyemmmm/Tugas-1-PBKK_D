<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name_category' => 'Object Oriented Programming',
            'slug' => 'object-oriented-programming',
            'color' => 'red'
        ]);
        Category::create([
            'name_category' => 'Machine Learning',
            'slug' => 'machine-learning',
            'color'=>'blue'
        ]);
        Category::create([
            'name_category' => 'Architecture Computer',
            'slug' => 'architecture-computer',
            'color'=>'green'
        ]);
        Category::create([
            'name_category' => 'Mobile Programming',
            'slug' => 'mobile-programming',
            'color'=>'yellow'
        ]);
    }
}
