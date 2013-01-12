<?
include "dbInfo.php";

if(!mysql_connect($server, $username, $password))
	echo 'Error: Could not connect to server.';
	
if(!mysql_select_db($database))
	echo 'Error: Could not select database.';
?>