#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


function doLogin($username,$password)
{
	$client=new rabbitMQClient("testRabbitMQ.ini","Database");
	$dbuser='jonah'
	$dbpassword='test'
	$dbname="User";

	$connection = new mysqli("localhost", $dbuser, $dbpassword, $dbname) or die('Error connecting to MySQL server.');

	#if($connection)
	{
        #	echo "Connection Established.<br />";
        #	$query="SELECT * FROM t 

	#echo "$user + $pass";
        } 
}

function newUser($username, $password, $email, $firstname, $lastname)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","Database");
	$dbuser='jonah'
        $dbpassword='test'
        $dbname="User";
	
	$connection = new mysqli("localhost", $dbuser, $dbpassword, $dbname) or die('Error connecting to MySQL server.');

	if($connection)
	{
		$query="INSERT INTO users (firstname, lastname, password, email) VALUES ($firstname , $lastname, $username, $password, $email)";
		mysqli_query($query); 
		echo "User has been created";
	}
}

function doSearch($song,$artist, $album)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","API");
	$search=array();

	if ($song!=null)
	{
		$search->song=$song;
	}
	else ($artist!=null)
	{
		$search->artist=$artist;
	}
	else ($album!=null)
	{
		$search->album=$album;
	}
	$response = $client->publish$search	
}

function doPlaylist($song,$artist, $album)
{
	$client=new rabbitMQClient("testRabbitMQ.ini","API");
	$clients=new rabbitMQClient("testRabbitMQ.ini","Database");

	$search=array();

        if ($song!=null)
        {
                $search->song=$song;
		$send=$client->publish($search);
		
		$send=$clients->publish($request);
		
		 
        }
        else ($artist!=null)
        {
                $search->artist=$artist;
        }
        else ($album!=null)
        {
                $search->album=$album;
        }

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "create":
      return newUser($request['username'], $request['password'], $request['email'], $request['firstname'], $request['lastname'] );
    case "playlist":
      return doPlaylist($request[song],$request['artist'], $request['album']);
    case "rate":
      return doRating($request['song'], $request['artist']i);
    case "like_music":
      return doLikeMusic();
    case "recommend":
      return reco();
    case "validate_session":
      return doValidate($request['sessionId']);
    case "search":
      return doSearch($request[song],$request['artist'], $request['album']);

  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

