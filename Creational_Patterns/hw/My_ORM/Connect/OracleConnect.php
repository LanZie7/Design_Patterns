<?php


class OracleConnect implements ConnectDB
{

    public function getConnection()
    {
        echo 'Работает соединение - ' . __CLASS__;
    }
}
