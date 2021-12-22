<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Category::truncate();
       $category = new \App\Category([
           'category' => 'Home & Office',
           'image' => 'home and office.jpg',

      ]);

      $category->save();
      $category = new \App\Category([
          'category' => 'phones & Tablets ',
          'image' => 'phones and tablets.jpg',

     ]);

     $category->save();


     $category = new \App\Category([
         'category' => 'computing ',
         'image' => 'Computing.jpg',

    ]);

    $category->save();

    $category = new \App\Category([
      'category' => 'Electronics',
      'image' => 'Electronics.jpg',

 ]);

 $category->save();

 $category = new \App\Category([
  'category' => 'Fashion',
  'image' => 'fashion.jpg',

]);

$category->save();

$category = new \App\Category([
  'category' => 'Gaming',
  'image' => 'Gaming.jpg',

]);

$category->save();

$category = new \App\Category([
  'category' => 'Sporting Goods',
  'image' => 'Sporting Goods.jpg',

]);

$category->save();

$category = new \App\Category([
  'category' => 'Garden Outdoors',
  'image' => 'Garden outdoors.jpg',

]);

$category->save();

    }
}
