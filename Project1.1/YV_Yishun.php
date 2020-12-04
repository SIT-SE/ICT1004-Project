<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"    integrity=   
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--Custom CSS-->
        <link rel="stylesheet" href="css/main.css">
        <!--jQuery-->
        <script defer 
                src="https://code.jquery.com/jquery-3.4.1.min.js"  
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  
        crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <!--Bootstrap JS--> 
        <script defer   
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"    
                integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"  
        crossorigin="anonymous"></script>

        <script defer src="js/main.js"></script>
        
    </head>

    <body>
        
        
        <?php 
        
            if ( isset($_SESSION['user_id']) ) {
                // Grab user data from the database using the user_id
                // Let them access the "logged in only" pages
               //echo "<h4>Welcome Back " . $_SESSION["name"] . "</h4>";
               include "nav.inc.login.php"; //logout
               

            } else {
                // Redirect them to the login page
                //header("Location: http://www.yourdomain.com/login.php");
                include "nav.inc.php";    
            }
        ?>
        <main>
            
            <hr>
            
            <div class="location">
                    <?php
                   $name = $description = $location = $image = $errorMsg = "";
        $success = true;

        /// Connection credentials
    include "sqlconnector.php";
                    

                        $sql = "select Name, Address, MRT, BUS 
                    from movie_db.cinema_locations where cinema_ID = 13";
                     $result = $conn->query($sql);
                     
                      if ($result->num_rows > 0)          {

                while($row = $result->fetch_assoc()){
                        ?>
            
            <h1><?php echo $row["Name"];?></h1>
            <hr>
<!--                            <h4 class="title"> <?php echo $row["Name"];?> </h4>-->
            
                            <h6>Address: </h6>
                            <?php echo $row["Address"];?><br>
                            <h6>Public Transport </h6>
                            <?php echo $row["MRT"];?><br>
                            <?php echo $row["BUS"];?>
                    <?php
                          
                        }
            }
            else
            {
              $errorMsg = "Data not found!";
                $success = false;
           }
                     
                    ?>
                  </div> 
            
            
            <div class="map-responsive" style="margin-left:70px; margin-bottom: 50px; margin-top: 50px;">
    
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.5759674792716!2d103.83428561475414!3d1.4298642989571915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da146587625131%3A0xa6925dd51beee040!2sGolden%20Village%20Yishun!5e0!3m2!1sen!2ssg!4v1605889777577!5m2!1sen!2ssg" 
            width="1200" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
</main>
         <?php include "footer.php"; ?> 
    </body>
</html>
