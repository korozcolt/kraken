<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BithdayCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bithday:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a sms to users that have birthday today';

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
     * @return int
     */
    public function handle()
    {
        
        
        return 0;
    }
}
