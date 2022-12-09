<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  return;
}

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

 if ($contact["user_id"] !== $_SESSION["user"]["id"]) {
  http_response_code(403);
  echo ("HTTP 403 UNAUTHORIZED");
  return;
 } else {
  $statement = $mysqli->prepare("DELETE FROM contacts WHERE id = (?) ");
  $statement->bind_param('i', $id);
  $statement->execute();
  $_SESSION["flash"] = ["message" => "Contact {$contact["name"]}  was deleted."];
  $_SESSION["alredy_refreshed"] = NULL;
  header("Location: home.php");
 }











