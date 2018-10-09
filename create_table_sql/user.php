<!--
  *
  * Create sql for create table user
  *
 -->

<?php
// Sql for user create table
$create_table_user_sql = "CREATE TABLE IF NOT EXISTS user (
 u_email varchar(255) NOT NULL,
 u_password varchar(255) NOT NULL,
 PRIMARY KEY (u_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
