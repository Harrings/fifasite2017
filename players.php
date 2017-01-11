<?php include "header.php"; ?>
<h2>Game Records</h2>
<table class="center table-bordered" >
<thead> 
<tr>
    <th>Player</th> 
    <th>Goals Scored</th> 
    <th>Assists</th> 
    <th>Motm</th> 
    <th>Edit</th> 
    <th>Delete</th>
</tr> 
</thead>
<tbody>
<?php
//$cats=array();
if (!$stmt = $mysqli->query("SELECT player, goals, assists, motm, id FROM GoalScorer")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
while($row = mysqli_fetch_array($stmt))	
{
	echo "<tr>" ;
	echo "<td>" . $row['player'] . "</td>";
	echo "<td>" . $row['goals'] . "</td>";
	echo "<td>" . $row['assists'] . "</td>";
	echo "<td>" . $row['motm'] . "</td>";
	echo "<td><form method=\"POST\" action=\"editplayer.php\">";
	echo "<input type=\"hidden\" name=\"nameid\" value=\"".$row['id']."\">";
	echo "<input type=\"submit\" value=\"edit\">";
	echo "</form> </td>";
	echo "<td><form method=\"POST\" action=\"deleteplayer.php\">";
	echo "<input type=\"hidden\" name=\"nameid\" value=\"".$row['id']."\">";
	echo "<input type=\"submit\" value=\"delete\">";
	echo "</form> </td>";
	echo "</tr>";
}
/*
if (!$stmt = $mysqli->query("SELECT category FROM VSTORE")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
while($row = mysqli_fetch_array($stmt))	
{
	if ((!(in_array($row['category'], $cats)))&&($row['category']!=null))
	{
		array_push($cats,$row['category']);
	}
}

	
?>

<form action="filter.php" method="POST">
<div align="center">
<select name="sort">
<option value="All">All Movies</option>
<?php
$x=count($cats);
for ($i=0;$i<$x; $i++)
{
	echo "<option value=$cats[$i]>$cats[$i]</option>";
}
?>
</select>
</div>
<input type="submit" value="Filter">
</form>
<form method="POST" action="deleteall.php">
<input type="hidden" name="deletekey" value="xjy">
<input type="submit" value="delete all">
</form>
*/
?>
</tbody>
</table>
<?php include "footer.php"; ?>	