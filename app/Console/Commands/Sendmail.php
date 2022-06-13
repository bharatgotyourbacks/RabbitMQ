<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\OtpJob;

class Sendmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        OtpJob::dispatch();
    }
}
