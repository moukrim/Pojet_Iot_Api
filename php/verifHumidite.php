<?php
require('plante.php');
$res = plante::verifHumidite();
echo json_encode($res);