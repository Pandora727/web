<?php
    //start the session
    session_start();

?>
<!DOCTYPE html>
<html>
<body>
    <?php
    $_SESSION["univ"] = "Texas";
    $_SESSION["mascot"] = "Longhorns";
    echo "The session variables have been set";
    ?>
</body>
</html>