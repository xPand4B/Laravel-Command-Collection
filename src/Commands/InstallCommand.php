<?php

namespace xPand4B\CommandCollection\Commands;

use Illuminate\Console\Command;
use xPand4B\CommandCollection\Commands\Traits\ShouldExecuteShellCommands;

class InstallCommand extends Command
{
    use ShouldExecuteShellCommands;

    protected $signature = 'app:install';

    protected $description = 'Install the Application.';

    public function handle(): void
    {
        $this->runCommands([
            'php artisan key:generate',
            'php artisan migrate:fresh --seed --force',
            'php artisan storage:link',
            'php artisan app:clear',
            'php artisan route:cache',
            'php artisan config:cache',
            'php artisan event:cache',
            'npm install',
            'npm run prod',
        ]);
    }
}
