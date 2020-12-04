<html lang="en">
<?php
// Always start this first
session_start();
?>

    <head>
        <title>Yellow Village</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="HandheldFriendly" content="true">

        <!--Bootstrap CSS-->
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"    
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--Custom CSS-->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/tickets.css">
        <!--jQuery-->
        <script defer 
                src="https://code.jquery.com/jquery-3.4.1.min.js"  
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  
        crossorigin="anonymous"></script>

        <!--Bootstrap JS--> 
        <script defer   
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"    
                integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"  
        crossorigin="anonymous"></script>

        <script defer src="js/main.js"></script>
    </head>

    <body>
        
       <body>
           <main>
         <?php 
        
            if ( isset($_SESSION['user_id']) ) {
                // Grab user data from the database using the user_id
                // Let them access the "logged in only" pages
              
               include "nav.inc.login.php"; //logout
               

            } else {
                // Redirect them to the login page
                //header("Location: http://www.yourdomain.com/login.php");
                include "nav.inc.php";
                
            }
        ?> 


            <?php
            
            $movie_title1 = $_POST["movie_title"];
            $cinema1 = $_POST["cinema"];
            $showdate1 = $_POST["showdate"];
            $showtime1 = $_POST["showtime"];
            $hallid = $_POST["hallid"];
            
            $cvc =$postal=$cardEXP= $cardNumber = $errorMsg = "";
            $success = true;

            //Email
            //validating card number 
            if (empty($_POST["cardNumber"])){
             $errorMsg .= "Card Number is required.<br>";
             $success = false;
              
            }
            //validating card expiry
            if (empty($_POST["cardExpiry"])){
             $errorMsg .= "Card Expiry is required.<br>";
             $success = false;
              
            }
            //validating card postal
            if (empty($_POST["postal"])){
             $errorMsg .= "Postal Code is required.<br>";
             $success = false;
              
            }
            //validating card postal
            if (empty($_POST["cardCVC"])){
             $errorMsg .= "Postal Code is required.<br>";
             $success = false;
              
            }
            //Satnitizing input 
            else{
             $cardNumber = sanitize_input($_POST["cardNumber"]);
             $cardEXP = sanitize_input($_POST["cardExpiry"]);  
             $postal = sanitize_input($_POST["postal"]);  
             $cvc = sanitize_input($_POST["cardCVC"]);  
            }
            
            //No error
            if ($success){
             //
            }
            //Print all errors
            else{
             
             echo "<h3>Oops!</h3>";
             echo "<h4>The following input errors were detected:</h4>";
             echo "<p>" . $errorMsg . "</p>";
             exit();
            }
            
            //Helper function that checks input for malicious or unwanted content.
            function sanitize_input($data){
             $data = trim($data);
             $data = stripslashes($data);
             $data = htmlspecialchars($data);
             return $data;
            }
            ?>

           
           
           
           <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Booking Successful by <?=$_SESSION["name"]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted">See you soon!</h6>
                  <p class="card-text">Movie Title: <?=$movie_title1?></p>
                  <p class="card-text">Cinema: <?=$cinema1?></p>
                 <p class="card-text">Hall: <?=$hallid?></p>
                  <p class="card-text">Showtime: <?=$showdate1?> <?=$showtime1?></p>
                  <a href="index.php" class="card-link">Go Home</a>
                  <a href="movies.php" class="card-link">Browse More Movies</a>
                </div>
              </div>
           </main>
            <?php include "footer.php"; ?> 
    </body>

</html>