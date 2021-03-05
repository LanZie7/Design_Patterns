<?php
//require 'Autoload.php';
//spl_autoload_register([(new Autoload()), 'loadClass']);
require 'DB/DBFactory.php';
require 'DB/MySQLDBFactory.php';
require 'DB/OracleDBFactory.php';
require 'DB/PostgreSQLDBFactory.php';

require 'Connect/ConnectDB.php';
require 'Connect/MySQLConnect.php';
require 'Connect/OracleConnect.php';
require 'Connect/PostgreSQLConnect.php';

require 'QueryBuilder/QueryBuilderDB.php';
require 'QueryBuilder/MySQLQueryBuilder.php';
require 'QueryBuilder/OracleQueryBuilder.php';
require 'QueryBuilder/PostgreSQLQueryBuilder.php';

require 'Record/RecordDB.php';
require 'Record/MySQLRecord.php';
require 'Record/OracleRecord.php';
require 'Record/PostgreSQLRecord.php';


$db = new MySQLDBFactory();
echo $db->connect();
echo PHP_EOL;
echo $db->record('params');
echo PHP_EOL;
$db->query();
