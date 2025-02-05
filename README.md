# Run code blocks during laravel migrations.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/luongolabs/block-migrate.svg?style=flat-square)](https://packagist.org/packages/luongolabs/block-migrate)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/luongolabs/block-migrate/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/luongolabs/block-migrate/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/luongolabs/block-migrate/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/luongolabs/block-migrate/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/luongolabs/block-migrate.svg?style=flat-square)](https://packagist.org/packages/luongolabs/block-migrate)

Does what it says on the tin. Run code blocks during laravel migrations with the ability to roll them back, this is based on [spatie/laravel-settings](spatie/laravel-settings) mainly the migration creation part.

## Installation

You can install the package via composer:

```bash
composer require luongolabs/block-migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="block-migrate-config"
```

This is the contents of the published config file:

```php
return [
    'migrations_paths' => [
        database_path('blocks'),
    ],
];
```

## Usage

Let's say you need to rotate the auth tokens in the application due to a change in your new code, run `php artisan make:block-migration RotateAuthTokens` to create the migration.

This would create the file `database/blocks/2021_08_01_000000_rotate_auth_tokens.php` with the following contents:

```php
<?php

use LuongoLabs\BlockMigrate\Migrations\BlockMigration;

return new class extends BlockMigration
{
    public function up(): void
    {

    }

    public function down(): void
    {

    }
};
```

You can then add your code to the `up` and `down` methods, then run `php artisan migrate` to run the migration.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Josh Luongo](https://github.com/joshluongo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
