<html lang="en">

<head>
    <title>Gabby HW15</title>
    <meta charset="UTF-8">
    <meta name="description" content="HW15 SQL">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="/cs329e-bulko/zf2638/HW15/sql.css">
</head>

<body>

    <?php
    session_start();
    $db = new mysqli($_SESSION["server"], $_SESSION["user"], $_SESSION["pwd"], $_SESSION["dbName"]);

    $ID = intval($_POST["ID"]);

    $updatingFields = array("LAST" => $_POST["LAST"], "FIRST" => $_POST["FIRST"], "MAJOR" => $_POST["MAJOR"], "GPA" => $_POST["GPA"]);

    
    if (isset($_POST["update"])) {

        if ($_POST["LAST"] != "" || $_POST["FIRST"] != "" || $_POST["MAJOR"]!= "" || $_POST["GPA"] != "") {
            foreach ($updatingFields as $key => $val) {
                if ($val != "" && $key != "GPA") {
                    $command = "UPDATE STUDENTS SET $key = \"$val\" WHERE ID = $ID;";
                    // Issue the query
                    $result = $db->query($command);
                    // Verify the result
                    if (!$result) {
                        echo "<script type=\"text/javascript\">
            alert(\"Setting $key Failed!\")
            </script>";
                    } else {
                        echo "<script type=\"text/javascript\">
            alert(\"Set $key Succeed!\")
            </script>";
                    }

                } else if ($val != "" && $key == "GPA") {
                    $num = number_format(floatval($val), 2, '.', '');
                    $command = "UPDATE STUDENTS SET $key = $num WHERE ID = $ID";
                    // Issue the query
                    $result = $db->query($command);
                    // Verify the result
                    if (!$result) {
                        echo "<script type=\"text/javascript\">
                            alert(\"Updating $key failed!\")
                            </script>";
                    } else {
                        echo "<script type=\"text/javascript\">
                            alert(\"Updating $key succeeded!\")
                            </script>";
                    }
                } else {
                    continue;
                }
            }

        } else {
            echo "<script type=\"text/javascript\">
                            alert(\"Please fill at least one field other than ID to update the record!\")
                            </script>";

        }
    }
    ?>
    <div>
        <form method="post" action="update.php">
        <h2> Update </h2>
            <table>
                <tr>
                    <th>ID</th>
                    <td><input type="text" id="id" name="ID" required></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><input type="text" id="last" name="LAST"></td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td><input type="text" id="first" name="FIRST"></td>
                </tr>
                <tr>
                    <th>Major</th>
                    <td><input type="text" id="major" name="MAJOR"></td>
                </tr>
                <tr>
                    <th>GPA</th>
                    <td><input type="text" id="gpa" name="GPA"></td>
                </tr>
            </table>
            <input type="submit" id="update" name="update" value="Update Record">
        </form>
        <form method="post" action="../Actions.php">
        <input type="submit" name = "home" value = "Back to Home Page" style="background-color: #4CAF50;">
        </form>
        <div>


</body>

</html>