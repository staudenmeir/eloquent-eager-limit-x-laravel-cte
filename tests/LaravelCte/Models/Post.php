<?php

namespace Staudenmeir\LaravelCte\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimitXLaravelCte\Eloquent\HasEagerLimitAndQueriesExpressions;

class Post extends Model
{
    use HasEagerLimitAndQueriesExpressions;
}
