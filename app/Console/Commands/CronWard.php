<?php

namespace App\Console\Commands;

use App\Http\Services\LogsService;
use App\Http\Services\WardService;
use Illuminate\Console\Command;

class CronWard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:ward';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command cron ward';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(WardService $wardService,
                                LogsService $logsService)
    {
        parent::__construct();
        $this->wardService = $wardService;
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
            $this->wardService->create();
        } catch (\Exception$exception) {
            $this->logsService->create([], 'CronWard', $exception);
        }
        return 0;
    }
}
