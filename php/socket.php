<?php

$var= $_POST['led'];
$server_ip   = '192.168.137.114';
$server_port = 8888;

if($var=="allumer"){
	$message     = '1';
}elseif($var=="eteindre"){
	$message     = '2';
}


if ($socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)) {

	socket_sendto($socket, $message, strlen($message), 0, $server_ip, $server_port);

} else {
  echo("can't create socket\n");
}
 
socket_close($socket);	 

echo json_encode('sent');
?>