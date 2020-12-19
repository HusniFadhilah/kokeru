<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ResetScheduleController;

class ResetStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "For reset status all cleaning service's schedule";

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
        $schedule = new ResetScheduleController();
        $schedule->reset();
        $this->info("Successfully reset status all cleaning service's schedule");
    }
}
