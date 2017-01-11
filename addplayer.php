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
if (($_POST["player"]==null))
{
	echo "Error to add a game it must have a name click <a href=\"index.php\">here</a> to return to home managment or here to retry  <a href=\"createplayer.php\">here</a>";
}
else
{
	$player=$_POST["player"];
	$goals=$_POST["goals"];
	$assists=$_POST["assists"];
	$motm=$_POST["motm"];
	$owner=$_POST["owner"];
	if (!($stmt = $mysqli->prepare("INSERT INTO GoalScorer (player, goals, assists, motm, uid) VALUES (?,?, ?, ?, ?)"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		 $error=1;
	}
	if (!$stmt->bind_param("siiii", $player, $goals, $assists, $motm, $owner)) {
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