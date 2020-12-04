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
        <main role="main">
                <?php 
        
            if ( isset($_SESSION['admin_id']) ) {
                // Grab user data from the database using the user_id
                // Let them access the "logged in only" pages
               //echo "<h4>Welcome Back " . $_SESSION["name"] . "</h4>";
               include "adminnav.inc.php"; //logout
               

            } else {
                // Redirect them to the login page
                header("Location: adminlogin.php");
                //include "nav.inc.php";
                
            }
        ?>
        <div class="container-fluid" id="main">
            <div class="row row-offcanvas row-offcanvas-left">
                <?php include "adminsidenav.inc.php";?>
                <!--/col-->

                <div class="col main pt-5 mt-3">
                    <h1 class="display-4 d-none d-sm-block">
                    Edit Movies
                    </h1>

                    <div class="row my-1">

                        <div class="col-lg-9 col-md-8">
                        <?php
                        
                        $movie_id = $desc = $errorMsg = $duration = $warning = $rdate = $catname = "";
                        $success = true;
                        
                        if(isset($_POST["MovieID"])){
                                $id=$_POST["MovieID"];
                                
                              
                        include "sqlconnector.php";
                        
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        
                        else{
                            $sql = "select * from movie_db.movie m, movie_db.movie_filter mf
                                                        where m.Category_ID = mf.Category_ID
                                                        AND m.Movie_ID = '$id'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0)
                            {

                                    //$row = $result->fetch_assoc();


                                     while($row = $result->fetch_assoc()){
                                         $movie_title = $row["Movie_Title"];

                                         $desc = $row["Description"];

                                         $rdate = $row["Release_Date"];

                                         $duration = $row["Duration"];

                                         $warning = $row["Warning"];

                                         $catname = $row["Category_Name"];

                                        }
                            }
                        }
                      }
                        ?>
                         
                        </div>
                    </div>
                    <div class="row my-1">


                        <div class="col-lg-9 col-md-8">
                            

                            <form action="processeditmovie.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="MovieTitle">Movie Title</label>
                                  <input required type="text" value="<?=$movie_title?>" name="mtitle" class="form-control" id="MovieTitle">
                                </div>
                              </div>


                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="description">Description</label>
                                  <input required type="text" value="<?=$desc?>" name="desc" class="form-control" placeholder="" id="description">
                                </div>
                              </div>

                            </div>


                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  
                                  <label for="date">Release Date</label>
                                  <input required type="date" value="<?=$rdate?>" name="rdate" class="form-control" placeholder="" id="date">
                                </div>


                              </div>


                              <div class="col-md-6">

                                <div class="form-group">
                                  <label for="Duration">Duration</label>
                                  <input required type="text" value="<?=$duration?>" name="duration" class="form-control" id="Duration" >
                                </div>
                              </div>

                            </div>



                            <div class="row">
                              <div class="col-md-6">

                                <div class="form-group">
                                  <label for="Warning">Warning</label>
                                    <select aria-label="warning" name="warning" class="form-control">
                                        <option value="(PG: Some Frightening Scenes)"<?=$warning == '(PG: Some Frightening Scenes)' ? ' selected="selected"' : '';?>>(PG: Some Frightening Scenes)</option>
                                        <option value="(NC16: Some Violence)"<?=$warning == '(NC16: Some Violence)' ? ' selected="selected"' : '';?>>(NC16: Some Violence)</option>
                                        <option value="(M18: Violence and Coarse Language)"<?=$warning == '(M18: Violence and Coarse Language)' ? ' selected="selected"' : '';?>>(M18: Violence and Coarse Language)</option>
                                      </select>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="status">Status</label>
                                    <select aria-label="status" name="status" class="form-control">
                                        <option value="1"<?=$catname == 'Upcoming' ? ' selected="selected"' : '';?>>Upcoming</option>
                                        <option value="2"<?=$catname == 'Now showing' ? ' selected="selected"' : '';?>>Now showing</option>

                                      </select>
                                    
                                </div>
                                 <!-- <input type="submit" value="Upload" name="submit"> -->
                              </div>
                                <input type='hidden' name='movie_id' value='<?=$id?>'>
                            </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                </form>




                            



                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
        </main>
    </body>
    
</html>

