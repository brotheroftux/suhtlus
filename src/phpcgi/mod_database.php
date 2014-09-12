<?
// mod_database.php
// database module for suhtlus
// copyright brotheroftux 2014
// this code is distributed under GPLv3 license

require_once("config.php");


class mod_database
{
    protected static $_instance;
    private $mysqli;
    
    private function __construct(){
        if (DB_TYPE == "mysql"){
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($mysqli->connect_errno) {
                die("Could not connect to MySQL.\n"); // TODO: encode error messages in JSON
            }
        }else{
            // TODO: text database realisation
        }
    }

    private function __clone();
    
    public static function getInstance(){
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function queryExec($query){
        $result = $mysqli->query($query);
        $result->fetch_array(MYSQLI_BOTH);
        return json_encode($result);
    }
}