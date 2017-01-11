<?php include "header.php";
if (isset($_POST["nameid"]))
	{
	$nameset=$_POST["nameid"];
	if (!($stmt = $mysqli->prepare("Select player, goals, assists, motm FROM GoalScorer WHERE id=?"))) {
		 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	if (!$stmt->bind_param("i", $nameset)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	$stmt->bind_result($players, $goals, $assists, $motm);
	$stmt->fetch();
	$stmt->close();
	}
?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.shake.js"></script>
<script src="js/editplayer.js"></script>
<h2>Edit Player</h2>
<section id="playerinfo">
<form action="" method="post">
		<p>Player</p>
		<input type="text" id="player" name="player" value="<?php echo htmlspecialchars($players); ?>">
		<p>Goals</p>
		<input type="number" name="goals" id="goals" value="<?php echo htmlspecialchars($goals); ?>">
		<p>Assists</p>
		<input type="number" name="goals" id="assists" value="<?php echo htmlspecialchars($assists); ?>">
		<p>Motm</p>
		<input type="number" name="goals" id="motm" value="<?php echo htmlspecialchars($motm); ?>">
		<?php echo "<input type=\"hidden\" id=\"nameid\" value=\"".$nameset."\">"; ?>
		<input type="submit" class="button button-primary" value="Update" id="update"/>
<span class='msg'></span> 

<section id="invalid">

</section>	

</section>
<?php include "footer.php"; ?>	