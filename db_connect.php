<!--
  *
  * Connect to database
  *
  *
 -->

<?php
// Set variable for database connection
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "durent";

// Create connection with database
$con = new mysqli('localhost', 'root', '', $databasename)or die('cannot connect with database');
