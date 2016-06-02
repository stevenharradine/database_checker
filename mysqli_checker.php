<?php
$host          = "localhost"
$username      = "username"
$password      = "password"
$database_name = "dbname"

// basic code stolen from:
// http://stackoverflow.com/questions/666811/fatal-error-class-mysqli-not-found @ 20160602 12:34 EST
// http://stackoverflow.com/questions/3678650/testing-php-mysqli-connection @ 20160602 12:34 EST
if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
  echo 'We don\'t have mysqli!!!';
} else {
  $mysqli_connection = new MySQLi($host, $username, $password, $database_name);

  if ($mysqli_connection->connect_error) {
    echo "Not connected, error: " . $mysqli_connection->connect_error;
  } else {
    echo "Connected.";
  }
}

