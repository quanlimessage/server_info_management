<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert(
			[
				[
					'name' => 'Sản Phẩm 1',
					'price' => 500000,
				],
				[
					'name' => 'Sản Phẩm 2',
					'price' => 100000,
				],
			]
		);
    }
}
