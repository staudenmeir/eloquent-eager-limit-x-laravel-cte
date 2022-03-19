<?php

namespace Staudenmeir\EloquentEagerLimit\Tests\Models;

use Illuminate\Database\Eloquent\Model as Base;
use Staudenmeir\EloquentEagerLimitXLaravelCte\Eloquent\HasEagerLimitAndQueriesExpressions;

abstract class Model extends Base
{
    use HasEagerLimitAndQueriesExpressions;
}
