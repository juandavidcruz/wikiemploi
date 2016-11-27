<?php 
//fonction reload
//$time= temps de rafraichissement
//$action=  url demandé
function reload($time,$action)
{
echo '<meta http-equiv="refresh" content="'.$time.';URL='.$action.'">';
}
 // fin de fonction