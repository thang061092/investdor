<?php


namespace App\Http\Services;


use App\Http\Repositories\LogsRepository;
use App\Models\Logs;

class LogsService
{
    protected $logsRepository;

    public function __construct(LogsRepository $logsRepository)
    {
        $this->logsRepository = $logsRepository;
    }

    public function create($data, $action, $exception)
    {
        $this->logsRepository->create([
            Logs::REQUEST => json_encode($data),
            Logs::ACTION => $action,
            Logs::FILE => $exception->getFile(),
            Logs::LINE => $exception->getLine(),
            Logs::MESSAGE => $exception->getMessage(),
        ]);
    }
}
