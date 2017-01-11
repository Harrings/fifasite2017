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
	if (!$stmt = $mysqli->query("SELECT Count(winner) as win, Sum(goalfw) as g1f, Sum(goalfl) as g1a FROM Games where winner='Sean'")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
	$row = mysqli_fetch_array($stmt);	
	$goalsfor=$row['g1f'];
	$goalsagainst=$row['g1a'];
	echo "<tr>" ;
	echo "<td>Sean </td>";
	echo "<td>" . $row['win'] . "</td>";
	if (!$stmt = $mysqli->query("SELECT Count(loser) as loss, Sum(goalfw) as g2a, Sum(goalfl) as g2f FROM Games where loser='Sean'")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
	$row = mysqli_fetch_array($stmt);
	$totalfor=$goalsfor+$row['g2f'];
	$totalagainst=$goalsagainst+$row['g2a'];
	echo "<td>" . $row['loss'] . "</td>";
	echo "<td>" . $totalfor  . "</td>";
	echo "<td>" . $totalagainst . "</td>";
	echo "</tr>" ;
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
	
?>
	</tbody>
</table>
<h2>Goal Count</h2>
<table class="center table-bordered" >
<thead> 
<tr>
    <th>Name</th> 
    <th>Goals</th> 
</tr> 
</thead>
<tbody>
<?php
//if (!isset($_SESSION["sort"])||($_SESSION["sort"]=="All"))
//{
	if (!$stmt = $mysqli->query("SELECT player, goals FROM GoalScorer WHERE Goals > 0 order by Goals DESC")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
	while($row = mysqli_fetch_array($stmt))	
{
	echo "<tr>" ;
	echo "<td>" . $row['player'] . "</td>";
	echo "<td>" . $row['goals'] . "</td>";
	echo "</tr>";
}
	
	
?>
</tbody>
</table>






	</body>
<?php include "footer.php"; ?>	
	

	
