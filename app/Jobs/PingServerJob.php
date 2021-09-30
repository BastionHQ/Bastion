<?php

namespace App\Jobs;

use App\Ansible\Server;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Process\Process;

class PingServerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $hosts = [];

    public function __construct($hosts = null)
    {
        $this->hosts = $hosts;
    }

    public function handle()
    {
        $query = \App\Models\Server::query();

        if ($hosts = $this->hosts) {
            $query->whereIn('host', $hosts);
        }

        foreach ($query->get() as $server) {
            (new Server([$server->host], $server->user))
                ->ping()
                ->execute(static function ($type, $json) {
                    if ($type === Process::ERR) {
                        return false;
                    }

                    $result = [];
                    $json = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
                    foreach ($json['plays'] as $play) {
                        foreach ($play['tasks'] as $task) {
                            foreach ($task['hosts'] as $host => $data) {
                                $result[$host] = [
                                    'is_success' => !isset($data['failed']) && !isset($data['unreachable']),
                                    'message' => $data['msg'] ?? '',
                                ];
                            }
                        }
                    }

                    foreach ($result as $host => $data) {
                        \App\Models\Server::whereHost($host)
                            ->first()
                            ->history()
                            ->create(
                                [
                                    'is_success' => !isset($data['failed']) && !isset($data['unreachable']),
                                    'message' => $data['msg'] ?? '',
                                ]
                            );
                    }

                    return true;
                });
        }

        return false;
    }
}
