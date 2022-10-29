<?php

namespace App\Console\Commands;

use App\Http\Services\BankService;
use App\Http\Services\LogsService;
use Illuminate\Console\Command;

class CronBank extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:bank';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command cron bank';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BankService $bankService,
                                LogsService $logsService)
    {
        parent::__construct();
        $this->bankService = $bankService;
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
            $this->bankService->create();
        } catch (\Exception$exception) {
            $this->logsService->create([], 'CronBank', $exception);
        }
        return 0;
    }
}
