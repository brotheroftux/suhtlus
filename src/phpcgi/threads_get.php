<?
// threads_get.php
// Get <count> threads from specified board
// copyright 2014 brotheroftux
// this code is distributed under GPLv3 license

require_once("config.php");

$responseArray = array();
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($mysqli->connect_errno) {
    die("Could not connect to MySQL.\n"); // TODO: encode error messages in JSON
}

$mysqli->query("set names 'utf8';");
$mysqli->query("set character set 'utf8';");
$res = $mysqli->query("select * from ".DB_TABLE_PREFIX.$_GET['board']." limit ".$_GET['offset'].", ".$_GET['count'].";");
echo json_encode($res);
mysqli->close();

?>