<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Espresso',
                'quantity' => '123'
            ],
            [
                'name' => 'Latte',
                'quantity' => '87'
            ]
        ]);
    }
}
