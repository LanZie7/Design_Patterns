<?php


class PostgreSQLConnect implements ConnectDB
{

    public function getConnection()
    {
        echo 'Работает соединение - ' . __CLASS__;
    }
}
