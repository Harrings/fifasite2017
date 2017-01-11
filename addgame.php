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
if (($_POST["winner"]==null))
{
	echo "Error to add a game it must have a name click <a href=\"index.php\">here</a> to return to inventory managment";
}
else
{
	$winner=$_POST["winner"];
	$loser=$_POST["loser"];
	$goalfw=$_POST["goalfw"];
	$goalfl=$_POST["goalfl"];
	$gs1=$_POST["Goal1"];
	$gs2=$_POST["Goal2"];
	$gs3=$_POST["Goal3"];
	$gs4=$_POST["Goal4"];
	$gs5=$_POST["Goal5"];
	$gs6=$_POST["Goal6"];
	$gs7=$_POST["Goal7"];
	$gs8=$_POST["Goal8"];
	$gs9=$_POST["Goal9"];
	$gs10=$_POST["Goal10"];
	$gs11=$_POST["Goal11"];
	$gs12=$_POST["Goal12"];
	$as1=$_POST["Assist1"];
	$as2=$_POST["Assist2"];
	$as3=$_POST["Assist3"];
	$as4=$_POST["Assist4"];
	$as5=$_POST["Assist5"];
	$as6=$_POST["Assist6"];
	$as7=$_POST["Assist7"];
	$as8=$_POST["Assist8"];
	$as9=$_POST["Assist9"];
	$as10=$_POST["Assist10"];
	$as11=$_POST["Assist11"];
	$as12=$_POST["Assist12"];
	$motm=$_POST["Motm"];
	
	if (!($stmt = $mysqli->prepare("UPDATE FifaUser SET wins=wins+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $winner)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	if (!($stmt = $mysqli->prepare("INSERT INTO Games(winner, loser, goalfw, goalfl) VALUES (?,?,?,?)"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		 $error=1;
	}
	if (!$stmt->bind_param("iiii", $winner, $loser, $goalfw,$goalfl)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		$error=1;
	}
	if (!$stmt->execute()) {
		//echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		$error=1;
	}
	$stmt->close();
	//add motm
	if ($motm!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET motm=motm+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs1)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs1!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs1)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs2!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs2)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs3!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs3)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs4!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs4)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs5!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs5)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs6!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs6)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs7!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs7)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs8!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs8)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs9!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs9)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs10!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs10)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs11!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs11)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($gs12!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET goals=goals+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $gs112)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	//add assists
		if ($as1!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as1)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($as2!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as2)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($as3!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as3)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($as4!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as4)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($as5!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as5)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($as6!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as6)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($as7!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as7)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($as8!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as8)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($as9!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as9)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($as10!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as10)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($as11!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as11)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	if ($as12!=null)
	{
		if (!($stmt = $mysqli->prepare("UPDATE GoalScorer SET assists=assists+1 WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("i", $as112)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
	}
	$error=0;
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
