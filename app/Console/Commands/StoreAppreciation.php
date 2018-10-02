<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\AppreciationController;

class StoreAppreciation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appreciation:store {--r|reset : Reset all stored appreciations}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store base appreciations in the database';

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
        if ($this->option('reset')) 
        {
            $this->call('migrate:fresh');
        }
        
        AppreciationController::storeAppreciations() ;
        
        $this->info('Appreciations successfully stored !');
    }
}