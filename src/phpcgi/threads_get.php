<?
// threads_get.php
// Get <count> threads from specified board
// copyright 2014 brotheroftux
// this code is distributed under GPLv3 license

require_once("config.php");
require_once("modules/mod_database.php");

$dbInstance = mod_database::getInstance(); // mod_database is a singleton pattern class
if (DB_SEPARATE_TABLES == true){
    $query = "select * from ".DB_TABLE_PREFIX.$_GET['board']." limit ".$_GET['offset'].", ".$_GET['count'].";";
}else{
    $query = "select * from ".DB_TABLE_PREFIX.DB_TABLE_NAME." limit ".$_GET['offset'].", ".$_GET['count'].";";
}
echo $dbInstance->query($query);

?>