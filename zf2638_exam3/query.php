<?php
// session_start();
error_reporting(E_ALL);
ini_set("display_errors", "on");

$server = "spring-2023.cs.utexas.edu";
$user = "cs329e_bulko_zf2638";
$pwd = "Tackle2Manage\$attain";
$dbName = "cs329e_bulko_zf2638";

$name = $_GET["name"];
$items = $_GET["items"];

$mysqli = new mysqli($server, $user, $pwd, $dbName);

if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
} else {
    echo "<h2>Potluck Form</h2> <br>";
}

$name = $mysqli->real_escape_string($name);
$items = $mysqli->real_escape_string($items);

//Select Database
$mysqli->select_db($dbName) or die($mysqli->error);


//build query
$query = "INSERT INTO dinner VALUES ('$name', '$items');";

if (mysqli_query($mysqli, $query)) {
    $query = "SELECT * FROM dinner";
    $result = $mysqli->query($query) or die($mysqli->error);
    //Build Result String
    $display_string = "<table border=2> <tr> <th>Name</th> <th>items</th> </tr>";
    
    // Insert a new row in the table for each person returned
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $display_string .= "<tr>";
        $display_string .= "<td>$row[name]</td>";
        $display_string .= "<td>$row[items]</td>";
        $display_string .= "</tr>";
    }
    $display_string .= "</table>";
    echo $display_string;
}

?>