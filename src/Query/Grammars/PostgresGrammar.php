<?php

namespace Staudenmeir\EloquentEagerLimitXLaravelCte\Query\Grammars;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\PostgresGrammar as Base;
use Staudenmeir\EloquentEagerLimit\Grammars\Traits\CompilesPostgresGroupLimit;
use Staudenmeir\LaravelCte\Query\Grammars\Traits\CompilesPostgresExpressions;

class PostgresGrammar extends Base
{
    use CompilesPostgresGroupLimit, CompilesPostgresExpressions {
        CompilesPostgresGroupLimit::compileSelect as compileSelect1;
        CompilesPostgresExpressions::compileSelect as compileSelect2;
    }

    /**
     * Compile a select query into SQL.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @return string
     */
    public function compileSelect(Builder $query)
    {
        if (isset($query->groupLimit)) {
            return $this->compileSelect1($query);
        }

        return $this->compileSelect2($query);
    }
}
