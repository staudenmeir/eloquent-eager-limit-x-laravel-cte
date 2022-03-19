<?php

namespace Staudenmeir\EloquentEagerLimitXLaravelCte\Eloquent;

use Illuminate\Database\Connection;
use RuntimeException;
use Staudenmeir\EloquentEagerLimit\Traits\HasEagerLimitRelationships;
use Staudenmeir\EloquentEagerLimitXLaravelCte\Query\Builder;
use Staudenmeir\EloquentEagerLimitXLaravelCte\Query\Grammars\MySqlGrammar;
use Staudenmeir\EloquentEagerLimitXLaravelCte\Query\Grammars\PostgresGrammar;
use Staudenmeir\EloquentEagerLimitXLaravelCte\Query\Grammars\SQLiteGrammar;
use Staudenmeir\EloquentEagerLimitXLaravelCte\Query\Grammars\SqlServerGrammar;

trait HasEagerLimitAndQueriesExpressions
{
    use HasEagerLimitRelationships;

    /**
     * Get a new query builder instance for the connection.
     *
     * @return \Staudenmeir\EloquentEagerLimitXLaravelCte\Query\Builder
     */
    protected function newBaseQueryBuilder()
    {
        $connection = $this->getConnection();

        $grammar = $connection->withTablePrefix(
            $this->getQueryGrammar($connection)
        );

        return new Builder($connection, $grammar);
    }

    /**
     * Get the query grammar.
     *
     * @param \Illuminate\Database\Connection $connection
     * @return \Illuminate\Database\Query\Grammars\Grammar
     */
    protected function getQueryGrammar(Connection $connection)
    {
        $driver = $connection->getDriverName();

        switch ($driver) {
            case 'mysql':
                return new MySqlGrammar();
            case 'pgsql':
                return new PostgresGrammar();
            case 'sqlite':
                return new SQLiteGrammar();
            case 'sqlsrv':
                return new SqlServerGrammar();
        }

        throw new RuntimeException('This database is not supported.'); // @codeCoverageIgnore
    }
}
