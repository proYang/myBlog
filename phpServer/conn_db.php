<?php
@ $db = new mysqli('localhost', 'root', '','myblog');
$db->query('set names utf8');
if(mysqli_connect_errno()){
	echo "Error: Could not connect to database. Please try again later";
	exit;
}

?>