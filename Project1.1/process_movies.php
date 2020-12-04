<?php

$mtitle = $desc = $rdate = $mimage = $warning = $errorMsg = $duration = $catID = "";
$ratings = 0;
$catID = 1;
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
    
    if (!empty($_POST["warning"]))
    {
        $warning = sanitize_input($_POST["warning"]);
    } 
    
    if (!empty($_POST["duration"]))
    {
        $duration = sanitize_input($_POST["duration"]);
    } 
    
    if (!empty($_POST["mimage"]))
    {
        $duration = sanitize_input($_POST["duration"]);
    } 
    
    if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0){
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    $filename = $_FILES["anyfile"]["name"];
    $filetype = $_FILES["anyfile"]["type"];
    $filesize = $_FILES["anyfile"]["size"];
    

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)) die("Error! Please select a valid file format.");
    

    $maxsize = 10 * 1024 * 1024;
    if($filesize > $maxsize) die("Error! File size is larger than the allowed limit.");
    

    if(in_array($filetype, $allowed)){

            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                if(move_uploaded_file($_FILES["anyfile"]["tmp_name"], "/var/www/html/Project/upload/" . $filename)){
                    $mimage = "upload/" . $filename;
                    echo "Your file was uploaded successfully.";
                    //echo "<img src='upload/$filename'>";
                    
                }
                
                else{

                   echo "File cannot be uploaded";
                }
                
            } 
            
        } 
        
        else{
            echo "Error! Unable to upload file!"; 
        }
    } else{
        echo "Error! " . $_FILES["anyfile"]["error"];
    }
    
    
}


function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;        
}

function saveMovies()
{
    global $mtitle, $desc, $rdate, $ratings, $mimage, $warning, $duration, $errorMsg, $catID;
    $ratings = 0;
    $catID = 2;
        include "sqlconnector.php";

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        else{
              $stmt = $conn->prepare("INSERT INTO movie_db.movie (Movie_Title, Ratings, Description, Release_Date, movie_Image, Warning, Duration, Category_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

             $stmt->bind_param("ssssssss", $mtitle, $ratings, $desc, $rdate, $mimage, $warning, $duration, $catID);
             if (!$stmt->execute())
             {
                $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                $success = false;
             }
             $stmt->close();
        }
        
         $conn->close();

}

?>

<html>
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
                saveMovies();
                header("Location: AdminHome.php"); 
                //echo "<h2>Add Movie successful!</h2>";
                //echo "<h4>You are adding, " . $mtitle . " </h4>";
                //echo "<br> $rdate";
                //echo "<br> $desc";
                //echo "<br> $warning";
                //echo "<br> $duration";
                //echo "<br> $mimage <br>";
                //echo "<img src='upload/$filename'>";               
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