<?php

$conn_error='Could not connect.';

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"],1);

$conn= new mysqli($server, $username, $password, $db);

$conn=mysqli_connect($server, $username, $password, $db);
if(!$conn || !(mysqli_select_db($conn,$db)))
{
    die($conn_error);
}
?>