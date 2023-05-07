<html>

<head>
    <title>Grade Result of the Quiz</title>
</head>

<body>
    <?php
    //Get form data values
    // $studentAnswers = array("TF1" => $_POST["1"], "TF2" => $_POST["2"], "MC3" => $_POST["3"], "MC4" => $_POST["4"], "FITB5" => $_POST["5"], "FITB6" => $_POST["6"]);
    $studentAnswers = array($_POST["1"], $_POST["2"], $_POST["3"], $_POST["4"], $_POST["5"], $_POST["6"]);

    $correctAnswers = array("F", "T", ["b"], ["c"], "http", "favicon");
    if (isset($_POST["grade"])) {
        gradeResult($correctAnswers, $studentAnswers);
    }

    function gradeResult($correctAnswers, $studentAnswers)
    {

        foreach ($studentAnswers as $val) {
            if (empty($val)) {
                echo '<script type="text/javascript">
                alert("All the questions must be answered! Please check again.")
                </script>';
                //TODO: return back to the previous page
                return;
            }
            else {
                $grade = 0;
                for ($i = 0; $i < count($studentAnswers); $i++) {
                    if ($i == 2 || $i == 3) {
                        if ($studentAnswers[$i] == $correctAnswers[$i]){
                        $grade += 1;}
                        else{continue;}

                    } else if (strtolower($studentAnswers[$i]) == strtolower($correctAnswers[$i])) {
                        $grade += 1;
                    } else {
                        continue;
                    }
                }
                print <<<result
                <script type="text/javascript">
                alert("Your grade is " + $grade + " / 6.")
                </script>
                result;
                return;
            }
        }

    }
    ?>
</body>

</html>