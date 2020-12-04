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
    <div class="signup-form">
        <form action="process_register.php" method="post">
	<h2>Sign Up</h2>
	<p>Please fill in this form to create an account!</p>
        <hr>
    <div class="form-group">
	<div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user input-icon"></i></span>
           <input aria-label="name" type="text" class="form-control" id="name" name="name" placeholder="Name" required="required">
	</div>
    </div>
    <div class="form-group">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
	<input aria-label="email" type="email" class="form-control" id="email" name="email" placeholder="Email Address" required="required">
	</div>
    </div>
        
    <div class="form-group">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-lock"></i></span>
	<input aria-label="password" type="password" class="form-control" id="pwd" name="pwd"
                          maxlength="45" placeholder="Password" required="required">
        </div>
    </div>
        
    <div class="form-group">
	<div class="input-group">
	<span class="input-group-addon">
            <i class="fa fa-lock"></i>
     
	</span>
            <input aria-label="confirmpw" type="password" class="form-control" id="pwd_confirm" name="pwd_confirm"
                           maxlength="45" placeholder="Confirm Password" required="required">
        </div>
    </div>
    
    <div class="form-group">
	<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
    </div>
    
    <div class="form-group">
        <button style="color:black" type="submit" class="btn btn-primary btn-lg">Sign Up</button>
    </div>
    </form>
        
    <div style="color: white;" class="text-center">Already have an account? <a href="login.php">Login here</a></div>
    
    </div>
       </main> 
    <?php include "footer.php";?> 
    </body>

</html>

