<?php
$server_ip   = '192.168.137.114';
$server_port = 8888;
$message     = '23';
if ($socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)) {

     socket_sendto($socket, $message, strlen($message), 0, $server_ip, $server_port);
     echo('yes');
} else {
  echo("can't create socket\n");
}
 
socket_close($socket);	


?>