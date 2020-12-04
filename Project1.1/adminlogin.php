<html lang="en">
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
       
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--Custom CSS-->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/admin_1.css">
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
        <?php include "nav.inc.php";?> 
        <main role="main">
    <div class="login-form">
        <form action="process_admin.php" method="post">
            <div class="avatar">
                <img src="http://18.210.125.27/Project/Images/avatar.png" alt="Avatar">
            </div>
            <h2 style="color:black" class="text-center">Admin Login</h2>   
            <div class="form-group">
                <input aria-label="email" type="email" class="form-control" id="email" name="email"
                           maxlength="45" placeholder="Email" required="required">
            </div>
            
            <div class="form-group">
                <input aria-label="password" type="password" class="form-control" id="pwd" name="pwd"
                          maxlength="45"  placeholder="Password" required="required">
            </div> 
            
            <div class="form-group">
                <button style="color:black" type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
            </div>
            

        </form>
        
    </div>
        </main>
 <?php include "footer.php"; ?> 
    </body>
</html>