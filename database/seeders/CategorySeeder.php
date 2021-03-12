<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
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
				'category' => 'Women dresses',
				'description' =>  'Products like women dresses',
				'active' => 1
			],
            [
                'id' => 2,
				'category' => 'Women T-shirts',
				'description' =>  'Products like women t-shirts',
				'active' => 1
			],
            [
                'id' => 3,
				'category' => 'Kids',
				'description' =>  'Products like kids clothes',
				'active' => 1
			],
            [
                'id' => 4,
				'category' => 'Jeans Pants',
				'description' =>  'Products like Jeans pants',
				'active' => 1
			],
            [
                'id' => 5,
				'category' => 'Shoes',
				'description' =>  'Products like sport shoes',
				'active' => 1,
			]
        );
        Category::insert($data);
    }
}
