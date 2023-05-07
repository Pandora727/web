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
    $action = $_POST["action"];
    if ($action == "Insert") {
        header("Location: ./actions/insert.php");
        die();
    } else if ($action == "Update") {
        header("Location: ./actions/update.php");
        die();
    } else if ($action == "Delete") {
        header("Location: ./actions/delete.php");
        die();
    } else if ($action == "View") {
        header("Location: ./actions/view.php");
        die();
    } else if ($action == "Log Out") {
        print <<<Result
        <center><h2 style="padding-top: 100px;"> Thank you and bye. The page will redirect in 5 seconds... </h2></center>
    Result;
        session_unset();
        session_destroy();
        header("Refresh: 5; url=\"login.php\"");
        die();
    }
    ?>
    <div>
        <form method="post" action="Actions.php">
        <h2>SQL Actions</h2>
            <table>
                <tr>
                    <td>
                        <input type="submit" id="1" name="action" value="Insert">
                    </td>
                    <td>
                        <input type="submit" id="2" name="action" value="Update">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" id="3" name="action" value="Delete">
                    </td>
                    <td>
                        <input type="submit" id="4" name="action" value="View">
                    </td>
                </tr>
            </table>
            <div id="logout">
                <br /><br />
                <input type="submit" id="0" name="action" value="Log Out" style="background-color: grey;">
            </div>
        </form>
    </div>


</body>

</html>