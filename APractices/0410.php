<?php
$server = "spring-2023.cs.utexas.edu";
$user = "cs329e_bulko_zf2638";
$pwd = "Tacke2Manage\$attain";
$dbName = "cs329e_bulko_zf2638";

$mysqli = new mysqli($server, $user, $pwd, $dbName);
// If it returns a non-zero error number, print a
// message and stop execution immediately
if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno .
        ": " . $mysqli->connect_error);
}

// create the query as a string
$command = "SELECT * FROM patrons WHERE
lastName = \"Eilish\"";

// Issue the query
$result = $mysqli->query($command);

if (!$result) {
    die("Query failed: ($mysqli->error <br> SQL command
    = $command");
}



//"readline"; 1st row
$row = $result -> fetch_row();
echo $row[0];
echo $row[1];
echo $row[2];

$row = $result -> fetch_assoc();
echo $row['p_id'];
echo $row['lastName'];
echo $row['firstName'];

$row = $result ->fetch_array(MYSQL_BOTH);
?>