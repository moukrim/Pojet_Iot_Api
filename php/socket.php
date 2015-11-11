<?php

$var= $_POST['led'];

$server_ip   = '192.168.137.114';
$server_port = 8888;
//$beat_period = 5;
if($var=="allumer"){
	$message     = '1';
}elseif($var=="eteindre"){
	$message     = '2';
}
/*print "Sending heartbeat to IP $server_ip, port $server_port\n";
print "press Ctrl-C to stop\n";*/

if ($socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)) {

     socket_sendto($socket, $message, strlen($message), 0, $server_ip, $server_port);
	 /*$ret = socket_recvfrom($socket, $buf, 20, 0, $server_ip, $server_port);
  if($ret === false) break;
  echo "Messagge : < $buf > , $server_ip : $server_port <br>";*/


} else {
  echo("can't create socket\n");
}
 
socket_close($socket);	 

echo json_encode('ok');
?>