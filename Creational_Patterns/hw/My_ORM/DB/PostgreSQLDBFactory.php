<?php


class PostgreSQLDBFactory extends DBFactory
{

    protected function makeConnect() : ConnectDB
    {
        return new PostgreSQLConnect;
    }

    protected function makeRecord() : RecordDB
    {
        return new PostgreSQLRecord;
    }

    protected function makeQueryBuilder() : QueryBuilderDB
    {
        return new PostgreSQLQueryBuilder;
    }
}
