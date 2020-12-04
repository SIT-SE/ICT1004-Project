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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="HandheldFriendly" content="true">
        <!--Bootstrap CSS-->
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"    integrity=   
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
        
         
        
        <main class = container>
            
            <div class="row">
                
                <div class="col">
                  <form action="processbooking.php" method="post">
                <div class="container mt-5 text-center">
                    <h2 class="text-center">Quick Buy</h2>
                    <br>
                    <div class="form-row align-items-center">
                           
                        <select class="custom-select mr-sm-2" name='movie_title' id="movie_title" aria-label="filter" >
                            <?php
                                include "sqlconnector.php";
                                // Check connection
                                if ($conn->connect_error){
                                    $errorMsg = "Connection failed: " . $conn->connect_error;
                                    $success = false;
                                    echo 'Failed connection';
                                }

                                else{
                                    // Prepare the statement:
                                    $sql =("SELECT Movie_Title FROM movie_db.movie");
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0){
                                        // Note that email field is unique, so should only have
                                        // one row in the result set.
                                        while($row = $result->fetch_assoc()) {
                                            $movie_title1 =$row["Movie_Title"];
                                            
                                ?>
                                    <option value='<?=$movie_title1?>'><?php echo $row["Movie_Title"];?></option>           
                                <?php
                                        }
                                    }

                                    else{
                                       echo "0 results";
                                    }

                                   }
                             $conn->close();
                        ?>
                     
                        </select><br>
                        
                        <select class="custom-select mr-sm-2" name='cinema' id="cinema" aria-label="filter">
                            <?php
                                include "sqlconnector.php";
                                // Check connection
                                if ($conn->connect_error){
                                    $errorMsg = "Connection failed: " . $conn->connect_error;
                                    $success = false;
                                    echo 'Failed connection';
                                }

                                else{
                                    // Prepare the statement:
                                    $sql =("SELECT DISTINCT Name FROM movie_db.cinemas");
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0){
                                        // Note that email field is unique, so should only have
                                        // one row in the result set.
                                        while($row = $result->fetch_assoc()) {
                                            
                                ?>
                                    <option value='<?=$row["Name"]?>'><?php echo $row["Name"];?></option>           
                                <?php
                                        }
                                    }

                                    else{
                                       echo "0 results";
                                    }

                                   }
                             $conn->close();
                        ?>
                     
                        </select><br>
                        <select class="custom-select mr-sm-2" name="showdate" id="showdate" aria-label="filter" >
                            <?php
                                include "sqlconnector.php";
                                // Check connection
                                if ($conn->connect_error){
                                    $errorMsg = "Connection failed: " . $conn->connect_error;
                                    $success = false;
                                    echo 'Failed connection';
                                }

                                else{
                                    // Prepare the statement:
                                    $sql =("SELECT DISTINCT ShowDate FROM movie_db.showtime");
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0){
                                        // Note that email field is unique, so should only have
                                        // one row in the result set.
                                        while($row = $result->fetch_assoc()) {
                                            
                                ?>
                                    <option value='<?=$row["ShowDate"]?>'><?php echo $row["ShowDate"];?></option>           
                                <?php
                                        }
                                    }

                                    else{
                                       echo "0 results";
                                    }

                                   }
                             $conn->close();
                        ?>
                     
                        </select><br>
                        <select class="custom-select mr-sm-2" name='showtime' id="showtime" aria-label="filter" >
                            <?php
                                include "sqlconnector.php";
                                // Check connection
                                if ($conn->connect_error){
                                    $errorMsg = "Connection failed: " . $conn->connect_error;
                                    $success = false;
                                    echo 'Failed connection';
                                }

                                else{
                                    // Prepare the statement:
                                    $sql =("SELECT DISTINCT ShowTime FROM movie_db.showtime");
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0){
                                        // Note that email field is unique, so should only have
                                        // one row in the result set.
                                        while($row = $result->fetch_assoc()) {
                                            
                                ?>
                                    <option value='<?=$row["ShowTime"]?>'><?php echo $row["ShowTime"];?></option>           
                                <?php
                                        }
                                    }

                                    else{
                                       echo "0 results";
                                    }

                                   }
                             $conn->close();
                        ?>
                     
                        </select><br>
                        
                       
                           
                    </div>
                    <br>
                    <div class="form-group d-inline">
                        <button class="btn btn-warning" type="submit">Book Now</button>
                    </div>
                </div>
            </form>
                </div>
                
              </div>
            </div>
           
            <br>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="http://18.210.125.27/Project/Images/blackwidow_slider.jpg" alt="Black Widow">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="http://18.210.125.27/Project/Images/mulan_slider.jpg" alt="Disney's Mulan">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="http://18.210.125.27/Project/Images/freaky_slider.jpg" alt="Freaky">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
                <br><br>
                <h3>What's On?</h3>
                <div class="container py-0" >
                <div class="row mt-4">

                    <?php
                    $whatson_images = $errorMsg = "";
                    $success = true;

                    //Connection credentials
                    include "sqlconnector.php";

                    $sql = "SELECT whatson_images, whatson_title, whatson_description FROM movie_db.whatson";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {


                        while ($row = $result->fetch_assoc()) {
                            ?>

                            <div class="col-md-4">
                                <div class="card-group">
                                    <figure>
                                        <img src= " <?php echo $row ["whatson_images"]; ?> " class = "card-img-top" alt = "What's On? Movie Deals, Promotions, TraceTogether">
                                        <br>
                                        <figcaption>
                                            <h4><?php echo $row ["whatson_title"]; ?></h4>
                                        </figcaption>
                                    </figure>
                                    <p><?php echo $row["whatson_description"];?></p>
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
                            <br>
            </div>       
        </main>

        <?php include "footer.php"; ?> 
    </body>
</html>