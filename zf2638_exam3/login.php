<html lang="en">

<head>
    <title>Exam 3 User Login</title>
    <meta charset="UTF-8">
    <meta name="description" content="Exam 3">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="exam3.css">
</head>

<body>

    <?php
    $user = "potluck";
    $pwd = "feedMeN0w";

    // if the request method is post, verify the submitted username /pwd
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // get values submitted from the login form
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        if ($username == $user && $password == $pwd){
            session_start();
                $_SESSION["username"] = $username;
                $location = "Location: signUp.php";
                                
                header($location);
                die;
        } else{
            echo '<script type="text/javascript">
            alert("Login Failed!")
            </script>';
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