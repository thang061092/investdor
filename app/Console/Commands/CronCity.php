<?php

namespace App\Console\Commands;

use App\Http\Services\CityService;
use App\Http\Services\LogsService;
use Illuminate\Console\Command;

class CronCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:city';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command cron city';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CityService $cityService,
                                LogsService $logsService)
    {
        parent::__construct();
        $this->cityService = $cityService;
        $this->logsService = $logsService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $this->cityService->create();
        } catch (\Exception$exception) {
            $this->logsService->create([], 'CronCity', $exception);
        }
        return 0;
    }
}
