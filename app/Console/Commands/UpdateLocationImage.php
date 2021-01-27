<?php

namespace App\Console\Commands;

use App\Http\Controllers\Cron;
use Illuminate\Console\Command;

class UpdateLocationImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update_location_images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Location Image';

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
        $controller = new Cron(); 
        $controller->updateLocationImage();
    }
}
