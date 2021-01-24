<?php
$hostname="localhost";
$username="root";
$pass="";

$config=mysql_connect($hostname,$username,$pass) or die ("mysql_error()");

mysql_select_db('delio');
?>