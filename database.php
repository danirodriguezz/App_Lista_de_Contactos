<?php

$host = "localhost";
$database = "contacts_app";
$user = "root";
$password = "";

$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
  echo "Falló la conexión a MYSQl: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
  die();
}
return $mysqli;



