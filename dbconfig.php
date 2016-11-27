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

    public function dbConnection()
    {

    }
}



try
{
    $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}


include_once 'class.user.php';
$user = new USER($DB_con);
