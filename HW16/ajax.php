<html lang="en">

<head>
    <title>AJAX</title>
    <meta charset="UTF-8">
    <meta name="description" content="HW16 AJAX">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="/cs329e-bulko/zf2638/HW16/ajax.css">
</head>

<body>

    <script language="javascript" type="text/javascript">
        //Browser Support Code
        function ajaxFunction(server, user, pwd, dbName) {
            var ajaxRequest;  // The variable that makes Ajax possible!

            ajaxRequest = new XMLHttpRequest();

            // Create a function that will receive data sent from the server and will update
            // the div section in the same page.

            ajaxRequest.onreadystatechange = function () {
                if (ajaxRequest.readyState == 4) {
                    var ajaxDisplay = document.getElementById('ajaxDiv');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }

            // Now get the value from user and pass it to server script.

            var username = document.getElementById('user').value;
            var pwd = document.getElementById('pwd').value;
            var queryString = "?username=" + username;

            queryString += "&server=" + server + "&pwd=" + pwd + "&dbName=" + dbName;

            ajaxRequest.open("GET", "result.php" + queryString, true);
            ajaxRequest.send(null);
        }

    </script>



    <form method="POST" name="myForm">

        <h3>AJAX</h3>

        <?php
        $server = "spring-2023.cs.utexas.edu";
        $user = $_POST["user"];
        $pwd = $_POST["pwd"];
        $dbName = "cs329e_bulko_zf2638";

        $pwd = rawurlencode($pwd);

        // print just to confirm they got passed correctly
        echo "Server: <code>" . $server . "</code><br>";
        echo "User: <code>" . $user . "</code><br>";
        echo "Database name: <code>" . $dbName . "</code><br>";

        echo "<h3> Query: </h3>";
        echo "<table><tr><td>User:</td>";
        echo "<td> <input type = 'text' id = 'user' /> </td>";
        echo "</tr> <tr>";
        echo "<td>Password:</td>";
        echo "<td> <input type = 'text' id = 'pwd' /> </td>";
        echo "</tr> <tr> <td>";
        echo "<input type = \"button\" onclick = \"ajaxFunction('$server','$user','$pwd','$dbName')\" value = \"Submit\"/> <br><br> ";
        echo "</td> </tr>	</table>";
        ?>
    </form>


    <div id='ajaxDiv'>Result of query</div>
</body>

</html>