<?php

namespace App\Console\Commands;

use App\Http\Services\DistrictService;
use App\Http\Services\LogsService;
use Illuminate\Console\Command;

class CronDistrict extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:district';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command cron district';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DistrictService $districtService,
                                LogsService $logsService)
    {
        parent::__construct();
        $this->districtService = $districtService;
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
            $this->districtService->create();
        } catch (\Exception$exception) {
            $this->logsService->create([], 'CronDistrict', $exception);
        }
        return 0;
    }
}
