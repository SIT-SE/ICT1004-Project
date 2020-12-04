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
        <link rel="stylesheet" href="css/register.css">
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
        <?php  include "nav.inc.php";?> 
        <main>
        <?php

            $name = $email= $errorMsg = "";
            $pwd = $_POST["pwd"];
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


            

            //Name 
            //validating Last Name
            if (empty($_POST["name"])){
             $errorMsg .= "Name is required.<br>";
             $success = false;
            }
            //Satnitizing input 
            else{
             $name = sanitize_input($_POST["name"]);
            }

            //pwd
            // Validationg Pwd
            //validating pwd
            if (empty($_POST["pwd"])){
             $errorMsg .= "Password is required.<br>";
             $success = false;
            }

            else if(empty($_POST["pwd_confirm"])){
                $errorMsg .= "Confirm Password is required.<br>";
                $success = false;   
            }
            // Hash Password
            else if($_POST["pwd"] == $_POST["pwd_confirm"] ){
                $pwd_hashed = password_hash($pwd, PASSWORD_DEFAULT);
            }

            else{
                $errorMsg .= " Passwords don't match.<br>";
                $success = false;   

            }

            //No error
            if ($success){
            saveMemberToDB();
             echo "<h3>Your Registration is successful!</h3>";
             echo "<h4>Thank you for signing up ". $name ."</h4>";
             echo "<p>" . $errorMsg . "</p>";
             echo "<br>";
             
            }
            //Print all errors
            else{
             echo "<h3>Oops!</h3>";
             echo "<h4>The following input errors were detected:</h4>";
             echo "<p>" . $errorMsg . "</p>";
            }


            //Helper function that checks input for malicious or unwanted content.
            function sanitize_input($data){
             $data = trim($data);
             $data = stripslashes($data);
             $data = htmlspecialchars($data);
             return $data;
            }
            
            function saveMemberToDB(){
                global $name,  $email, $pwd_hashed, $errorMsg, $success;
                include "sqlconnector.php";
            
                // Check connection
                 if ($conn->connect_error){
                     echo 'heloo222';
                       $errorMsg = "Connection failed: " . $conn->connect_error;
                       $success = false;

                 }
                else{
                        // Prepare the statement:
                            $stmt = $conn->prepare("INSERT INTO movie_db.customers (name,
                            email, password) VALUES (?, ?, ?)");
                            // Bind & execute the query statement:
                            $stmt->bind_param("sss",  $name, $email, $pwd_hashed);
                            if (!$stmt->execute()){
                               $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
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

