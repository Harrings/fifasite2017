<?php
ob_start(); //from stack overflow
include 'pass.php';
error_reporting(E_ALL);
ini_set('display_errors','On');
session_start();

$error=0;
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "harrings-db", $pass, "harrings-db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (($_POST["user"]==null))
{
	echo "Error to add a game it must have a name click <a href=\"index.php\">here</a> to return to home managment or here to retry  <a href=\"createuser.php\">here</a>";
}
else
{
	$player=$_POST["user"];
	$club=$_POST["club"];
	if (!($stmt = $mysqli->prepare("INSERT INTO FifaUser (name, club) VALUES (?,?)"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		 $error=1;
	}
	if (!$stmt->bind_param("ss", $player, $club)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		$error=1;
	}
	if (!$stmt->execute()) {
		//echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		$error=1;
	}
	$stmt->close();
	if ($error==0)
	{
		header("Location: index.php", true);
	}
	else
	{
		echo "Error there is already a video with the same name in the inventory click <a href=\"index.php\">here</a> to return to inventory managment";
	}
}
?>