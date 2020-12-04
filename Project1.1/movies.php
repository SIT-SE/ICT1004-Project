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
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--Custom CSS-->
        <link rel="stylesheet" href="css/main.css">
        
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
        <?php

// Connection credentials
    include "sqlconnector.php";

// check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// store the SQL statement (fetch category data (Now Showing and Coming Soon) from the 'movie_filter' table)
$tab_query = "SELECT * FROM movie_db.movie_filter ORDER BY Category_ID";
$tab_result = $conn->query($tab_query);

// to store dynamic HTML content for creating the dynamic tab
$tab_menu = '';

// to append dynamic HTML which will be fetched from the movie table
$tab_content = '';

// $count variable will be incremented by 1 on every loop interval
$count = 0;

// Dynamic Tab
while ($row = $tab_result->fetch_assoc()) {
    
    // this will allow us to see the content of the first tab (Now Showing) when the page loads   
    if ($count == 0) {
        $tab_menu .= '
        <li class="nav-item">
            <a class="nav-link active" href="#m' . $row["Category_ID"] . '" data-toggle="tab">' . $row["Category_Name"] . '</a>
        </li>';
        
        $tab_content .= '<div id="m'.$row["Category_ID"].'" class="tab-pane fade show active">';
    } else {
        // the class="active" is removed as only one tab content will be visible
        $tab_menu .= '
        <li class="nav-item">
            <a class="nav-link" href="#m' . $row["Category_ID"] . '" data-toggle="tab">' . $row["Category_Name"] . '</a>
        </li>';
        
        $tab_content .= '<div id="m'.$row["Category_ID"].'" class="tab-pane fade">';
    }
    
    // fetch Now Showing/Coming Soon tab data from the 'movie' table
    $movie_query = "SELECT * FROM movie_db.movie WHERE Category_ID = '".$row["Category_ID"]."'";
    $movie_result = $conn->query($movie_query);
    
    // Content of the Dynamic Tabs
    while($sub_row = $movie_result->fetch_assoc())
    {   
        $category_id = $row["Category_ID"];

        $tab_content .= '   
        <div class="col-md-4 movieBox">
        <form action="booking.php" method="post">
            <div>
            <img src="'.$sub_row["movie_Image"].'" class="img-responsive img-thumbnail" alt="'.$sub_row["Movie_Title"].'"/>
            </div>
                <div class ="movietext">               
                <h1 style="font-size: 20px;">'.$sub_row["Movie_Title"].'</h1>
                <p><i>'.$sub_row["Warning"].'</i></p>
                <p>'.$sub_row["Duration"].'</p> 
                 <button class="btn btn-warning btn-sm edit btn-flat" name="MovieID" value="'.$sub_row["Movie_ID"].'" data-id="'.$sub_row["Movie_ID"].'"> Book</button>
            </div>
            </form>
        </div>
        ';
    }            
    // every interval value of this $count variable will be increased by 1
    $count++;
    $tab_content .= '</div>';
}
?>


      
        <div class="container">
            <!-- Create a dynamic tab using Bootstrap -->
            <br>
          
                <ul class="nav nav-tabs">
                <!-- This will create dynamic tab from fetch data from movie_filter table -->
                <?php echo $tab_menu; ?>
            </ul>
            
            <div class="tab-content">
                <?php echo $tab_content; ?>
            </div>
            
            
        </div>
        </main>
            <?php include "footer.php"; ?> 
    </body>

     
</html>