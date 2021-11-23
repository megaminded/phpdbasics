<?php
$username = 'root';
$password = 'casted';
$host     = 'localhost';
$connection = new mysqli($host, $username, $password, 'dbbasics');

if ($connection->connect_error) {
    die("There is an error connecting to database");
}