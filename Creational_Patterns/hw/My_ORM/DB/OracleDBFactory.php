<?php


class OracleDBFactory extends DBFactory
{

    protected function makeConnect() : ConnectDB
    {
        return new OracleConnect;
    }

    protected function makeRecord() : RecordDB
    {
        return new OracleRecord;
    }

    protected function makeQueryBuilder() : QueryBuilderDB
    {
        return new OracleQueryBuilder;
    }
}
