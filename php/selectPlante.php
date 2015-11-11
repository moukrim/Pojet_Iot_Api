<?php

require('plante.php');

$res=plante::select('arduino1');
foreach($res as $key => $variable){
var_dump($variable->id);

}
