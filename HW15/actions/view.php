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

    $viewFields = array("ID" => intval($_POST["ID"]), "LAST" => $_POST["LAST"], "FIRST" => $_POST["FIRST"]);

    if ($_POST["search"] == "View All Records") {
        $command = "SELECT * FROM STUDENTS ORDER BY LAST, FIRST;";
        // Issue the query
        $result = $db->query($command);

        print <<<TABLE
            <table>
                <tr><th>ID</th><th>Last Name</th><th>First Name</th><th>Major</th><th>GPA</th></tr>
        TABLE;
        while ($row = $result->fetch_row()) {
            echo "<tr><th>$row[0]</th><th>$row[1]</th><th>$row[2]</th><th>$row[3]</th><th>$row[4]</th></tr>";
        }
        print <<<END
            </table>
        END;

    } else if ($_POST["search"] == "Search Records") {
        if ($_POST["ID"] == "" && $_POST["LAST"] == "" && $_POST["FIRST"] == "") {
            $command = "SELECT * FROM STUDENTS ORDER BY LAST, FIRST;";
            // Issue the query
            $result = $db->query($command);

            print <<<TABLE
            <table>
                <tr><th>ID</th><th>Last Name</th><th>First Name</th><th>Major</th><th>GPA</th></tr>
        TABLE;
            while ($row = $result->fetch_row()) {
                echo "<tr><th>$row[0]</th><th>$row[1]</th><th>$row[2]</th><th>$row[3]</th><th>$row[4]</th></tr>";
            }
            print <<<END
            </table>
        END;

        } else {
            $command = "SELECT * FROM STUDENTS WHERE(";
            foreach ($viewFields as $key => $val) {
                if ($val != "" && $key == "ID") {
                    $command = $command . $key . " = $val AND ";
                } else if ($val != "" && $key != "ID") {
                    $command = $command . $key . " = \"$val\" AND ";
                }

            }
            $command = substr($command, 0, -5) . ");";

            $result = $db->query($command);

            if (mysqli_num_rows($result) == 0) {
                echo "<script type=\"text/javascript\">
                alert(\"No record matches!\")
                </script>";
            } else{

                print <<<TABLE
            <table>
                <tr><th>ID</th><th>Last Name</th><th>First Name</th><th>Major</th><th>GPA</th></tr>
        TABLE;
                while ($row = $result->fetch_row()) {
                    echo "<tr><th>$row[0]</th><th>$row[1]</th><th>$row[2]</th><th>$row[3]</th><th>$row[4]</th></tr>";
                }
                print <<<END
            </table>
        END;
            }

        }
    }
    ?>
    <div>
        <form method="post" action="view.php">
        <h2> View </h2>
            <input type="submit" id="all" name="search" value="View All Records" style="background-color: grey;>
            <table>
                <tr>
                    <th>ID</th>
                    <td><input type="text" id="id" name="ID"></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><input type="text" id="last" name="LAST"></td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td><input type="text" id="first" name="FIRST"></td>
                </tr>

            </table>
            <input type="submit" id="view" name="search" value="Search Records">
        </form>
        <form method="post" action="../Actions.php">
        <input type="submit" name = "home" value = "Back to Home Page" style="background-color: #4CAF50;">
        </form>
        <div>
        


</body>

</html>