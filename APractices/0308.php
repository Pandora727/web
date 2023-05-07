<!DOCTYPE html>

<html lang="en">

<head>
    <title>Gabby </title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="Gabby Fan, Ziyue Fan">
    <link rel="stylesheet" href="/cs329e-bulko/zf2638/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="text-align:center">
    <h1 style="color:green">
        Pick it and click it </h1>
    <h4> and a PHP function will be called </h4>
    <?php
    if (isset($_POST['button1'])) {
        echo "Button 1 was selected";
    }
    if (isset($_POST['button2'])) {
        echo "Button 2 was selected";
    }
    ?>
    <?php

    $sizes = array("Large", "Medium", "Small");
    $size_prices = array(
        "Large" => "12.00",
        "Medium" => "10.00",
        "Small" => "8.00"
    );
    $topping_prices = array(
        "Large" => "1.25",
        "Medium" => "1.00",
        "Small" => "0.75"
    );
    $toppings = array(
        "pepperoni" => "Pepperoni",
        "sausage" => "Italian Sausage",
        "peppers" => "Green Bell Peppers",
        "onions" => "Onions",
        "olives" => "Black Olives",
        "mushrooms" => "Mushrooms",
        "anchovy" => "Anchovy"
    );

    if (isset($_POST["order"])) {
        confirmPage($sizes, $size_prices, $topping_prices, $toppings);
    } elseif (isset($_POST["confirm"])) {
        thanksPage();
    } else {
        orderForm($sizes, $size_prices, $topping_prices, $toppings);
    }

    #######################################################################
    
    function orderForm($sizes, $size_prices, $topping_prices, $toppings)
    {
        $script = $_SERVER['PHP_SELF'];
        print <<<TOP
 <html>
 <head>
 <title> Pizza Order Form </title>
 </head>
 <body>
 <h3> Pizza Order Form </h3>
 <form method = "post" action = "$script">
 <table border = "1">
   <tr><td><b>Select Size</b></td><td><b>Select Toppings</b></td></tr>
   <tr><td>
TOP;

        $len = sizeof($sizes);
        for ($i = 0; $i < $len; $i++) {
            $size = $sizes[$i];
            if ($size == "Large") {
                $checked = 'checked = "checked"';
            } else {
                $checked = "";
            }
            print <<<SIZE
   <input type = "radio" name = "size" value = "$size" $checked />
   <b> $size </b><br />
   Base Price: $$size_prices[$size] <br />
   Each Topping: $$topping_prices[$size] <br /><br />
SIZE;
        }
        print "</td><td>";

        foreach ($toppings as $key => $val) {
            print <<<TOPPING
   <input type = "checkbox" name = "top[]" value = "$key" />
   $val <br /><br />
TOPPING;
        }
        print "</td></tr>\n";

        print <<<BOTTOM
 <tr>
 <td><input type = "submit" name = "order" value = "Submit Order" /></td>
 <td><input type = "reset" value = "Reset" /></td>
 </tr>
 </table>
 </form>
 </body>
 </html>
BOTTOM;
    }

    #######################################################################
    
    function confirmPage($sizes, $size_prices, $topping_prices, $toppings)
    {
        $size = $_POST["size"];
        $script = $_SERVER['PHP_SELF'];
        print <<<PAGE2_TOP
   <html>
   <head>
   <title> Confirm Order </title>
   </head>
   <body>
   <p>
   You ordered a <b>$size</b> pizza. 
   </p>
PAGE2_TOP;

        $total = (float) $size_prices[$size];
        if (isset($_POST["top"])) {
            $priceTopping = (float) $topping_prices[$size];
            $top = $_POST["top"];
            print "<p> With the following toppings: </p> \n";
            print "<ul>";
            foreach ($top as $key => $val) {
                print "<li>";
                print $val;
                print "</li>";
                $total += $priceTopping;
            }
            print "</ul>";
        }
        $totalCost = sprintf("$%.2f", $total);
        print <<<PAGE2_BOTTOM
   <p>
   Total cost: $totalCost <br /><br />
   Please confirm.
   </p>
   <p>
   <form method = "post" action = "$script">
   <input type = "submit" name = "confirm" value = "Confirm Order" />
   </form>
   </p>
   </body>
   </html>
PAGE2_BOTTOM;
    }

    #######################################################################
    
    function thanksPage()
    {
        print <<<PAGE3
   <html>
   <head>
   <title> Place Order </title>
   </head>
   <body>
   <h2>
     Thank You for your Order.
   </h2>
   </body>
   </html>
PAGE3;
    }
    ?>
    <form method="post">
        <input type="submit" name="button1" value="Button1">
        <input type="submit" name="button2" value="Button2">
    </form>

</body>

</html>