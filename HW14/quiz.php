<html lang="en">

<head>
    <title>Gabby HW13</title>
    <meta charset="UTF-8">
    <meta name="description" content="HW14 Quiz">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="/cs329e-bulko/zf2638/HW14/quiz.css">
    <script>
        function EndQuiz(score) {

        }
    </script>
</head>

<body>

    <?php
    $quizzes = array(
        1 => "
        <b>1. </b>\"URL\" stands for \"Universal Reference Link\".
        <input type=\"radio\" id=\"1T\" name=\"1\" value=\"T\">
        <label for=\"1T\">a&#41; True </label>
        <input type=\"radio\" id=\"1F\" name=\"1\" value=\"F\">
        <label for=\"1F\">b&#41; False </label>",
        2 => "<b>2. </b>An Apple MacBook is an example of a Linux system.
        <input type=\"radio\" id=\"2T\" name=\"2\" value=\"T\">
        <label for=\"2T\">a&#41; True </label>
        <input type=\"radio\" id=\"2F\" name=\"2\">
        <label for=\"2F\">b&#41; False </label>",
        3 => " <b>3. </b>Which of these do NOT contribute to packet delay in a packet switching network? <br>
        <input type=\"checkbox\" id=\"3a\" name=\"3[]\" value=\"a\">
        <label for=\"3a\">a&#41; Processing delay at a router</label><br>
        <input type=\"checkbox\" id=\"3b\" name=\"3[]\" value=\"b\">
        <label for=\"3b\">b&#41; CPU workload on a client</label><br>
        <input type=\"checkbox\" id=\"3c\" name=\"3[]\" value=\"c\">
        <label for=\"3c\">c&#41; Transmission delay along a communications link</label><br>
        <input type=\"checkbox\" id=\"3d\" name=\"3[]\" value=\"d\">
        <label for=\"3d\">d&#41; Propagation delay</label>
    ",
        4 => "<b>4. </b>This Internet layer is responsible for creating the packets that move across the
    network.<br>
    <input type=\"checkbox\" id=\"4a\" name=\"4[]\" value=\"a\">
    <label for=\"4a\">a&#41; Physical</label><br>
    <input type=\"checkbox\" id=\"4b\" name=\"4[]\" value=\"b\">
    <label for=\"4b\">b&#41; Data Link</label><br>
    <input type=\"checkbox\" id=\"4c\" name=\"4[]\" value=\"c\">
    <label for=\"4c\">c&#41; Network</label><br>
    <input type=\"checkbox\" id=\"4d\" name=\"4[]\" value=\"d\">
    <label for=\"4d\">d&#41; Transport</label>
",
        5 => "<b>5. </b> <input type=\"text\" id=\"network\" name=\"5\" size=\"5\"> is a networking protocol
that runs
over TCP/IP, and governs communication between web browsers and web servers.",
        6 => "<b>6. </b> A small icon displayed in a browser table that identifies a website is called a
<input type=\"text\" id=\"icon\" name=\"6\" size=\"5\">.
"
    );
    $correctAnswers = array(1 => "F", 2 => "T", 3 => ["b"], 4 => ["c"], 5 => "http", 6 => "favicon");

    session_start();
    if (isset($_SESSION["start"])) {
        if (time() - $_SESSION["start"] >= 900 || $_SESSION["id"] > 6 || isset($_SESSION['end'])) {
            $final_result = $_SESSION['score'];
            $user = $_SESSION['username'];

            // record the final score associated with user in the results.txt
    
            $file = file_get_contents("results.txt");
            $f = fopen("results.txt", "w+");
            $newstring = str_replace($_SESSION['username'] . ":", $_SESSION['username'] . ":" . $_SESSION['score'], $file);
            fwrite($f, $newstring);
            fclose($f);

            print <<<Result
                <center><h2 style="padding-top: 100px;"> Your quiz session ends! $user's final score is $final_result/60. The page will redirect in 10 seconds... </h2></center>
            Result;
            session_unset();
            session_destroy();
            header("Refresh: 10; url=\"login.php\"");
            die();
        }

    }
    if (!isset($_SESSION["username"])) {
        header("Location:login.php");
        die();
    } else {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = $_SESSION["id"];
            $studentAnswer = $_POST[$id];

            if ($studentAnswer == "") {
                echo "<script type='text/javascript'> alert('Please do not leave the qustion blank!'); </script>";

            } else {
                if ($studentAnswer == $correctAnswers[$id]) {
                    $_SESSION['score'] += 10;
                }
                ;
                $_SESSION["id"] += 1;
                if (isset($_POST["end"])) {
                    $_SESSION['id'] = 7;
                }
                header("Location: quiz.php");
                die();
            }

        }
    }
    $id = $_SESSION['id'];
    echo "Welcome, " . $_SESSION['username'] . "! ";
    echo "You have " . number_format(15 - (time() - $_SESSION['start']) / (60), 0, ".", "") . " minutes left. ";
    print <<<QuestionBegin
            <div style="padding-top:100px;">
            <form id="quiz" method="post" action="quiz.php">
                <table style="margin:auto;">
                    <tr>
                        <td>
            QuestionBegin;

    echo $quizzes[$id] . "<br/>";
    print <<<QuestionEnd
            </td></tr>
            <tr>
                <td style="display:inline;">
                <input type="submit" name="end" value="Submit" style="margin-right:170px; background-color:#4CAF50; " >
                <input type="submit" name="grade" value="Next Question">
                        </td>
                    </tr>
                </table>
            </form> 
            </div>
        QuestionEnd;
    ?>



</body>