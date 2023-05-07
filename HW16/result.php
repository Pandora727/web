<?php

   error_reporting(E_ALL);
   ini_set("display_errors", "on");
   
   $server = $_GET["server"];
   $username   = $_GET["username"];
   $pwd    = $_GET["pwd"];
   $dbName = $_GET["dbName"];

   // decode the urlencoded password
   $pwd    = urldecode($pwd);

   // print just to confirm they got passed correctly
   echo "Server: <code>".$server."</code><br>";
   echo "User: <code>".$user."</code><br>";
   echo "Database name: <code>".$dbName."</code><br><br>";
   
   // Connect to MySQL Server

   $mysqli = new mysqli($server, $user, $pwd, $dbName);

   if ($mysqli->connect_errno) {
      die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
   } else {
      echo "<code>...Connection successful</code> <br>";
   }
  
   //Select Database
   $mysqli->select_db($dbName) or die($mysqli->error);
      

   //build query
   echo "<code>...Building query</code><br>";
   $query = "SELECT * FROM USERS WHERE user = '$username'";
   
   //Execute query
   echo "<code>...Executing query</code><br><br>";
   $result = $mysqli->query($query) or die($mysqli->error);
   
   if ($result ->num_rows != 0){
        $row = $result  -> fetch_assoc();
        if ($row['pwd'] == $pwd){
            echo 'user exists';


        } else {
         
        }
    
   }
   
   
   //Build Result String
   $display_string = "<table border=2> <tr><th>User</th> <th>Password</th> </tr>";
   
   // Insert a new row in the table for each person returned
   while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $display_string .= "<tr>";
      $display_string .= "<td>$row[user]</td>";
      $display_string .= "<td>$row[pwd]</td>";
      $display_string .= "</tr>";
   }
   echo "Query: <code>" . $query . "</code> <br><br>";
   
   $display_string .= "</table>";
   echo $display_string;

?>