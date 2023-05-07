<html lang="en">

<head>
    <title>User Login</title>
    <meta charset="UTF-8">
    <meta name="description" content="HW13 Signup">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="/cs329e-bulko/zf2638/HW13/cookies.css">
</head>

<body>

    <?php
    $id = $_GET['id'];
    $file = fopen("password.txt", "r");
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
                setcookie("username", $username, time() + 120, "/");
                setcookie("password", $password, time() + 120, "/");
                $location = "Location: ./pages/" . $id . ".html";
                header($location);
                die;
            }
            if ($i == count($users) - 1) {
                echo '<script type="text/javascript">
                alert("Incorrect username or password")
                </script>';
                break;
            }
        }

    }
    ?>

    <!-- If the request was a GET, present the login screen instead -->
    <div>

        <form method="post" action="login.php?id=<?php echo $_GET['id'] ?>">
            <h2> Log In </h2>
            <div>Username: <input type="text" name="username" autofocus required></div>
            <div>Password: <input type="password" name="password" required></div>
            <input type="submit" value="Sign In"></br>
            <a href="register.php?id=<?php echo $_GET['id'] ?>" style="align-content:right;">New user? Register here</a>
        </form>
    </div>
</body>

</html>