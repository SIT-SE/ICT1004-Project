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
        <link rel="stylesheet" href="css/payment.css">

        
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
                header("Location: login.php");
                
                include "nav.inc.php";
                
                ?>
        <script>
                alert('Please login before booking!');
                window.location.href='login.php';
        </script>
        <?php
                
            }
        ?>
        
        
        <?php

            $errorMsg = "";
            $movie_title1 = $_POST["movie_title"];
            $cinema1 = $_POST["cinema"];
            $showdate1 = $_POST["showdate"];
            $showtime1 = $_POST["showtime"];
            $hallid = $_POST["hallid"];
            $showid = $_POST["showid"];
            $movieid= $_POST["movieid"];
            //var_dump($_POST['seat']);
            //print the structure of the array
            
       include "sqlconnector.php";
            
                // Check connection
                if ($conn->connect_error){
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                    echo 'Failed connection';
                }
                else{
                    // Prepare the statement:
                    $stmt = $conn->prepare("SELECT SeatID FROM movie_db.seat se, movie_db.movie_tickets t
                    where se.Hall_ID = t.Hall_ID
                    AND se.SeatID = t.SelSeatID
                    AND t.ShowID =?");
                    // Bind & execute the query statement:
                    $stmt->bind_param("s", $showid);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $checkseatid = $row["SeatID"];
                            
                            if (in_array($checkseatid, $_POST['seat'])){
                               unset($_POST['seat'][$checkseatid]); 
                            }
                            
                            
                        }
                        
                    }
                    foreach($_POST['seat'] as $value){
                                // Prepare the statement:
                            $sql = "INSERT INTO movie_db.movie_tickets ( ShowID,
                            Price, Hall_ID, Cust_ID, Movie_ID,SelSeatID) VALUES ('$showid','7', '$hallid', '{$_SESSION['user_id']}', '$movieid', '$value')";
                            if ($conn->query($sql) === TRUE) {
                                
                              } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                              }
                            
                            
                                
                                
                            }
                    
                }
           
            
            
            ?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <div class="container"> 
        <div class="card text-left">
            <div class="card-header">
                <h1 style="font-size: 30px;" class="panel-title display-td" >Payment Details</h1>
                                <div class="display-td" >                            
                                    <img alt="Credit Cards" class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                </div>
            </div>
            <div class="card-body">
                 <h2 style="font-size: 20px;" class="card-title">Please Confirm Tickets </h2>
                    <p class="card-text">Make payment to confirm your purchase. The tickets will be processed after payments. </p>
                    <form id="payment" method="post" action="ticket.php">
                        <div class="row">
                        <div class="col">
                      
                        <div class="form-group">
                                    <label  for="cardNumber">CARD NUMBER</label>
                                        <div class="input-group">
                                            <input aria-label="CreditCard"
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                            />
                                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                        </div>
                          </div> 
                          
                          
                        <div class="form-group">
                            <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                            <input aria-label="CardEXpiry"
                            type="tel" 
                            class="form-control" 
                            name="cardExpiry"
                            placeholder="MM / YY"
                            autocomplete="cc-exp"
                            required 
                            />
                        </div>
                        <div class="form-group">
                            <label for="postalCode">POSTAL CODE</label>
                            <input aria-label="Postalcode" type="text" class="form-control" name="postal" required/>
                            <input name="movie_title" type="hidden" value="<?=$movie_title1?>"/>
                            <input name="showdate" type="hidden" value="<?=$showdate1?>"/>
                            <input name="showtime" type="hidden" value="<?=$showtime1?>"/>
                            <input name="cinema" type="hidden" value="<?=$cinema1?>"/>
                            <input name="hallid" type="hidden" value="<?=$hallid?>"/>
                        </div>
                    
                    
                          
                    
                        </div>
                        <div class="col">
                         <div class="col-xs-5 col-md-5 pull-right">
                        <div class="form-group">
                            <label for="cardCVC">CV CODE</label>
                                <input aria-label="CV"
                                type="tel" 
                                class="form-control"
                                name="cardCVC"
                                placeholder="CVC"
                                autocomplete="cc-csc"
                                required
                                />
                        </div>
                    </div>
                    </div>
                    </div>
                        <button class="btn btn-primary" type="submit">Payment Confirm</button>
                    </form>
                     
                    
                   
            </div>
            <div class="card-footer text-muted">
                Payment by: <?=$_SESSION["name"]?>
            </div>
        </div>
        </div>
        
      
       


   
	 </main>  <?php include "footer.php"; ?> 
</body>

    
</html>
         