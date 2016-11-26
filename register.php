<?php
/**
 * Created by PhpStorm.
 * User: juandavidcruzgomez
 * Date: 26/11/2016
 * Time: 16:55
 */

require './libs/smarty/Smarty.class.php';

$smarty = new Smarty;
$smarty->display('register.tpl');