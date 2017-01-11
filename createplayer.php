<?php include "header.php"; ?>
<h1>Fifa Track</h1>
<h2>Add Player</h2>
<form action="addplayer.php" method="post">
		<p>Player</p>
		<input type="text" name="player"><br>
		<p>Goals</p>
		<input type="number" name="goals" value=0><br>
		<p>Assists</p>
		<input type="number" name="assists" value=0><br>
		<p>Motm</p>
		<input type="number" name="motm" value=0><br>
		<p>Owner</p>
		<select name="owner">
		<option value=null>None</option>
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
		<input type="submit" value="Submit">
</form>
<?php include "footer.php"; ?>	