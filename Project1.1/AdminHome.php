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
        
        <main role="main">
        <div class="container-fluid" id="main">
            <div class="row row-offcanvas row-offcanvas-left">

            <?php include "adminsidenav.inc.php";?>
                <div class="col main pt-5 mt-3">
                    <h1 class="display-4 d-none d-sm-block">
                    Yellow Village Dashboard
                    </h1>

                    <div class="row mb-3">
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body bg-success">
                                    <div class="rotate">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>

                                    <h1 style="font-size: 16px;" class="text-uppercase">Registered user</h1>
                    <?php


                    $success = true;

                    include "sqlconnector.php";
                    // Check connection
                    if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                    }

                    else{
                        //sql statement
                        $sql = "SELECT COUNT(Cust_ID)
                                FROM movie_db.customers";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0)
                        {
                            $row = $result->fetch_assoc();

                            echo "<h1 class='display-4'>".$row['COUNT(Cust_ID)']."</h1>";



                        }
                        else
                        {
                            $errorMsg = "Data not found!";
                            $success = false;
                        }
                    }

                        $conn->close();

                    ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-danger h-100">
                                <div class="card-body bg-danger">

                                    <h6 class="text-uppercase">Movies showing now</h6>
                                    <?php


                                        include "sqlconnector.php";
                                        // Check connection
                                        if ($conn->connect_error) {
                                          die("Connection failed: " . $conn->connect_error);
                                        }

                                        else{
                                            //sql statement
                                            $sql = "SELECT COUNT(Movie_ID)
                                            FROM movie_db.movie m, movie_db.movie_filter mf
                                            where m.Category_ID = mf.Category_ID
                                            AND mf.Category_Name = 'Now showing'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0)
                                            {
                                                $row = $result->fetch_assoc();

                                                echo "<h1 class='display-4'>".$row['COUNT(Movie_ID)']."</h1>";



                                            }
                                            else
                                            {
                                                $errorMsg = "Data not found!";
                                                $success = false;
                                            }
                                        }

                                            $conn->close();

                                        ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-info h-100">
                                <div class="card-body bg-info">
                                    <h1 style="font-size: 16px;" class="text-uppercase">Upcoming Movies</h1>
                                    <?php


                                        include "sqlconnector.php";
                                        // Check connection
                                        if ($conn->connect_error) {
                                          die("Connection failed: " . $conn->connect_error);
                                        }

                                        else{
                                            //sql statement
                                            $sql = "SELECT COUNT(Movie_ID)
                                            FROM movie_db.movie m, movie_db.movie_filter mf
                                            where m.Category_ID = mf.Category_ID
                                            AND mf.Category_Name = 'Coming Soon'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0)
                                            {
                                                $row = $result->fetch_assoc();

                                                echo "<h1 class='display-4'>".$row['COUNT(Movie_ID)']."</h1>";



                                            }
                                            else
                                            {
                                                $errorMsg = "Data not found!";
                                                $success = false;
                                            }
                                        }

                                            $conn->close();

                                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-warning h-100">
                                <div class="card-body">
                                   <h1 style="font-size: 16px;" class="text-uppercase">Total Bookings</h1>
                                    <h1 class="display-4">36</h1>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row my-4">

                        <div class="col-lg-9 col-md-8">
                            <form method="POST" action="EditMovie.php">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>ID</th>
                                            <th>Movie Title</th>
                                            <th>Date Released</th>
                                            <th>Status</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
        <?php


        $success = true;

        include "sqlconnector.php";
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        else{
            //sql statement
            $sql = "select * from movie_db.movie m, movie_db.movie_filter mf
					where m.Category_ID = mf.Category_ID
                                        order by m.Movie_ID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {



                     while($row = $result->fetch_assoc()){
                         echo "<tr>";
                            echo "<td>";
                            echo $row["Movie_ID"];
                            echo "</td><td>";
                            echo $row["Movie_Title"];
                            echo "</td><td>";
                            echo $row["Release_Date"];
                            echo "</td><td>";
                            echo $row["Category_Name"];
                            echo "</td>";
                            echo "<td>";

                            echo "<button aria-label='edit' class='btn btn-info btn-block' name='MovieID' value=".$row["Movie_ID"]." data-id='".$row["Movie_ID"]."'> Edit</button>";
                            echo "</td>";
                            

                            echo "</tr>";
                        }


            }
            else
            {
                $errorMsg = "Data not found!";
                $success = false;
            }
        }

            $conn->close();

        ?>
                                    </tbody>
                                </table>
                            </div>
                                </form>
                        </div>
                    </div>



                </div>

            </div>

        </div>
</main>
        
    </body>
    
</html>


