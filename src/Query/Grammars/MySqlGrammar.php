<?php

namespace Staudenmeir\EloquentEagerLimitXLaravelCte\Query\Grammars;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\MySqlGrammar as Base;
use Staudenmeir\EloquentEagerLimit\Grammars\Traits\CompilesMySqlGroupLimit;
use Staudenmeir\LaravelCte\Query\Grammars\Traits\CompilesMySqlExpressions;

class MySqlGrammar extends Base
{
    use CompilesMySqlGroupLimit, CompilesMySqlExpressions {
        CompilesMySqlGroupLimit::compileSelect as compileSelect1;
        CompilesMySqlExpressions::compileSelect as compileSelect2;
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
