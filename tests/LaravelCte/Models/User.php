<?php

namespace Staudenmeir\LaravelCte\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimitXLaravelCte\Eloquent\HasEagerLimitAndQueriesExpressions;

class User extends Model
{
    use HasEagerLimitAndQueriesExpressions;
}
