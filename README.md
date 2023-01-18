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

## Bug Reporting and Suggestions

If you find any bugs or have any suggestions for improvements, please open an issue on the [GitHub repository](https://github.com/gpn273/laravel-psr18-http-bridge) or submit a pull request. Your feedback is greatly appreciated and will help us improve the package.

## Contributing Guide

1. **Bug Reports**: Before submitting a bug report, please perform a search in the issue tracker to make sure the issue has not already been reported. If a similar issue exists, please add a comment to the existing issue instead of creating a new one. If the issue is a new one, please provide a clear and concise description of the problem, including steps to reproduce the issue, and the expected behavior. Also, it would be helpful if you include the version of the package you are using, and the version of PHP.

2. **Feature Requests**: Before submitting a feature request, please perform a search in the issue tracker to make sure the request has not already been made. If a similar request exists, please add a comment to the existing request instead of creating a new one. If the request is a new one, please provide a clear and concise description of the proposed feature, including the problem it solves, and any relevant use cases.

3. **Code Changes**: Before submitting a code change, please create a fork of the repository and make the changes in your fork. Then, submit a pull request to the main repository. Please make sure that your code adheres to the PSR-2 coding standard and includes appropriate test coverage. Also, please include a clear and concise description of the changes you have made and the problem they solve.

4. **Communication**: All contributors should communicate in a respectful and professional manner, regardless of the medium (issues, pull requests, email, etc.).