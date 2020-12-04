<!DOCTYPE html>

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
        <link rel="stylesheet" href="css/seat.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script defer src="js/main.js"></script>
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
       <style>
                   @media screen and (max-width: 768px) {
  .container{
  padding-left: 55px;
  align-content: center;
  }
}</style>
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
        
         <?php

            $errorMsg = "";
            $movie_title1 = $_POST["movie_title"];
            $cinema1 = $_POST["cinema"];
            $showdate1 = $_POST["showdate"];
            $showtime1 = $_POST["showtime"];
            
            
            $success = true;
           
            include "sqlconnector.php";
            
                // Check connection
                if ($conn->connect_error){
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                    echo 'Failed connection';
                }
                else{
                    // Prepare the statement:
                    $stmt = $conn->prepare("SELECT  s.showtime, s.showdate, m.Movie_Title, c.Name, m.movie_id,
                        m.movie_Image, m.Duration, m.Description,  h.Type, h.Hall_ID, s.showID
            
                    FROM movie_db.showtime s, movie_db.movie m, movie_db.hall h, movie_db.cinemas c 
                    WHERE m.movie_id = s.Movie_ID
                    and h.Hall_ID = s.Hall_ID
                    and h.Cinema_ID = c.Cinema_ID
                    and m.movie_id = s.Movie_ID
                    and m.movie_title = ?
                    and c.Name = ?
                    and s.ShowDate = ?
                    and s.showtime = ?");
                    // Bind & execute the query statement:
                    $stmt->bind_param("ssss", $movie_title1,$cinema1,$showdate1,$showtime1);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0){
                        
                        $row = $result->fetch_assoc();
                        $movie_title = $row["Movie_Title"];
                        $Description = $row["Description"];
                        $movie_image = $row["movie_Image"];
                        $duration = $row["Duration"];
                        $cast = $row["Actor_Name"];
                        $cinematype = $row["Type"];
                        $hallid = $row["Hall_ID"];
                        $showid = $row["showID"];
                        $movieid = $row["movie_id"];
                    }
                    
                    else{ ?>
        
        <script>
                alert('There are no movie screening for this time-slot!');
                window.location.href='index.php';
        </script>
        
        <?php
                        $success = false;
                    
                    }
                    $stmt->close();
                }
                $conn->close();
            
          ?>
    
        <div class="container">
            <div class="row">
              <div class="col">
                <div class="card p-3 mb-2 bg-secondary text-white" style="width: 18rem;">
                    <img  aria-label="movie image" class="card-img-top" src="<?=$movie_image?>" alt="Movie Image">
                <div class="card-body">
                    <h1 aria-label="Title" style="font-size: 25px;" class="card-title ">Title: <?=$movie_title1?></h1>
                    <h2 aria-label="Details" style="font-size: 20px;"class="card-subtitle mb-2 text-light">Details</h2>
                    <p aria-label="Duration" class="card-subtitle mb-2 text-light">Duration: <?=$duration?></p>
                    <p aria-label="Actors" class="card-subtitle mb-2 text-light">Cast: Jill, John and Mary </p>
                    <p aria-label="Genre" class="card-subtitle mb-2 text-light">Genre: Happy, Sad, Sci-Fi </p>
                </div>
                </div>
              </div>
              <div style="padding-left: 40px;" class="col-8">
                <h1 aria-label="Synopsis" style="font-size: 35px;" class="card-title ">Synopsis</h1>
                    <p aria-label="Description" style="padding: 10px;" ><?=$Description?> <a href="#">read more</a></p>
                    <div class="card">
                        <div aria-label="Card-head" class="card-header">
                            You have selected <span class="text-warning" ><?=$movie_title1?></span> at<span class="text-warning" > <?=$cinema1?>,</span> <span class="text-warning" > <?=$cinematype?></span> Cinema Hall<span class="text-warning" > <?=$hallid?></span>
                        </div>
                        <div class="card-body">
                            <h2 aria-label="Showtime" class="card-title"><?=$showdate1?> at <?=$showtime1?></h2>
                          <h3 aria-label="Seat" class="card-text">View Seating Plan</h3>
                    
        
        <?php
        
         include "sqlconnector.php";
         ?>
            <form aria-label="Seatselection form" id="reservation" method="post" action="seatprocessing.php">
                <section aria-label="Seat" id="seats">
                  <input type='hidden' name='movie_title' value='<?=$movie_title1?>'>
                  <input type='hidden' name='cinema' value='<?=$cinema1?>'/>
                  <input type='hidden' name='showdate' value='<?=$showdate1?>'/>
                  <input type='hidden' name='showtime' value='<?=$showtime1?>'/>
                  <input type='hidden' name='hallid' value='<?=$hallid?>'/>
                  <input type='hidden' name='showid' value='<?=$showid?>'/>
                  <input type='hidden' name='movieid' value='<?=$movieid?>'/>
                          <?php
            
                // Check connection
                if ($conn->connect_error){
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                    echo 'Failed connection';
                }
                else{
                    $stmt = $conn->prepare("SELECT distinct t.SelSeatID
                    FROM  movie_db.showtime s, movie_db.movie_tickets t
                    Where t.Hall_ID = s.Hall_ID
                    And s.ShowID = ?
                    And s.Hall_ID = ?");
                    // Bind & execute the query statement:
                    $stmt->bind_param("ss", $showid,$hallid);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $selected[]= $row["SelSeatID"];

                        }
                        
                    }
                    // Prepare the statement:
                    $stmt = $conn->prepare("SELECT SeatID 
                    FROM movie_db.seat 
                    where  Hall_ID = ? ");
                    // Bind & execute the query statement:
                    $stmt->bind_param("s", $hallid);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0){
                        $i =0;
                        while($row = $result->fetch_assoc()){
                           $seatid = $row["SeatID"];
                           
                           if (empty($selected)){ ?>
                  
                           <input aria-label="Seat" id="seat-<?=$seatid?>" class="seat-select" type="checkbox" value="<?=$seatid?>" name="seat[<?=$seatid?>]" />
                           <label for="seat-<?=$seatid?>" class="seat"><?=$seatid?></label>
               
                           
                         <?php  
                            }
                            
                            else{
                           if (in_array($seatid, $selected)){
                               
                           ?>
                           <input aria-label="Seat" id="seat-<?=$seatid?>" class="seat-select" type="checkbox" value="<?=$seatid?>" name="seat[<?=$seatid?>]" />
                           <label style="background-color:red;" for="seat-<?=$seatid?>" class="seat"><?=$seatid?></label>
                        <?php   
                          
                            }
                            else{?>
                           <input aria-label="Seat" id="seat-<?=$seatid?>" class="seat-select" type="checkbox" value="<?=$seatid?>" name="seat[<?=$seatid?>]" />
                           <label aria-label="Seat" for="seat-<?=$seatid?>" class="seat"><?=$seatid?></label>
                                
                            <?php     }
                          }
                     }
                   }
                }
                            ?>
                </section>
                        
        <input type="submit"/>
        </form>
         </div>
                    </div>
              </div>
              <div class="col">
                
              </div>
            </div>
        </div>
        
             
        
        
    </main> 
         <?php include "footer.php"; ?> 

    </body>
    
</html>

