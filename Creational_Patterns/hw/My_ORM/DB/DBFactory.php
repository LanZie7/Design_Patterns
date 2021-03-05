<?php

abstract class DBFactory
{
    private $connect;
    private $record;
    private $queryBuilder;

    public function __construct()
    {
        $this->connect = $this->makeConnect();
        $this->record = $this->makeRecord();
        $this->queryBuilder = $this->makeQueryBuilder();
    }


    public function connect(){
        return $this->connect->getConnection();
    }
    public function record($atr){
        return $this->record->makeRecordToDB($atr);
    }

    public function query(){
        return $this->queryBuilder->QueryBuilderToDB();
    }

    abstract protected function makeConnect();
    abstract protected function makeRecord();
    abstract protected function makeQueryBuilder();
}
