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
    $LN = $_POST["LAST"];
    $FN = $_POST["FIRST"];
    $MAJOR = $_POST["MAJOR"];
    $GPA = number_format(floatval($_POST["GPA"]), 2, '.', '');

    if (isset($_POST["insert"])){
        $command = "INSERT INTO STUDENTS VALUES($ID, \"$LN\", \"$FN\", \"$MAJOR\", $GPA)";
    
        // Issue the query
        $result = $db->query($command);
    
        // Verify the result
        if (!$result) {
            echo "<script type=\"text/javascript\">
            alert(\"Insert record failed!\")
            </script>";
            header("Refresh: 0; url=insert.php");
            die;
        } else {
            echo "<script type=\"text/javascript\">
            alert(\"Insert record succeeded!\")
            </script>";
        }


    }

   
    ?>

    <div>
        <form method="post" action="insert.php">
        <h2> Insert </h2>
            <table>
                <tr>
                    <th>ID</th>
                    <td><input type="text" id="id" name="ID" required></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><input type="text" id="last" name="LAST" required></td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td><input type="text" id="first" name="FIRST" required></td>
                </tr>
                <tr>
                    <th>Major</th>
                    <td><input type="text" id="major" name="MAJOR" required></td>
                </tr>
                <tr>
                    <th>GPA</th>
                    <td><input type="text" id="gpa" name="GPA" required></td>
                </tr>
            </table>
            <input type="submit" id="insert" name = "insert" value="Insert Record">

        </form>
        <form method="post" action="../Actions.php">
        <input type="submit" name = "home" value = "Back to Home Page" style="background-color: #4CAF50;">
        </form>
        <div>

</body>

</html>