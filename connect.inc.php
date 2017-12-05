<?php

$conn_error='Could not connect.';

$mysqli_host='us-cdbr-iron-east-05.cleardb.net';
$mysqli_user='bb7b6428344601';
$mysqli_pass='8626c690';
$mysqli_db='heroku_7adf718788690b0';

$conn=mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db);
if(!$conn || !(mysqli_select_db($conn,$mysqli_db)))
{
    die($conn_error);
}
?>