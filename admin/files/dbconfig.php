<?php
/**
 * Created by PhpStorm.
 * User: juandavidcruzgomez
 * Date: 26/11/2016
 * Time: 17:34
 */

 ini_set('allow_url_include', 0);
session_start();
$DB_host = "localhost";
$DB_user = "wikiman";
$DB_pass = "wikiman";
$DB_name = "wikiemploi_db";
$DB_options = array(
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try
{
    $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass, $DB_options);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
$DB_con->exec('SET CHARACTER SET utf8');
$DB_con->exec("set names utf8");
