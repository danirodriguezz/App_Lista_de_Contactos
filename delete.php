<?php

$mysqli = include_once "database.php";

$id = $_GET["id"];

// if(ctype_digit($id)) {
//   var_dump("Es un entero");
//   die();
// } else {
//   var_dump("No es un entero");
//   die();
// }

$statement = $mysqli->prepare("SELECT * FROM contacts WHERE id = (?) ");
$statement->bind_param('i', $id);
$statement->execute();
$result = $statement->get_result();
$contact = $result->fetch_assoc();

if (!$contact) {
   http_response_code(404);
   echo("HTTP 404 NOT FOUND");
   return;
 }
$statement = $mysqli->prepare("DELETE FROM contacts WHERE id = (?) ");
$statement->bind_param('i', $id);
$statement->execute();
header("Location: home.php");









