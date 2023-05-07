<html lang="en">

<head>
   <title>Gabby HW13</title>
   <meta charset="UTF-8">
   <meta name="description" content="HW13 Cookies">
   <meta name="author" content="Gabby Fan, Ziyue Fan">
   <link rel="stylesheet" href="/cs329e-bulko/zf2638/HW13/cookies.css">
</head>

<body>
   <?php
   $id = $_GET['id'];
   
   if (isset($id)) {
      if (!isset($_COOKIE["username"])) {
         header("Location: login.php?id=$id");
         die();
      } else {
         $location = "Location: ./pages/" . $id . ".html";
         header($location);
         die();

      }
   }
   ?>
   <div id="container">
      <div id="header">
         <div id="date">
            <p><strong>Wednesday, April 4, 2023</strong> <br>
               Today's Paper
            </p>
         </div>
         <div id="location">
            <p><strong><i class="fa fa-map-pin" aria-hidden="true"> </i> Austin, TX </strong></p>
            <?php 
            if(isset($_COOKIE['username'])){
               $user = $_COOKIE['username'];
               echo "Welcome, <strong>$user</strong>!";

            }
            ?>
         </div>
         <div id="title">
            <a href="cookies.php"><h1>The Daily Clarion</h1></a>
         </div>

      </div>

      <div id="right">
         <img src="/cs329e-bulko/zf2638/HW5/images/tech.jpg" alt="A picture of iPad" width="280px" height="auto">
         <caption style="text-align: right; font-style:italic;">NBC News</caption>
         <a href="cookies.php?id=ai">
            <h2>Elon Musk and several other technologists call for a pause on training of AI systems
            </h2>
         </a>
         <p>Companies researching AI are “locked in an out-of-control race to develop and deploy ever more powerful
            digital minds that no one — not even their creators — can understand, predict, or reliably control,” the
            letter says.</p>
      </div>

      <div id="central">
         <h1> Breaking News </h1>
         <div id="upper">
            <div>
               <img
                  src="https://static01.nyt.com/images/2023/02/15/fashion/15LAYOFF-TIK-TOK-top/15LAYOFF-TIK-TOK-top-square320-v2.jpg?format=pjpg&quality=75&auto=webp&disable=upscale"
                  alt="Photo">
               <a href="cookies.php?id=tiktok">
                  <h3>There's a Much Smarter Way to Take On TikTok</h3>
               </a>
               <p>4 MIN READ</p>
            </div>
            <hr>
            <div>
               <img
                  src="https://static01.nyt.com/images/2023/02/09/multimedia/00nat-bruce-top-wbjq/00nat-bruce-top-wbjq-square320-v2.jpg?format=pjpg&quality=75&auto=webp&disable=upscale"
                  alt="Photo">
               <a href="cookies.php?id=beach">
                  <h3>Bruce's Beach Was Hailed as a Reparations Model. Then the Family Sold It.</h3>
               </a>
               <p>8 MIN READ</p>
            </div>
            <hr>
            <div>
               <img
                  src="https://static01.nyt.com/images/2023/02/09/multimedia/00nat-bruce-top-wbjq/00nat-bruce-top-wbjq-square320-v2.jpg?format=pjpg&quality=75&auto=webp&disable=upscale"
                  alt="Photo">
               <a href="cookies.php?id=air">
                  <h3>"Air" Review: The Game Changers</h3>
               </a>
               <p>8 MIN READ</p>
            </div>
            <hr>
            <div>
               <img
                  src="https://static01.nyt.com/images/2023/02/16/multimedia/00cli-recharge-01-bcqg/00cli-recharge-01-bcqg-square320.jpg?format=pjpg&quality=75&auto=webp&disable=upscale"
                  alt="CA">
               <a href="cookies.php?id=rain">
                  <h3>Parched California Misses a Chance to Store More Rain Underground</h3>
               </a>
               <p>6 MIN READ</p>
            </div>

         </div>
      </div>
      <div id="footer">
         Copyright &copy; 2023 Gabby Fan. All Rights Reserved <br>
         Website Design/Photos/Content Reference - <a href="https://www.nytimes.com/"
            style="text-decoration: none; font-style: italic; color:#333;">The New York Times</a> <br>
         Email Us: <a href="mailto:gabbyfanfake@123.com" style="text-decoration: none; font-style: italic; color:#333;">
            gabbyfanfake@123.com </a>
      </div>



</body>