<?
// threads_get.php
// Get <count> threads from specified board
// copyright 2014 brotheroftux
// this code is distributed under GPLv3 license

require_once("config.php");
require_once("mod_database.php");

$dbInstance = mod_database::getInstance(); // mod_database is a singleton pattern class
echo $dbInstance->query("select * from ".DB_TABLE_PREFIX.$_GET['board']." limit ".$_GET['offset'].", ".$_GET['count'].";");

?>