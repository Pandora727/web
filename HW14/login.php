<html lang="en">

<head>
    <title>User Login</title>
    <meta charset="UTF-8">
    <meta name="description" content="HW14 Login">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="/cs329e-bulko/zf2638/HW14/quiz.css">
</head>

<body>

    <?php
    // $id = $_GET['id'];

    // append users & pw
    $file = fopen("password.txt", "r");
    $pws = array();
    while (!feof($file)) {
        $line = rtrim(fgets($file));
        $elements = explode(":", $line);
        $pws[$elements[0]] = $elements[1];
    }
    fclose($file);

    // append users & results
    $file2 = fopen('results.txt', "r");
    $results = array();
    while (!feof($file2)) {
        $line = rtrim(fgets($file2));
        $elements = explode(":", $line);
        $results[$elements[0]] = $elements[1];
    }
    fclose($file2);

    $users = array_keys($pws);

    // if the request method is post, verify the submitted username /pwd
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // get values submitted from the login form
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        for ($i = 0; $i < count($users); $i++) {
            if ($username == $users[$i] && $password == $pws[$users[$i]]) {
                if (in_array($username, array_keys($results)) && $results[$username] == null){
                    echo '<script type="text/javascript">
                    alert("test")
                    </script>';
                    session_start();
                    $_SESSION["username"] =$username;
                    $_SESSION["score"] = 0;
                    $_SESSION["id"] = 1;
                    $_SESSION["start"] = time();

                    $location = "Location: quiz.php";
                    header($location);
                    die;

                } else{
                    echo '<script type="text/javascript">
                    alert("You can not take the quiz twice!")
                    </script>';
                    header("Refresh: 0; url=login.php");
                    die;
                }
                   
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
    <div style="padding-top: 100px;">
        <form method="post" action="login.php">
            <h2> Log In </h2>
            <div>Username: <input type="text" name="username" autofocus required></div>
            <div>Password: <input type="password" name="password" required></div>
            <div style="text-align: center;"><input type="submit" id="login" value="Sign In"></div>
            <div style="text-align: right;"><a href="register.php" style="align-content:right;">New user? Register here</a></div>
        </form>
    </div>
</body>

</html>