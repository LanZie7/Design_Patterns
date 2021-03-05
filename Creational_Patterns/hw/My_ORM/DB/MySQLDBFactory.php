<?php


class MySQLDBFactory extends DBFactory
{

    protected function makeConnect(): ConnectDB
    {
        return new MySQLConnect;
    }

    protected function makeRecord() : RecordDB
    {
        return new MySQLRecord;
    }

    protected function makeQueryBuilder() : QueryBuilderDB
    {
        return new MySQLQueryBuilder;
    }
}
