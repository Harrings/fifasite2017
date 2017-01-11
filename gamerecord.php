<?php include "header.php"; ?>
<h2>Game Records</h2>
<?php 
$players=array();
$playersid=array();
if (!$stmt = $mysqli->query("SELECT name, id FROM FifaUser")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
while($row = mysqli_fetch_array($stmt))	
{
	if ((!(in_array($row['name'], $players)))&&($row['name']!=null))
	{
		array_push($players,$row['name']);
		array_push($playersid,$row['id']);
	}
}

?>

<div align="center">
<select name="sortp1" id="p1">
<option value="All">All</option>
<?php
$x=count($players);
for ($i=0;$i<$x; $i++)
{
	echo "<option value=$players[$i]>$players[$i]</option>";
}
?>
</select>
 vs 
<select name="sortp2" id="p2">
<option value="All">All</option>
<?php
$x=count($players);
for ($i=0;$i<$x; $i++)
{
	echo "<option value=$players[$i]>$players[$i]</option>";
}
?>
</select>
</div>
<table class="center table-bordered" id="games" >
<thead> 
<tr>
    <th>Winner</th> 
    <th>Goal Scored</th> 
    <th>Loser</th> 
    <th>Goal Scored</th> 
    <th>Delete</th>
</tr> 
</thead>
<tbody>
<?php
//$cats=array();
/*
$p1='Sean';
$p2='Clint';
if(isset($_POST['sortp1']))
{
	$p1=$_POST['sortp1'];
}
if(isset($_POST['sortp2']))
{
	$p2=$_POST['sortp2'];
}
if (!$stmt = $mysqli->query("SELECT id, winner, goalfw, loser, goalfl FROM Games where (winner='$p1' and loser='$p2') or (winner='$p2' and loser='$p1')")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
*/
if (!$stmt = $mysqli->query("SELECT id, winner, goalfw, loser, goalfl FROM Games")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
while($row = mysqli_fetch_array($stmt))	
{
	$winner=$row['winner'];
	$loser=$row['loser'];
	$key = array_search($winner, $playersid);
	$winner=$players[$key];
	$key = array_search($loser, $playersid);
	$loser=$players[$key];
	echo "<tr>" ;
	echo "<td>" . $winner . "</td>";
	echo "<td>" . $row['goalfw'] . "</td>";
	echo "<td>" . $loser. "</td>";
	echo "<td>" . $row['goalfl'] . "</td>";
	echo "<td><form method=\"POST\" action=\"delete.php\">";
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
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.shake.js"></script>
<script src="js/gamerecord.js"></script>
<?php include "footer.php"; ?>	