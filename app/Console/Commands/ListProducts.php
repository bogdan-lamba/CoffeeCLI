<?php

namespace App\Console\Commands;

use App\VendingMachine;
use Illuminate\Console\Command;

class ListProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List available products';

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
        $this->info('Listing all available products:');

        $headers = ['ID', 'Name', 'Quantity'];
        $products = (new VendingMachine)->getInventory();

        $this->table($headers, $products);

    }
}
