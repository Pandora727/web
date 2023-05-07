<?php
$file = fopen("password.txt", "r");
$pws = array();
while (!feof($file)) {
    $line = rtrim(fgets($file));
    $elements = explode(":", $line);
    $pws[$elements[0]] = $elements[1];
}
fclose($file);

// print_r($pws);


if (isset($_POST["register"])) {
    confirmRegistration($pws);
} else {
    signup($file, $pws);
}

#######################################################################

function signup($file, $pws)
{
    print <<<TOP
  <html>
  <head>
  <title> Signup </title>
  <meta charset="UTF-8">
    <meta name="description" content="HW14 Register">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="/cs329e-bulko/zf2638/HW14/quiz.css">
  </head>
  <body>
  <div style="padding-top:100px";>
  <form method = "post" action = "register.php">
  <h2> Sign-Up Sheet </h2>
  <div>Username: <input type="text" name="username" autofocus required></div>
  <div>Password: <input type="password" name="password" required></div>
  <div style="text-align: center;"><input type = "submit" name = "register" value = "Register"></br></div>
  <div style="text-align: right;"><a href="login.php">Existing user? Login here</a></div>
  </form>
  </div>
  </body>
  </html>
TOP;
}

#######################################################################

function confirmRegistration($pws)
{

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $existing_users = array_keys($pws);
    // echo "Existing: <br/>";
    // print_r($existing_users);

    // print_r(in_array($username,$existing_users)? "exist":"non-exist");

    for ($i=0;$i<count($existing_users);$i++){
        if ($username != $existing_users[$i]){
            if($i == count($existing_users)-1){
                // register new user
                $newfile = fopen("password.txt", 'a');
                $string = "\n".$username.":".$password;
                fwrite($newfile, $string);
                fclose($newfile);

                // set up blank score for new user
                $newfile2 = fopen("results.txt", "a");
                $string2 = "\n".$username.":";
                fwrite($newfile2,$string2);
                fclose($newfile2);

                session_start();
                $_SESSION["username"] =$username;
                $_SESSION["score"] = 0;
                $_SESSION["id"] = 1;
                $_SESSION["start"] = time();

                header("Location: quiz.php");
                die();
            }
            else{continue;}
            
        } else{
            signup("password.txt", $pws);
            echo '<script type="text/javascript">
            alert("Username already exists! Please choose another username")
            </script>';
            die();
            
        }
    }
}
?>