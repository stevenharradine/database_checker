<?php
$host          = "localhost"
$username      = "username"
$password      = "password"
$database_name = "dbname"


// source: http://stackoverflow.com/questions/1475701/how-to-know-if-mysqlnd-is-the-active-driver/22499259#22499259  @ 20160720 22:50 EST
if (function_exists('mysql_connect')) {
    echo "- MySQL <b>is installed</b>.<br>";
} else  {
    echo "- MySQL <b>is not</b> installed.<br>";
}
if (function_exists('mysqli_connect')) {
    echo "- MySQLi <b>is installed</b>.<br>";
} else {
    echo "- MySQLi <b>is not installed</b>.<br>";
}
if (function_exists('mysqli_get_client_stats')) {
    echo "- MySQLnd driver is being used.<br>";
} else {
    echo "- libmysqlclient driver is being used.<br>";
}


echo "<br/>-------------<br/>MySQLi ";


// source: http://php.net/manual/en/pdo.connections.php @ 20160720 22:50 EST
try {
    $dbh = new PDO("mysql:host=$host;dbname=$database_name", $username, $password);
    foreach($dbh->query('SHOW tables;') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


echo "<br/>-------------<br/>";


// source:
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