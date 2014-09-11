<?
// mod_database.php
// database module for <name>board
// copyright brotheroftux 2014
// this code is distributed under GPLv3 license

require_once("config.php");


class mod_database
{
    public $dbReference;
    public function db_init(){
        if(constant("DB_TYPE") == mysql){
            $dbReference = new mysqli(DB_HOST, DB_USER, DB_PASSWORD
}