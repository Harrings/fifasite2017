<?php include "header.php"; ?>
<h2>Add Game</h2>
<form action="addgame.php" method="post">
		<p>Winner</p>
		<select name="winner">
<?php
if (!$stmt = $mysqli->query("SELECT id, wins, name FROM FifaUser order by wins DESC")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
		while($row = mysqli_fetch_array($stmt))	
		{
			echo"<option value=".$row['id'].">".$row['name']."</option>";
		}
?>
		</select>
		<p>Goals Scored: <select name="goalfw" />
		<?php
		
		for($x=0;$x<=6;$x++)
		{
			echo"<option value=".$x.">".$x."</option>";
		}
		?>
		</select>
		
		<p>Loser</p>
		<select name="loser">
<?php
if (!$stmt = $mysqli->query("SELECT id, wins, name FROM FifaUser order by wins DESC")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
		while($row = mysqli_fetch_array($stmt))	
		{
			echo"<option value=".$row['id'].">".$row['name']."</option>";
		}
?>
		</select>
		<p>Goals Scored: <select name="goalfl" />
		<?php
		
		for($x=0;$x<=6;$x++)
		{
			echo"<option value=".$x.">".$x."</option>";
		}
		?>
		</select>
		<br><br>
		<p>Motm
		<select name="Motm">
		<option value=null>None</option>
		<?php
//if (!isset($_SESSION["sort"])||($_SESSION["sort"]=="All"))
//{
		if (!$stmt = $mysqli->query("SELECT player, id FROM GoalScorer order by motm DESC")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}

		while($row = mysqli_fetch_array($stmt))	
		{
			echo"<option value=".$row['id'].">".$row['player']."</option>";
		}
		echo"</select>";
		?>
		<?php
		
	for($x=1;$x<=12;$x++)
	{
		echo "<div id=\"Goal".$x."\">";
		echo "<p>GoalScorer ".$x."</p>";
		echo"<select name=\"Goal".$x."\">";
		?>
		<br>
		<option value=null>None</option>
		<?php
//if (!isset($_SESSION["sort"])||($_SESSION["sort"]=="All"))
//{
		if (!$stmt = $mysqli->query("SELECT player, id FROM GoalScorer order by Goals DESC")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}

		while($row = mysqli_fetch_array($stmt))	
		{
			echo"<option value=".$row['id'].">".$row['player']."</option>";
		}
		echo"</select>";
		echo "<p>Assist ".$x."</p>";
		echo"<select name=\"Assist".$x."\">";
		?>
		<option value=null>None</option>
		<?php
		if (!$stmt = $mysqli->query("SELECT player, id FROM GoalScorer order by Assists DESC")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}

		while($row = mysqli_fetch_array($stmt))	
		{
			echo"<option value=".$row['id'].">".$row['player']."</option>";
		}
		echo"</select>";
		echo "<br>";
		echo "<br>";
		echo"</div>";
	}
		?>
		<br><br>
		<input type="submit" value="Submit">
</form>
<script src="js/jquery.js"></script>
<script src="js/creategame.js"></script>
<?php include "footer.php"; ?>	