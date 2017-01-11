<?php include "header.php"; ?>
<h1>Fifa Track </h1>
<h2>Standings</h2>
<table class="center table-bordered" >
<thead> 
<tr>
    <th>Name</th> 
    <th>Wins</th> 
    <th>Losses</th> 
	<th>Goals for</th> 
    <th>Goals Allowed</th> 
</tr> 
</thead>
<tbody>
<?php
//if (!isset($_SESSION["sort"])||($_SESSION["sort"]=="All"))
//{
if (!$stmt2 = $mysqli->query("SELECT id, wins, name FROM FifaUser order by wins DESC")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}

	while($row2 = mysqli_fetch_array($stmt2))	
	{
		$userid=$row2['id'];
	
		if (!$stmt = $mysqli->query("SELECT Count(winner) as win, Sum(goalfw) as g1f, Sum(goalfl) as g1a FROM Games where winner=$userid")) {
			echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
		}
		$row = mysqli_fetch_array($stmt);	
		$goalsfor=$row['g1f'];
		$goalsagainst=$row['g1a'];
		echo "<tr>" ;
		echo "<td>" . $row2['name'] . "</td>";
		echo "<td>" . $row['win'] . "</td>";
		if (!$stmt = $mysqli->query("SELECT Count(loser) as loss, Sum(goalfw) as g2a, Sum(goalfl) as g2f FROM Games where loser=$userid")) {
			echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
		}
		$row = mysqli_fetch_array($stmt);
		$totalfor=$goalsfor+$row['g2f'];
		$totalagainst=$goalsagainst+$row['g2a'];
		echo "<td>" . $row['loss'] . "</td>";
		echo "<td>" . $totalfor  . "</td>";
		echo "<td>" . $totalagainst . "</td>";
		echo "</tr>" ;
	}
	/*
	if (!$stmt = $mysqli->query("SELECT Count(winner) as win, Sum(goalfw) as g1f, Sum(goalfl) as g1a FROM Games where winner='Will'")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
	$row = mysqli_fetch_array($stmt);	
	$goalsfor=$row['g1f'];
	$goalsagainst=$row['g1a'];
	echo "<tr>" ;
	echo "<td>Will </td>";
	echo "<td>" . $row['win'] . "</td>";
	if (!$stmt = $mysqli->query("SELECT Count(loser) as loss, Sum(goalfw) as g2a, Sum(goalfl) as g2f FROM Games where loser='Will'")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
	$row = mysqli_fetch_array($stmt);
	$totalfor=$goalsfor+$row['g2f'];
	$totalagainst=$goalsagainst+$row['g2a'];
	echo "<td>" . $row['loss'] . "</td>";
	echo "<td>" . $totalfor  . "</td>";
	echo "<td>" . $totalagainst . "</td>";
	echo "</tr>" ;
	if (!$stmt = $mysqli->query("SELECT Count(winner) as win, Sum(goalfw) as g1f, Sum(goalfl) as g1a FROM Games where winner='Clint'")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
	$row = mysqli_fetch_array($stmt);	
	$goalsfor=$row['g1f'];
	$goalsagainst=$row['g1a'];
	echo "<tr>" ;
	echo "<td>Clint </td>";
	echo "<td>" . $row['win'] . "</td>";
	if (!$stmt = $mysqli->query("SELECT Count(loser) as loss, Sum(goalfw) as g2a, Sum(goalfl) as g2f FROM Games where loser='Clint'")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
	$row = mysqli_fetch_array($stmt);
	$totalfor=$goalsfor+$row['g2f'];
	$totalagainst=$goalsagainst+$row['g2a'];
	echo "<td>" . $row['loss'] . "</td>";
	echo "<td>" . $totalfor  . "</td>";
	echo "<td>" . $totalagainst . "</td>";
	echo "</tr>" ;
	*/
	
?>
	</tbody>
</table>
<h2>Goal Count</h2>
<table class="center table-bordered" >
<thead> 
<tr>
    <th>Name</th> 
    <th>Goals</th> 
	<th>Assists</th> 
	<th>Motm</th> 
	<th>Owner</th> 
</tr> 
</thead>
<tbody>
<?php
//if (!isset($_SESSION["sort"])||($_SESSION["sort"]=="All"))
//{
	if (!$stmt = $mysqli->query("SELECT GS.player, GS.goals, GS.assists, GS.motm, FU.name FROM GoalScorer as GS INNER JOIN FifaUser as FU on GS.uid=FU.id  order by Goals DESC")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
	while($row = mysqli_fetch_array($stmt))	
{
	echo "<tr>" ;
	echo "<td>" . $row['player'] . "</td>";
	echo "<td>" . $row['goals'] . "</td>";
	echo "<td>" . $row['assists'] . "</td>";
	echo "<td>" . $row['motm'] . "</td>";
	echo "<td>" . $row['name'] . "</td>";
	echo "</tr>";
}
	
	
?>
</tbody>
</table>
<?php include "footer.php"; ?>	
	

	
