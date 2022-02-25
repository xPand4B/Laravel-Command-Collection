<?php

namespace xPand4B\CommandCollection;

use Illuminate\Support\ServiceProvider;
use xPand4B\CommandCollection\Commands\ClearCommand;
use xPand4B\CommandCollection\Commands\InstallCommand;
use xPand4B\CommandCollection\Commands\UpdateCommand;

class CommandCollectionServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->configurePublishing();
    }

    public function register(): void
    {
        $this->registerCommands();
    }

    private function configurePublishing(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../scripts/sail-initial-install.sh' => base_path('/sail-initial-install.sh')
        ], 'sail');
    }

    private function registerCommands(): void
    {
        $this->commands([
            InstallCommand::class,
            UpdateCommand::class,
            ClearCommand::class,
        ]);
    }
}