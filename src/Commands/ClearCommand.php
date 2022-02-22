<?php

namespace xPand4B\CommandCollection\Commands;

use Illuminate\Console\Command;
use xPand4B\CommandCollection\Commands\Traits\ShouldExecuteShellCommands;

class ClearCommand extends Command
{
    use ShouldExecuteShellCommands;

    protected $signature = 'app:clear';

    protected $description = 'Clears every cache.';

    public function handle(): void
    {
        $this->runCommands([
            'php artisan route:clear',
            'php artisan cache:clear',
            'php artisan config:clear',
            'php artisan view:clear',
            'php artisan key:generate',
        ]);
    }
}
