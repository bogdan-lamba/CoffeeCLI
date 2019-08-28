<?php

use Illuminate\Database\Seeder;

class Cash_bagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cash_bag')->insert([
            [
                'bill_id' => '1',
                'quantity' => '30'
            ],
            [
                'bill_id' => '2',
                'quantity' => '5'
            ],
            [
                'bill_id' => '3',
                'quantity' => '130'
            ],
        ]);
    }
}
