<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
			[
                'id' => 1,
				'product_name' => 'Product 01',
                'src' => '1.jpg',
				'description' =>  'Incredible product 01 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'id_category' => 1
			],
            [
                'id' => 2,
				'product_name' => 'Product 02',
				'description' =>  'Incredible product 02 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'src' => '2.jpg',
                'id_category' => 1
			],
            [
                'id' => 3,
				'product_name' => 'Product 03',
				'description' =>  'Incredible product 03 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'src' => '3.jpg',
                'id_category' => 1
			],
            [
                'id' => 4,
				'product_name' => 'Product 04',
				'description' =>  'Incredible product 04 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'src' => '4.jpg',
                'id_category' => 2
			],
            [
                'id' => 5,
				'product_name' => 'Product 05',
				'description' =>  'Incredible product 05 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'src' => '5.jpg',
                'id_category' => 3
			],
            [
                'id' => 6,
				'product_name' => 'Product 06',
				'description' =>  'Incredible product 06 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'src' => '6.jpg',
                'id_category' => 4
			],
            [
                'id' => 7,
				'product_name' => 'Product 07',
				'description' =>  'Incredible product 07 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'src' => '7.jpg',
                'id_category' => 1
			],
            [
                'id' => 8,
				'product_name' => 'Product 08',
				'description' =>  'Incredible product 08 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'src' => '8.jpg',
                'id_category' => 2
			],
            [
                'id' => 9,
				'product_name' => 'Product 09',
				'description' =>  'Incredible product 09 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'src' => '9.jpg',
                'id_category' => 2
			],
            [
                'id' => 10,
				'product_name' => 'Product 10',
				'description' =>  'Incredible product 10 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'src' => '10.jpg',
                'id_category' => 1
			],
            [
                'id' => 11,
				'product_name' => 'Product 10',
				'description' =>  'Incredible product 10 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'src' => '11.jpg',
                'id_category' => 5
			],
            [
                'id' => 12,
				'product_name' => 'Product 10',
				'description' =>  'Incredible product 10 with an amazing price, offer in many colors and sizes, get it now!',
				'status' => 'New',
                'inventory' => 500,
                'price' => rand(10, 200),
                'src' => '12.jpg',
                'id_category' => 5
			],
        );
        Product::insert($data);
    }
}
