<!--
  *
  * 1. If don't have the database, create it
  * 2. Connect to database
  * 3. Create table if don't have
  *
 -->

<?php
// Set variable for database connection
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "TURental.";

// Create connection without database
$conn = new mysqli($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if not exist
$create_database_sql = "CREATE DATABASE IF NOT EXISTS ".$databasename." CHARACTER SET utf8 COLLATE utf8_general_ci";
if (!$conn->query($create_database_sql)) {
    echo "Error creating database: " . mysqli_error($conn);
}

// Close connection without database
mysqli_close($conn);

// Create connection with database
$con = new mysqli('localhost', 'root', '', $databasename)or die('cannot connect with database');

// Require the create tables sql
require './create_tables_sql/user.php';
require './create_tables_sql/board_main.php';
require './create_tables_sql/board_reply.php';

// Create table with sql
if (!$con->query($create_table_user_sql)) {
    echo "Error creating table user: " . mysqli_error($con);
}
if (!$con->query($create_table_board_main_sql)) {
    echo "Error creating table board_main: " . mysqli_error($con);
}
if (!$con->query($create_table_board_reply_sql)) {
    echo "Error creating table board_reply: " . mysqli_error($con);
}
