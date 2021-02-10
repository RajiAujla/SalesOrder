<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'assignment5';

//create connection
$database  = new mysqli($servername, $username, $password, $databasename);
if($database->connect_error){
    die('Unable to connect to database.');
}