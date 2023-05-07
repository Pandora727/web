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

    if (isset($_POST["delete"])){
        $ID = intval($_POST["ID"]);
        $command = "DELETE FROM STUDENTS WHERE ID = $ID";
        $result = $db -> query($command);
        if (!$result) {
            echo "<script type=\"text/javascript\">
            alert(\"Delete record failed!\")
            </script>";
            header("Refresh: 0; url=delete.php");
            die;
        } else {
            echo "<script type=\"text/javascript\">
            alert(\"Delete record succeeded!\")
            </script>";
        }

    }

    ?>
    <div>
        <form method="post" action="delete.php">
        <h2> Delete </h2>
            <table>
                <tr>
                    <th>ID</th>
                    <td><input type="text" id="id" name="ID" required></td>
                </tr>
            </table>
            <input type="submit" id="delete" name = "delete" value="Delete Record">
        </form>
        <form method="post" action="../Actions.php">
        <input type="submit" name = "home" value = "Back to Home Page" style="background-color: #4CAF50;">
        </form>
        <div>


</body>

</html>