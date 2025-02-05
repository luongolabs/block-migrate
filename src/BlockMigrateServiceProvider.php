<?php

namespace LuongoLabs\BlockMigrate;

use LuongoLabs\BlockMigrate\Commands\MakeBlockMigrationCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BlockMigrateServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('block-migrate')
            ->hasConfigFile()
            ->hasCommand(MakeBlockMigrationCommand::class);
    }

    public function boot(): void
    {
        parent::boot();
        // This needs to loaded here instead of in the configurePackage method
        // because the migrations paths are not yet resolved at that point
        $this->loadMigrationsFrom($this->resolveMigrationPaths());
    }

    protected function resolveMigrationPaths(): array
    {
        return ! empty(config('block-migrate.migrations_path'))
            ? [config('block-migrate.migrations_path')]
            : config('block-migrate.migrations_paths');
    }
}
