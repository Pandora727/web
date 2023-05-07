<?php
$file = fopen("password.txt", "r");
$pws = array();
while (!feof($file)) {
    $line = rtrim(fgets($file));
    $elements = explode(":", $line);
    $pws[$elements[0]] = $elements[1];
}
fclose($file);
$users = array_keys($pws);

if (isset($_POST["register"])) {
    confirmRegistration($pws);
} else {
    signup($file, $pws);
}

#######################################################################

function signup($file, $pws)
{
    $id = $_GET['id'];
    print <<<TOP
  <html>
  <head>
  <title> Signup </title>
  <meta charset="UTF-8">
    <meta name="description" content="HW13 Signup">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="/cs329e-bulko/zf2638/HW13/cookies.css">
  </head>
  <body>

  <form method = "post" action = "register.php?id=$id">
  <h2> Sign-Up Sheet </h2>
  <div>Username: <input type="text" name="username" autofocus required></div>
  <div>Password: <input type="password" name="password" required></div>
  <input type = "submit" name = "register" value = "Register"></br>
  <a href="login.php?id=$id">Existing user? Login here</a>
  </form>
  </body>
  </html>
TOP;
}

#######################################################################

function confirmRegistration($pws)
{
    $id = $_GET['id'];
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $existing_users = array_keys($pws);
    for ($i=0;$i<count($existing_users);$i++){
        if ($username != $existing_users[$i]){
            if($i == count($existing_users)-1){
                $newfile = fopen("password.txt", 'a');
                $string = "\n".$username.":".$password;
                fwrite($newfile, $string);
                fclose($newfile);
            
                setcookie("username", $username, time() + 120, "/");
                setcookie("password", $password, time() + 120, "/");
                header("Location: cookies.php?id=$id");
                die();
            }
            else{continue;}
            
        } else{
            signup("password.txt", $pws);
            echo '<script type="text/javascript">
            alert("Username already exists! Please choose another username")
            </script>';
            
        }
    }
}
?>