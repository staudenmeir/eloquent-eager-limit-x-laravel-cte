<?php

namespace Staudenmeir\EloquentEagerLimitXLaravelCte\Query;

use Illuminate\Database\Query\Builder as Base;
use Staudenmeir\EloquentEagerLimit\Traits\BuildsGroupLimitQueries;
use Staudenmeir\LaravelCte\Query\Traits\BuildsExpressionQueries;

class Builder extends Base
{
    use BuildsGroupLimitQueries;
    use BuildsExpressionQueries;
}
