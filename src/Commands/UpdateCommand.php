<?php

namespace xPand4B\CommandCollection\Commands;

use Illuminate\Console\Command;
use xPand4B\CommandCollection\Commands\Traits\ShouldExecuteShellCommands;

class UpdateCommand extends Command
{
    use ShouldExecuteShellCommands;

    protected $signature = 'app:update';

    protected $description = 'Update the Application.';

    public function handle(): void
    {
        $this->runCommands([
            'php artisan down',
            'git stash',
            'git checkout main',
            'git pull origin main',
            'composer update --ignore-platform-reqs --prefer-dist --optimize-autoloader --no-progress',
            'php artisan nova:publish',
            'php artisan route:cache',
            'php artisan config:cache',
            'php artisan event:cache',
            'npm clean-install',
            'npm run prod',
            'php artisan up',
        ]);
    }
}
