<?php

namespace App\Console\Commands;

use App\Http\Controllers\LingShiController;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class CollectGoods extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collect';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '采集数据';

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
    public function handle(LingShiController $controller, Client $client)
    {
        $controller->list($client);
    }
}
