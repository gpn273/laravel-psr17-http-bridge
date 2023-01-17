# Laravel PSR-18 Http Bridge

This package provides a bridge between the Laravel HTTP Client and PSR-18, allowing developers to use the Laravel HTTP Client as a PSR-18 compliant HTTP client in their PHP projects.

## Installation

You can install the package via composer:

```bash
composer require gpn273/laravel-psr18-http-bridge
```

## Usage

The `Psr18Client` class accepts a `Closure` which must return a `Illuminate\Http\Client\PendingRequest`. This would be where you would initially set up your Laravel HTTP Client.

```php
use Gpn273\LaravelPsr18HttpBridge\Psr18Client;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

$client = new Psr18Client(function (): PendingRequest {
    return Http::timeout(10)
        ->connectTimeout(3)
        ->acceptJson();
});
```

## Conclusion

This package makes it easy to use the Laravel HTTP Client in any PHP project that adheres to the PSR-18 standard. It provides a seamless and powerful way for developers to use Laravel's HTTP Client in a PSR-18 compatible way, allowing for more flexibility and reusability.