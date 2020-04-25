<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'DB_USERNAME');
define('DB_PASSWORD', 'DB_PASSWORD');
define('DB_NAME', 'DB_NAME');
 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$conn->set_charset("utf8mb4");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
