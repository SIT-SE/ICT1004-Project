<html lang="en">


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
       
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--Custom CSS-->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/login.css">
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
       
        
        <?php
            $email= $errorMsg = "";
            $success = true;

            //Email
            //validating email
            if (empty($_POST["email"])){
             $errorMsg .= "Email is required.<br>";
             $success = false;
              
            }
            //Satnitizing input 
            else{
             $email = sanitize_input($_POST["email"]);
                // Additional check to make sure e-mail address is well-formed.
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errorMsg .= "Invalid email format.";
                    $success = false;    
                }
            }
            
            //No error
            if ($success){
             authenticateUser();
            }
            //Print all errors
            else{
             include "nav.inc.php";
             echo "<h3>Oops!</h3>";
             echo "<h4>The following input errors were detected:</h4>";
             echo "<p>" . $errorMsg . "</p>";
             exit();
            }
            
            //Helper function that checks input for malicious or unwanted content.
            function sanitize_input($data){
             $data = trim($data);
             $data = stripslashes($data);
             $data = htmlspecialchars($data);
             return $data;
            }
            
            function authenticateUser(){
                global $name, $email, $pwd_hashed, $errorMsg, $success;
                // Create database connection.
                include "sqlconnector.php";
                // Check connection
                if ($conn->connect_error){
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                    echo 'Failed connection';
                }
                else{
                    // Prepare the statement:
                    $stmt = $conn->prepare("SELECT * FROM movie_db.customers WHERE
                   email=?");
                    // Bind & execute the query statement:
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0){
                        // Note that email field is unique, so should only have
                        // one row in the result set.
                        $row = $result->fetch_assoc();
                        $name = $row["Name"];
                        $id = $row["Cust_ID"];
                        $pwd_hashed = $row["Password"];
                        // Check if the password matches:
                        if (!password_verify($_POST["pwd"], $pwd_hashed))
                        {
                        // Don't be too specific with the error message - hackers don't
                        // need to know which one they got right or wrong. :)
                            
                        include "nav.inc.php";
                        echo  "<h5>Login unsucessful!</h5>";
                        echo  "<h6>Email not found or password doesn't match...</h6>";
                        echo "<p>Please <a href=login.php>login</a> again!</p>";
                        $success1 = false;
                        }
                        
                        else if (password_verify($_POST["pwd"], $pwd_hashed)){
                        include "nav.inc.login.php";
                        session_start(); 
                        $_SESSION['user_id'] = $id;
                        $_SESSION["name"] = $name;
                        
                      
                   ?>
                       <script>
                            alert('Welcome to Yellow Village! <?=$_SESSION["name"]?>');
                            window.location.href='index.php';
                        </script>
                       <?php    
                        }

                    }
                   
                    else{
                        include "nav.inc.php";
                        echo  "<h5>Login unsucessful!</h5>";
                        echo  "<h6>Email not found or password doesn't match...</h6>";
                        echo "<p>Please <a href=login.php>login</a> again!</p>";
                        $success = false;
                    }
                    $stmt->close();
                   }
             $conn->close();
            }
            
            ?>
        
        

        </main>
        
       <?php include "footer.php";?> 
    </body>
</html>


