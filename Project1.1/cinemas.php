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
       href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"    
       integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--Custom CSS-->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/cinema.css">
        <!--jQuery-->
       <script defer 
       src="https://code.jquery.com/jquery-3.4.1.min.js"  
       integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  
       crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script defer src="js/main.js"></script>

       <!--Bootstrap JS--> 
       <script defer   
       src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"    
       integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"  
       crossorigin="anonymous"></script>
    </head>
    
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
            <div>
                <h6 class="header">
                    Movie Theatres

                </h6>

                <p class="intro">
                    Yellow Village Multiplex Pte Ltd is Singapore's leading cinema 
                    exhibitor with 14 multiplexes, housing 112 screens, located at Yishun, Bishan 
                    Junction 8, Tiong Bahru Plaza, Jurong Point, Tampines Mall, Great World City, 
                    Plaza Singapura, 112 Katong, City Square, Suntec City, VivoCity, Paya Lebar 
                    – home to Singapore’s first all-laser cinema, and Bedok. YV is the first local
                    cinema company to personalise the movie-going experience through its Movie Club
                    program. Today, YV has a reputation of offering the widest choice of movies, 
                    state-of-the-art design, convenience and unparalleled comfort, with all cinemas
                    newly refurbished between 2010 to 2019.<br><br>

                    In June 2019, YV introduced its 14th multiplex at the revamped Funan mall and 
                    features the two new premium affordable seat types - Deluxe Plus and Gold Class
                    Express theatres. The Deluxe Plus auditorium features single sleek and spacious 
                    leatherette seats designed with lumbar cushions for superior support and comfort,
                    together with a recline option, while the new Gold Class Express hall features
                    plush leatherette electronic recliner seats like YV’s iconic GOLD CLASS cinemas,
                    but without the call button, at an enticing price. These are YV’s two new seat
                    types, adding on to the current offerings of GOLD CLASS, Duo Deluxe, Gemini, 
                    D-BOX, GVmax DOLBY ATMOS, Grand Seats and Auro 11.1 by Barco. At YV Funan, YV
                    has expanded on its entertainment offerings by including four new Virtual Reality
                    pods in its foyer, offering immersive virtual reality gaming and cinematic 
                    content for patrons to enjoy.
                </p>
            </div>
            <hr>
            <div class="vertical-menu" >
                <!--  <a href="#" class="active">Home</a>-->
                <a href="YV_Funan.php">YV Funan</a>
                <a href="YV_Bedok.php">YV Bedok</a>
                <a href="YV_PayaLebar.php">YV Paya Lebar</a>
                <a href="YV_TiongBahru.php">YV Tiong Bahru</a>
                <a href="YV_SuntecCity.php">YV Suntec City</a>
                <a href="YV_VivoCity.php">YV Vivocity</a>
                <a href="YV_Plaza.php">YV Plaza</a>
                <a href="YV_Tampines.php">YV Tampines</a>
                <a href="YV_JurongPoint.php">YV Jurong Point</a>
                <a href="YV_Bishan.php">YV Bishan</a>
                <a href="YV_CitySquare.php">YV City Square</a>
                <a href="YV_Grand.php">YV Grand , Great World City</a>
                <a href="YV_Yishun.php">YV Yishun</a>
            </div>




            <div class="container py-0" >
                <div class="row mt-4">

                    <?php
                    $name = $description = $location = $image = $errorMsg = "";
                    $success = true;

                    //Connection credentials
                    // Connection credentials
    include "sqlconnector.php";

                    $sql = "select Name, descriptions_, seats_image 
                    from movie_db.seats_class";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {


                        while ($row = $result->fetch_assoc()) {
                            ?>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src= " <?php echo $row ["seats_image"]; ?> " class = "card-img-top" alt = "Cinema Images">
                                        <h4 class="title"><?php echo $row ["Name"]; ?> </h4>
                                        <p class="description"> <?php echo $row["descriptions_"]; ?> </p>
            <!--                            <p class="card-text"><?php echo $row["Location"]; ?></p>-->

                                    </div>

                                </div>

                            </div>

                            <?php
                           
                        }


                    } else {
                        $errorMsg = "Data not found!";
                        $success = false;
                    }
                    ?>
                </div>

            </div>
        
         
        
          
        </main>
 <?php include "footer.php"; ?>
    </body>

      
</html>

