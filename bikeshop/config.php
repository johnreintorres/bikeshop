<?php
define('DB_SERVER', 'mysql7007.xserver.jp');
define('DB_USERNAME', 'feemo_testdb');
define('DB_PASSWORD', 'feemoqwerty123');
define('DB_NAME', 'feemo_bikeshop');
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
  die("ERROR: Could not connect." . mysqli_connect_error());
}
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'feemo_bikes');
// $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// if($link === false){
//   die("ERROR: Could not connect." . mysqli_connect_error());
// }
?>