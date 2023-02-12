<?php

namespace Database\Seeders;

use App\Models\Category;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('category_product')->truncate();
        \DB::table('products')->truncate();
        \DB::table('categories')->truncate();

        Category::factory(5)->create()->each(function ($category){
            $this->addProductToCategory($category);

            if(rand(0,1)) {
                $subCategory = Category::factory(rand(1, 3))->make();
                $category->childs()->saveMany($subCategory);

                $subCategory->each(function ($subCategory) {
                    $this->addProductToCategory($subCategory);
                });
            }
        });

    }

    protected function addProductToCategory($category){
        $products = Product::factory(rand(2,5))->create()->pluck('id');
        $category->products()->attach($products);
    }
}
