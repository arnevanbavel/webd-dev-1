<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Winner;

class MonthlyWinners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Winner::where('maand', 'vorigemaand')->update(['maand' => '+2maanden']);
        Winner::where('maand', 'nu')->update(['maand' => 'vorigemaand']);
    }
}
