# Laravel Http Test Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/krsriq/laravel-http-test-generator.svg?style=flat-square)](https://packagist.org/packages/krsriq/laravel-http-test-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/krsriq/laravel-http-test-generator.svg?style=flat-square)](https://packagist.org/packages/krsriq/laravel-http-test-generator)

This package can be used to generate integration tests from your Laravel application's Http client calls.
It records the requests and responses and generates a test file for you, where the requests are mocked.

## Installation

You can install the package via composer:

```bash
composer require krsriq/laravel-http-test-generator --dev
```

## Usage

Insert the following in an application where you want to generate tests:

```php
app(LaravelHttpTestGenerator::class)->enable()
```

Then, visit the route you want to test. The test class will be generated in the `tests/Feature` directory.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email daniel@schmelz.org instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
