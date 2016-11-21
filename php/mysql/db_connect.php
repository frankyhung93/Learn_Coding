<?php

$hostname = "localhost";
$user = "root";
$password = "admin";
$database = "employees";

mysql_connect($hostname, $user, $password);
mysql_set_charset('utf8');
@mysql_select_db($database) or die( "Unable to select database");
mysql_query("SET NAMES 'utf8'");