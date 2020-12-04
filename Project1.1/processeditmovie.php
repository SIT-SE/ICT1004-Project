<?php

$mtitle = $desc = $rdate = $status = $warning = $errorMsg = $duration = $catID = "";
$movie_id = $_POST["movie_id"];

$success = true;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
    if (!empty($_POST["mtitle"]))
    {
        $mtitle = sanitize_input($_POST["mtitle"]);
    }
    
    if (!empty($_POST["desc"]))
    {
        $desc = sanitize_input($_POST["desc"]);
    }
    
    if (!empty($_POST["rdate"]))
    {
        $rdate = sanitize_input($_POST["rdate"]);
    }
    
    if (!empty($_POST["duration"]))
    {
        $duration = sanitize_input($_POST["duration"]);
    }
    
    if (!empty($_POST["warning"]))
    {
        $warning = sanitize_input($_POST["warning"]);
    }
    
    if (!empty($_POST["status"]))
    {
        $catID = sanitize_input($_POST["status"]);
    }
}


function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;        
}

function updateMovie()
{
    global $mtitle, $desc, $rdate, $status, $warning, $duration, $errorMsg, $catID, $movie_id;

        include "sqlconnector.php";

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        else{
            $sql="UPDATE movie_db.movie SET Movie_Title = '$mtitle' , Description = '$desc' , Release_Date = '$rdate' , Duration = '$duration', Warning = '$warning', Category_ID = '$catID' WHERE Movie_ID='$movie_id'";
                if ($conn->query($sql) === TRUE) {
                  echo "Record updated successfully";
                } else {
                  echo "Error updating record: " . $conn->error;
                }
        }
        
         $conn->close();

}





?>


<html>
    <head>
        <title>Yellow Village</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        
        <!--Bootstrap CSS-->
       <link rel="stylesheet"
       href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"    integrity=   
       "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"crossorigin="anonymous">
        <!--Custom CSS-->
        <link rel="stylesheet" href="css/admin.css">
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
    </head>
    <body>
        <main>
            <?php    include "adminnav.inc.php";?> 
        <div class="container-fluid" id="main">
            <div class="row row-offcanvas row-offcanvas-left">
                <?php include "adminsidenav.inc.php";?>
                <!--/col-->

                <div class="col main pt-5 mt-3">
            <?php
            if ($success)
            {
                updateMovie();
                header("Location: AdminHome.php"); 

         
            }
            else
            {
                echo"<h2>Oops!</h2>";
                echo"<h4>The following errors were detected:</h4>";
                echo"<p>" . $errorMsg . "</p>";
                echo "<a href='AdminHome.php' class='btn btn-danger'></a>";
            }
            ?>

                </div>
            </div>

        </div>
        </main>
    </body>
</html>

