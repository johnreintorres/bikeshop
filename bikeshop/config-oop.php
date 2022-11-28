<?php
define('DB_SERVER', 'mysql7007.xserver.jp');
define('DB_USERNAME', 'feemo_testdb');
define('DB_PASSWORD', 'feemoqwerty123');
define('DB_NAME', 'feemo_bikeshop');
try{
  $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  die("ERROR: Could not connect. " . $e->getMessage());
}

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'feemo_bikes');
// try{
//   $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
//   // Set the PDO error mode to exception
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e){
//   die("ERROR: Could not connect. " . $e->getMessage());
// }
?>