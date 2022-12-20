<?php


namespace App\Http\Services;


use App\Http\Repositories\ConfigRepository;
use App\Models\Config;

class ConfigService
{
    protected $configRepository;

    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    public function create()
    {
        $data = [
            Config::EXTEND => 'block',
            Config::ASSET => 'block',
            Config::INVESTOR => 'block',
            Config::FINANCIAL => 'block',
            Config::PLAN => 'block',
            Config::RATE => 'block',
            Config::DOCUMENT => 'block',
            Config::TYPE => 'project'
        ];
        $this->configRepository->create($data);
    }

    public function find_config_project()
    {
        return $this->configRepository->findOne([Config::TYPE => 'project']);
    }

    public function update_config_project($request, $id)
    {
        $config = $this->configRepository->find($id);
        if (!empty($request->extend)) {
            if ($config['extend'] == 'active') {
                $this->configRepository->update($id, [Config::EXTEND => 'block']);
            } else {
                $this->configRepository->update($id, [Config::EXTEND => 'active']);
            }
        }

        if (!empty($request->asset)) {
            if ($config['asset'] == 'active') {
                $this->configRepository->update($id, [Config::ASSET => 'block']);
            } else {
                $this->configRepository->update($id, [Config::ASSET => 'active']);
            }
        }

        if (!empty($request->investor)) {
            if ($config['investor'] == 'active') {
                $this->configRepository->update($id, [Config::INVESTOR => 'block']);
            } else {
                $this->configRepository->update($id, [Config::INVESTOR => 'active']);
            }
        }

        if (!empty($request->document)) {
            if ($config['document'] == 'active') {
                $this->configRepository->update($id, [Config::DOCUMENT => 'block']);
            } else {
                $this->configRepository->update($id, [Config::DOCUMENT => 'active']);
            }
        }

        if (!empty($request->financial)) {
            if ($config['financial'] == 'active') {
                $this->configRepository->update($id, [Config::FINANCIAL => 'block']);
            } else {
                $this->configRepository->update($id, [Config::FINANCIAL => 'active']);
            }
        }

        if (!empty($request->plan)) {
            if ($config['plan'] == 'active') {
                $this->configRepository->update($id, [Config::PLAN => 'block']);
            } else {
                $this->configRepository->update($id, [Config::PLAN => 'active']);
            }
        }
        return;
    }
}
