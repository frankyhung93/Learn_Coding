<?php

$hostname = "localhost";
$user = "root";
$password = "admin";
$database = "employees";

mysql_connect($hostname, $user, $password);
mysql_set_charset('utf8');
@mysql_select_db($database) or die( "Unable to select database");
mysql_query("SET NAMES 'utf8'");

$mysqli = new mysqli($hostname, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit;
}
if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit;
}