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
            'name_category'=>'Object Oriented Programming',
            'slug'=>'object-oriented-programming'
        ]);
        Category::create([
            'name_category'=>'Machine Learning',
            'slug'=>'machine-learning'
        ]);
        Category::create([
            'name_category'=>'Architecture Computer',
            'slug'=>'architecture-computer'
        ]);
        Category::create([
            'name_category'=>'Mobile Programming',
            'slug'=>'mobile-programming'
        ]);
        Category::create([
            'name_category'=>'Operation System',
            'slug'=>'operation-system'
        ]);
        Category::create([
            'name_category'=>'Data Structure',
            'slug'=>'data-structure'
        ]);
    }
}
