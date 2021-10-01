<?php

namespace App\Console\Commands;

use App\Services\Network\VatsimDataService;
use Illuminate\Console\Command;

class UpdateVatsimNetworkData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'networkdata:update';

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
     * @return int
     */
    public function handle(VatsimDataService $service)
    {
        $service->updateNetworkData();
    }
}
