<?php

use Illuminate\Database\Seeder;

class VendingMachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vending_machine')->insert([
            'status' => 'unlocked'
        ]);
    }
}
