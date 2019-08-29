<?php

namespace App\Console\Commands;

use App\VendingMachine;
use Illuminate\Console\Command;

class OrderClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unlock vending machine';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        VendingMachine::first()->unlock();

        $this->info('Vending machine unlocked for new orders');
    }
}
