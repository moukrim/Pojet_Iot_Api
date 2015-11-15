<?php

require('plante.php');

$res=plante::select();
/*foreach($res as $key => $variable){
var_dump($variable->nom);
var_dump($variable->image);
}
*/
echo(json_encode($res));