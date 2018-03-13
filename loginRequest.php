<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


$client = new rabbitMQClient("testRabbitMQ.ini","FrontEnd");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

$request = array();
//$request['type'] = "Login";
$request['type']= $_POST['login'];
$request['type']=$_POST['createUser'];
$request['type']=$_POST['playlist'];
$request['type']=$_POST['rate'];
$request['type']=$_POST['likeMusic'];
$request['type']=$_POST['recommend'];
$request['type']=$_POST['search'];
$request['username']=$_POST['username'];
$request['email']=$_POST['email'];
//$request['username'] = "steve";
//$request['password'] = "password";
$request['password']=$_POST['password'];
$request['song']=$_POST['song'];
$request['artist']=$_POST['artist'];
$request['album']=$_POST['album'];
$request['rating']=$_POST['rating'];
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

$payload = json_encode($response);
echo $payload;
