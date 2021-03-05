<?php


class PostgreSQLRecord implements RecordDB
{

    public function makeRecordToDB($arg)
    {
        echo 'Делаем запись в БД с аргументом  - ' . $arg . PHP_EOL. 'Работает база - ' . __CLASS__;
    }
}
