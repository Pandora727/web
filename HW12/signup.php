<?php
$file = fopen("signup.txt", "r");
$signupsheet = array();
while (!feof($file)) {
  $line = fgets($file);
  $elements = explode(",", $line);
  $signupsheet[$elements[0]] = $elements[1];
}

fclose($file);


if (isset($_POST["submit"])) {
  confirmSlot($signupsheet);
} else {
  signupSheet($file, $signupsheet);

}

#######################################################################

function signupSheet($file, $signupsheet)
{
  $script = $_SERVER['PHP_SELF'];
  print <<<TOP
  <html>
  <head>
  <title> Online Signup Sheet </title>
  <meta charset="UTF-8">
    <meta name="description" content="HW12 Signup Sheet">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="/cs329e-bulko/zf2638/HW12/signup.css">
  </head>
  <body>
  <h2> Sign-Up Sheet </h2>
  <form method = "post" action = "$script">
  <table border = "1">
TOP;

  $len = sizeof($signupsheet);
  $keys = array_keys($signupsheet);
  for ($i = 0; $i < $len; $i++) {
    $currKey = $keys[$i];
    if ($i == 0){
      print <<<TH
    <tr><th>$currKey</th><th> $signupsheet[$currKey]</th></tr>
    TH;
    }
    else if (strlen($signupsheet[$currKey]) > 2) {
      print <<<SIGNED
    <tr><th>$currKey</th><td> $signupsheet[$currKey]</td></tr>
    SIGNED;
    } else if (strlen($signupsheet[$currKey]) <= 2) {
      print <<<UNSIGNED
    <tr><th width="100px";>$currKey</th><td> <input type="text" id="$i" name="$i" size="20"> </td></tr>
    UNSIGNED;
    }
  }

  print <<<BOTTOM
  </table>
  <td colspan="2"><input type = "submit" name = "submit" value = "Submit" /></td>
  </form>
  </body>
  </html>
BOTTOM;
}

#######################################################################

function confirmSlot($signupsheet)
{
  $file = fopen("signup.txt", "r");
  $newsheet = array();
  for ($i = 0; $i < sizeof($signupsheet); $i++) {
    $line = rtrim(fgets($file));
    if ($i == 0) {
      $newsheet[0] = $line ."\n";
    } else if ($i>=1 && $i < sizeof($signupsheet)-1){
      $newsheet[$i] = $line . $_POST[$i] . "\n";
    } else{
      $newsheet[$i] = $line . $_POST[$i];
    }
  }
  fclose($file);
  $newfile = fopen("signup.txt", 'w');

  for ($i = 0; $i < sizeof($newsheet); $i++) {
    fwrite($newfile, $newsheet[$i]);
  }

  fclose($newfile);
  header("Location: signup.php");
  
}
?>