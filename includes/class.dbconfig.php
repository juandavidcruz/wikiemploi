<?php
/**
 * Created by PhpStorm.
 * User: juandavidcruzgomez
 * Date: 26/11/2016
 * Time: 17:34
 */

class Database
{
    private $DB_host = "localhost";
    private $DB_user = "wikiman";
    private $DB_pass = "wikiman";
    private $DB_name = "wikiemploi_db";
    public $conn;

    function __construct()
    {
        $this->conn = null;
    }

    public function dbConnection()
    {
        if(!isset($this->conn)){
            try
            {
                $this->conn = new PDO("mysql:host={$this->DB_host};dbname={$this->DB_name}",$this->DB_user,$this->DB_pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $this->conn;
    }
}




