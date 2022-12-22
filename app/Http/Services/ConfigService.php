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

    public function create($request)
    {
        $data = [
            Config::TYPE => 'view',
            Config::NAME => $request->name,
            Config::KEY => $request->key,
            Config::STATUS => 'active',
        ];
        $this->configRepository->create($data);
    }

    public function find_config($type)
    {
        return $this->configRepository->findManySortColumn([Config::TYPE => $type], Config::LEVEL, "ASC");
    }

    public function update_config_project($request)
    {
        $config = $this->configRepository->find($request->id);
        if ($config['status'] == 'active') {
            $this->configRepository->update($config['id'], [Config::STATUS => 'block']);
        } else {
            $this->configRepository->update($config['id'], [Config::STATUS => 'active']);
        }
        return;
    }

    public function create_index($request)
    {
        $data = [
            Config::TYPE => 'index',
            Config::NAME => $request->name,
            Config::KEY => $request->key,
            Config::STATUS => 'active',
            Config::LEVEL => $request->level,
        ];
        $this->configRepository->create($data);
    }

    public function swap_config_index($request)
    {
        $current_config = $this->configRepository->find($request->current_level);
        $swap_config = $this->configRepository->find($request->swap_level);

        $current_level = $current_config['level'];
        $swap_level = $swap_config['level'];

        $this->configRepository->update($current_config['id'], [Config::LEVEL => $swap_level]);
        $this->configRepository->update($swap_config['id'], [Config::LEVEL => $current_level]);
        return;
    }

    public function find_config_view()
    {
        $data = [];
        $configs = $this->configRepository->findMany([Config::TYPE => 'view']);
        foreach ($configs as $config) {
            $data[$config['key']] = $config['status'];
        }
        return $data;
    }
}
