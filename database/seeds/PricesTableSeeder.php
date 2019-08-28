<?php

use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->insert([
            [
                'product_id' => '1',
                'price' => '300'
            ],
            [
                'product_id' => '2',
                'price' => '400'
            ]
        ]);
    }
}
