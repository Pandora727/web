<html lang="en">

<head>
    <title>Exam 3 Gabby Fan</title>
    <meta charset="UTF-8">
    <meta name="description" content="Exam 3">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="exam3.css">
</head>
<script language="javascript" type="text/javascript">

    function ajaxFunction() {

        var ajaxRequest;
        ajaxRequest = new XMLHttpRequest();
        ajaxRequest.onreadystatechange = function () {
            if (ajaxRequest.readyState == 4) {
                var ajaxDisplay = document.getElementById('ajaxDiv');
                ajaxDisplay.innerHTML = ajaxRequest.responseText;
            }
        }
        var name = document.getElementById("name").value;
        var items = document.getElementById("items").value;
        if (name != "" && items != "") {
            var query = "?name=" + name + "&items=" + items;
            ajaxRequest.open("GET", "query.php" + query, true);
            ajaxRequest.send(null);
        }
        else {
            alert("Please fill both fields to sign up the form.");
        }
    }

    function ajaxFunction2() {

        var ajaxRequest;
        ajaxRequest = new XMLHttpRequest();
        ajaxRequest.onreadystatechange = function () {
            if (ajaxRequest.readyState == 4) {
                var ajaxDisplay = document.getElementById('ajaxDiv');
                ajaxDisplay.innerHTML = ajaxRequest.responseText;
            }
        }
        ajaxRequest.open("GET", "form.php", true);
        ajaxRequest.send(null);
    }

</script>

<body onload="ajaxFunction2()">
    <?php
        session_start();
    if (isset($_SESSION['username'])) {

        print <<<HEAD
                <div style="padding-top: 50px">
                <form method="POST" name="myForm">
                <h3> Potluck Signup Form: </h3>
                <table><tr><td>Name:</td>
                <td> <input type = 'text' id = 'name' maxlength="20"/> </td>
                </tr> <tr>
                <td>Item(s):</td>
                <td> <input type = 'text' id = 'items' maxlength = "50"/> </td>
                </tr> <tr > <td colspan="2">
                <input type = "button" onclick = "ajaxFunction()" value = "Submit"/> <br><br> 
                </td></tr> <tr><td colspan="2"><input type = "reset" value = "Reset"/> </td></tr>	</table>    </form>
                HEAD;
    } else {
        $location = "Location: login.php";
        header($location);
        die;
    }
    ?>
    <form>
    <div id='ajaxDiv'>

            Result of query

    </div>
</form>


</body>

</body>

</html>