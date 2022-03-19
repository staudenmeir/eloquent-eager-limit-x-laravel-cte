<?php

namespace Staudenmeir\EloquentEagerLimitXLaravelCte\Query\Grammars;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\SQLiteGrammar as Base;
use Staudenmeir\EloquentEagerLimit\Grammars\Traits\CompilesSQLiteGroupLimit;
use Staudenmeir\LaravelCte\Query\Grammars\Traits\CompilesSQLiteExpressions;

class SQLiteGrammar extends Base
{
    use CompilesSQLiteGroupLimit, CompilesSQLiteExpressions {
        CompilesSQLiteGroupLimit::compileSelect as compileSelect1;
        CompilesSQLiteExpressions::compileSelect as compileSelect2;
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
