<?php

namespace Staudenmeir\EloquentEagerLimitXLaravelCte\Query\Grammars;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\SqlServerGrammar as Base;
use Staudenmeir\EloquentEagerLimit\Grammars\Traits\CompilesSqlServerGroupLimit;
use Staudenmeir\LaravelCte\Query\Grammars\Traits\CompilesSqlServerExpressions;

class SqlServerGrammar extends Base
{
    use CompilesSqlServerGroupLimit, CompilesSqlServerExpressions {
        CompilesSqlServerGroupLimit::compileSelect as compileSelect1;
        CompilesSqlServerExpressions::compileSelect as compileSelect2;
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
