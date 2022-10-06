<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Laptops
            Product::create([
                'name' => 'Laptop 10',
                'slug' => 'laptop-10',
                'details' => ' inch, ' ,
                'price' => rand(149999, 249999),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                
            ]);

            Product::create([
                'name' => 'Laptop 2',
                'slug' => 'laptop-2',
                'details' => ' inch, ' ,
                'price' => rand(149999, 249999),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                
            ]);
            Product::create([
                'name' => 'Laptop 3',
                'slug' => 'laptop-3',
                'details' => ' inch, ' ,
                'price' => rand(149999, 249999),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                
            ]);
            Product::create([
                'name' => 'Laptop 4',
                'slug' => 'laptop-4',
                'details' => ' inch, ' ,
                'price' => rand(149999, 249999),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                
            ]);
    }
}
