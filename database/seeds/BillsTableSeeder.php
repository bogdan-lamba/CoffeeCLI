<?php

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            [
                'value' => '100'
            ],
            [
                'value' => '500'
            ],
            [
                'value' => '50'
            ]
        ]);
    }
}
