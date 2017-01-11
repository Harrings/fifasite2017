<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "harrings-db", "minstFy7WEjCWSCr", "harrings-db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if(!$mysqli->query("CREATE Table Games(
id INT auto_increment PRIMARY KEY,
winner INT NOT NULL,
goalfw INT unsigned default 0,
loser INT NOT NULL,
goalfl INT unsigned default 0,
rented boolean NOT NULL default 0,
FOREIGN KEY (winner) REFERENCES FifaUser(id),
FOREIGN KEY (loser) REFERENCES FifaUser(id)
);
")) {
	echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if(!$mysqli->query("CREATE Table FifaUser(
id INT auto_increment PRIMARY KEY,
name VARCHAR (255) NOT NULL Unique,
club VARCHAR (255),
wins int default 0
);
")) {
	echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if(!$mysqli->query("CREATE Table GoalScorer(
id INT auto_increment PRIMARY KEY,
player VARCHAR (255) NOT NULL Unique,
uid INT default NULL,
motm INT default 0,
assists INT default 0,
goals INT default 0,
FOREIGN KEY (uid) REFERENCES FifaUser(id)
);
")) {
	echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
?>