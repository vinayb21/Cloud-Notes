<?php

$conn_error='Could not connect.';

$mysql_host='us-cdbr-iron-east-05.cleardb.net';
$mysql_user='bb7b6428344601';
$mysql_pass='8626c690';
$mysql_db='heroku_7adf718788690b0';


$conn=mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if(!$conn || !(mysqli_select_db($conn,$mysql_db)))
{
    die($conn_error);
}
?>