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
        <!--jQuery-->
       <script defer 
       src="https://code.jquery.com/jquery-3.4.1.min.js"  
       integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  
       crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <!--Bootstrap JS--> 
       <script defer   
       src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"    
       integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"  
       crossorigin="anonymous"></script>
       <script defer src="js/main.js"></script>
       
              <style>
           @import "compass/css3";

            .movietable {
              margin: 1em 0;
              min-width: 300px; 
              tr {
                border-top: 1px solid #ddd;
                border-bottom: 1px solid #ddd;
              }

              th {
                display: none; 
              }

              td {
                display: block; 

                &:first-child {
                  padding-top: .5em;
                }
                &:last-child {
                  padding-bottom: .5em;
                }

                &:before {
                  content: attr(data-th)": "; 
                  font-weight: bold;


                  width: 6.5em; 
                  display: inline-block;


                }
              }

              th, td {
                text-align: left;

              }

            }


            .movietable {
              background: #34495E;
              color: #fff;
              border-radius: .4em;
              overflow: hidden;
              tr {
                border-color: lighten(#34495E, 10%);
              }
              th, td {
                margin: .5em 1em;

              }
              th, td:before {
                color: #dd5;
              }
            }
           
         /* dropdown css */   
         .big {
           font-size: 1.2em;
         }

         .small {
           font-size: .7em;
         }

         .square {
           width: .7em;
           height: .7em;
           margin: .5em;
           display: inline-block;
         }

         /* Custom dropdown */
         .custom-dropdown {
           position: relative;
           display: inline-block;
           vertical-align: middle;
           margin: 10px; /* demo only */
         }

         .custom-dropdown select {
           background-color: #2c3e50;
           color: #fff;
           font-size: inherit;
           padding: .5em;
           padding-right: 2.5em;	
           border: 0;
           margin: 0;
           border-radius: 3px;
           text-indent: 0.01px;
           text-overflow: '';
           -webkit-appearance: button; /* hide default arrow in chrome OSX */
         }

         .custom-dropdown::before,
         .custom-dropdown::after {
           content: "";
           position: absolute;
           pointer-events: none;
         }

         .custom-dropdown::after { /*  Custom dropdown arrow */
           content: "\25BC";
           height: 1em;
           font-size: .625em;
           line-height: 1;
           right: 1.2em;
           top: 50%;
           margin-top: -.5em;
         }

         .custom-dropdown::before { /*  Custom dropdown arrow cover */
           width: 2em;
           right: 0;
           top: 0;
           bottom: 0;
           border-radius: 0 3px 3px 0;
         }

         .custom-dropdown select[disabled] {
           color: rgba(0,0,0,.3);
         }

         .custom-dropdown select[disabled]::after {
           color: rgba(0,0,0,.1);
         }

         .custom-dropdown::before {
           background-color: rgba(0,0,0,.15);
         }

         .custom-dropdown::after {
           color: rgba(0,0,0,.4);
         }
         
         /* button css */
          .button {
            background-color: #F32C52; 
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;

            cursor: pointer;
          }

          .button4 {border-radius: 10px;}  
       </style>
    </head>
    
    <body>
        <main role="main">
        
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
        <div class="container-fluid" id="main">
        <hr>
        

        

        

        
        <div class="table-responsive">
        
        <table class="movietable" border="1" cellpadding="5" cellspacing="2" width="600">
        <tr>
            <th style="color:#dd5;">Cinema</th>
            <th style="color:#dd5;">Date</th>
            <th style="color:#dd5;">Show Time</th>

        </tr>
        <tr>
        <?php


        $name = $title = $showtime = $showdate = $movie_id = $movie_image = $errorMsg = "";
        $success = true;
        if(isset($_POST["MovieID"])){
            $movie_id=$_POST["MovieID"];
            //echo "$movie_id";
        
        
        include "sqlconnector.php";
        

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        else{
            //sql statement
            $sql = "select * 
                    from movie_db.movie m, 
                    movie_db.showtime s, 
                    movie_db.hall h, 
                    movie_db.cinemas c
                    where m.Movie_ID = s.Movie_ID 
                    AND s.Hall_ID = h.Hall_ID
                    AND h.Cinema_ID = c.Cinema_ID
                    AND m.Movie_ID = '$movie_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {

                    //$row = $result->fetch_assoc();
                    

                     while($row = $result->fetch_assoc()){
                         $movie_title = $row["Movie_Title"];
                         //$movie_image = $row["movie_Image"];
                         $cinema = $row["Name"];
                         $ShowDate= $row["ShowDate"];
                         $ShowTime = $row["ShowTime"];
                         
  
                            ?> 
            <tr>
                
                <td> <?=$cinema?></td>

                <td><?=$ShowDate?></td>
                
            
            <form action="processbooking.php" method="post">
                
                <td>
                       <input type='hidden' name='movie_title' value='<?=$movie_title?>'>
                       <input type='hidden' name='cinema' value='<?=$cinema?>'>
                       <input type='hidden' name='showdate' value='<?=$ShowDate?>'>
                       <input type='hidden' name='showtime' value='<?=$ShowTime?>'>
                       <button class='btn btn-success btn-sm edit btn-flat' name='ShowID' value='' type='submit'> <?=$ShowTime?></button>
                        
                </td>
            </form>
                
             </tr>
            
            <?php
                        }
            
             echo "<h2>$movie_title</h2>";
             echo "<p>Available cinemas, showdate and showtime shown below:</p>";
            // echo "<div class='col'>";
            // echo "<div class='card p-3 mb-2 bg-secondary text-white' style='width: 18rem;'>";
           //  echo "<img class='card-img-top' src='$movie_image' alt='Movie Image'>";
            // echo "<div class='card-body'>";
            // echo "<h5 class='card-title'>Title: </h5>";
            // echo "<h6 class='card-subtitle mb-2 text-light'>Details</h6>";
            // echo "<p class='card-subtitle mb-2 text-light'>Duration:  Minutes</p>";
            // echo "<p class='card-subtitle mb-2 text-light'>Cast:  </p>";
            // echo " <p class='card-subtitle mb-2 text-light'>Genre: Happy, Sad, Sci-Fi </p>";
             //echo  " </div>
             //   </div>
            //  </div>";
            }
            else
            {
                $errorMsg = "Data not found!";
                $success = false;
            }
        }

        }
            $conn->close();

        ?>
            
        </tr>
        </table>


        </div>
            
              
        </div>
      </main>  
         <?php include "footer.php"; ?> 
    </body>
    
    
</html>


