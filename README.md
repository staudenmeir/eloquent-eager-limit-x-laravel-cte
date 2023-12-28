# Eloquent Eager Limit + Laravel CTE

[![CI](https://github.com/staudenmeir/eloquent-eager-limit-x-laravel-cte/actions/workflows/ci.yml/badge.svg)](https://github.com/staudenmeir/eloquent-eager-limit-x-laravel-cte/actions/workflows/ci.yml)
[![Code Coverage](https://codecov.io/gh/staudenmeir/eloquent-eager-limit-x-laravel-cte/graph/badge.svg?token=U6IP2SIFOU)](https://codecov.io/gh/staudenmeir/eloquent-eager-limit-x-laravel-cte)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/staudenmeir/eloquent-eager-limit-x-laravel-cte/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/staudenmeir/eloquent-eager-limit-x-laravel-cte/?branch=main)
[![Latest Stable Version](https://poser.pugx.org/staudenmeir/eloquent-eager-limit-x-laravel-cte/v/stable)](https://packagist.org/packages/staudenmeir/eloquent-eager-limit-x-laravel-cte)
[![Total Downloads](https://poser.pugx.org/staudenmeir/eloquent-eager-limit-x-laravel-cte/downloads)](https://packagist.org/packages/staudenmeir/eloquent-eager-limit-x-laravel-cte/stats)
[![License](https://poser.pugx.org/staudenmeir/eloquent-eager-limit-x-laravel-cte/license)](https://github.com/staudenmeir/eloquent-eager-limit-x-laravel-cte/blob/main/LICENSE)

This Laravel package merges [staudenmeir/eloquent-eager-limit](https://github.com/staudenmeir/eloquent-eager-limit)
and [staudenmeir/laravel-cte](https://github.com/staudenmeir/laravel-cte) to allow them being used in the same model.

Supports Laravel 9.0+.

## Installation

    composer require staudenmeir/eloquent-eager-limit-x-laravel-cte:"^1.0"

Use this command if you are in PowerShell on Windows (e.g. in VS Code):

    composer require staudenmeir/eloquent-eager-limit-x-laravel-cte:"^^^^1.0"

## Versions

| Laravel | Package |
|:--------|:--------|
| 10.x    | 1.1     |
| 9.x     | 1.0     |

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
