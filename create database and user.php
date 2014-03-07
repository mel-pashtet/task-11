<?php

$conn   = mysql_connect("localhost", "root", "");
$create = mysql_query("CREATE DATABASE text_notes");


mysql_query("CREATE USER 'user' @ 'localhost' IDENTIFIED BY 'some_pass'");     //створюєм користувача і даєм йому всі права на б.д

mysql_query("GRANT ALL PRIVILEGES ON `text_notes` . * TO 'user' IDENTIFIED BY 'some_pass'");

?>
