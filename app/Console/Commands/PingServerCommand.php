<?php

namespace App\Console\Commands;

use App\Jobs\PingServerJob;
use Illuminate\Console\Command;

class PingServerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ping server availability';

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
        PingServerJob::dispatchSync();

        return 1;
    }
}
