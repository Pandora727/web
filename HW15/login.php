<html lang="en">

<head>
    <title>User Login</title>
    <meta charset="UTF-8">
    <meta name="description" content="HW15 SQL">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="/cs329e-bulko/zf2638/HW15/sql.css">
</head>

<body>

    <?php
    // append users & pw
    $file = fopen("passwd.txt", "r");
    $pws = array();
    while (!feof($file)) {
        $line = rtrim(fgets($file));
        $elements = explode(":", $line);
        $pws[$elements[0]] = $elements[1];
    }
    fclose($file);

    $users = array_keys($pws);

    // if the request method is post, verify the submitted username /pwd
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // get values submitted from the login form
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        for ($i = 0; $i < count($users); $i++) {
            if ($username == $users[$i] && $password == $pws[$users[$i]]) {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["server"] = 'spring-2023.cs.utexas.edu';
                $_SESSION["user"] = "cs329e_bulko_zf2638";
                $_SESSION["pwd"] = "Tackle2Manage\$attain";
                $_SESSION["dbName"] = "cs329e_bulko_zf2638";
                $location = "Location: Actions.php";
                
                header($location);
                die;
            }
            if ($i == count($users) - 1) {
                echo '<script type="text/javascript">
                alert("Login Failed!")
                </script>';
                break;
            }
        }

    }
    ?>

    <!-- If the request was a GET, present the login screen instead -->
    <div style="padding-top: 100px;">
        <form method="post" action="login.php">
            <h2> Log In </h2>
            <div>Username: <input type="text" name="username" autofocus required></div>
            <div>Password: <input type="password" name="password" required></div>
            <div style="text-align: center;"><input type="submit" id="login" value="Sign In"></div>
            <div><input type="reset" value="Reset"></div>
        </form>
    </div>
</body>

</html>