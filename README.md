![CI](https://github.com/staudenmeir/eloquent-eager-limit-x-laravel-cte/workflows/CI/badge.svg)
[![Code Coverage](https://scrutinizer-ci.com/g/staudenmeir/eloquent-eager-limit-x-laravel-cte/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/staudenmeir/eloquent-eager-limit-x-laravel-cte/?branch=main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/staudenmeir/eloquent-eager-limit-x-laravel-cte/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/staudenmeir/eloquent-eager-limit-x-laravel-cte/?branch=main)
[![Latest Stable Version](https://poser.pugx.org/staudenmeir/eloquent-eager-limit-x-laravel-cte/v/stable)](https://packagist.org/packages/staudenmeir/eloquent-eager-limit-x-laravel-cte)
[![Total Downloads](https://poser.pugx.org/staudenmeir/eloquent-eager-limit-x-laravel-cte/downloads)](https://packagist.org/packages/staudenmeir/eloquent-eager-limit-x-laravel-cte)
[![License](https://poser.pugx.org/staudenmeir/eloquent-eager-limit-x-laravel-cte/license)](https://packagist.org/packages/staudenmeir/eloquent-eager-limit-x-laravel-cte)

## Introduction

This Laravel package merges [staudenmeir/eloquent-eager-limit](https://github.com/staudenmeir/eloquent-eager-limit)
and [staudenmeir/laravel-cte](https://github.com/staudenmeir/laravel-cte) to allow them being used in the same model.

Supports Laravel 9.0+.

## Installation

    composer require staudenmeir/eloquent-eager-limit-x-laravel-cte:"^1.0"

Use this command if you are in PowerShell on Windows (e.g. in VS Code):

    composer require staudenmeir/eloquent-eager-limit-x-laravel-cte:"^^^^1.0"

## Usage

Use the `HasEagerLimitAndQueriesExpressions` trait in your model:

```php
class User extends Model
{
    use \Staudenmeir\EloquentEagerLimitXLaravelCte\Eloquent\HasEagerLimitAndQueriesExpressions;
}
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CODE OF CONDUCT](.github/CODE_OF_CONDUCT.md) for details.
