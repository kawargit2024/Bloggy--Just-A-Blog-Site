<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db";
$db_conn = mysqli_connect( $servername, $username, $password, $dbname ); 
