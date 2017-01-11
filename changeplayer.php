<?php
ob_start(); //from stack overflow
include 'pass.php';
error_reporting(E_ALL);
ini_set('display_errors','On');
session_start();
$nameset=$_POST["nameid"];
$players=$_POST["player"];
$goals=$_POST["goals"];
$assists=$_POST["assists"];
$motm=$_POST["motm"];
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "harrings-db", $pass, "harrings-db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (!($stmt = $mysqli->prepare("Update GoalScorer SET player=?, goals=?, assists=?, motm=? WHERE id=?"))) {
     echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!$stmt->bind_param("siiii", $players, $goals, $assists, $motm, $nameset)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}
$stmt->close();
?>