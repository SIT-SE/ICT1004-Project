<!DOCTYPE html> 
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
       integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
       crossorigin="anonymous">
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
        <?php    include "adminnav.inc.php";?> 
        
        <main role="main">
        <div class="container-fluid" id="main">
            <div class="row row-offcanvas row-offcanvas-left">

                <?php include "adminsidenav.inc.php";?>

                <div class="col main pt-5 mt-3">


                    <div class="row my-1">
                    <div class="alert alert-info" role="alert">
                    <h2>Add movie</h2>
                    <p>Please fill up this section to add new movies that are upcoming. All inputs are required. </p>
                    </div>

                        <div class="col-lg-9 col-md-8" role="form">
                            
                            <form action="process_movies.php" method="post" enctype="multipart/form-data">

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="MovieTitle">Movie Title</label>
                                  <input required type="text" name="mtitle" class="form-control" id="MovieTitle">
                                </div>
                              </div>


                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="description">Description</label>
                                  <input required type="text" name="desc" class="form-control" placeholder="" id="description">
                                </div>
                              </div>

                            </div>


                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  
                                  <label for="date">Release Date</label>
                                  <input required type="date" name="rdate" class="form-control" id="date">
                                </div>


                              </div>


                              <div class="col-md-6">

                                <div class="form-group">
                                  <label for="Duration">Duration</label>
                                  <input required type="text" name="duration" class="form-control" id="Duration" >
                                </div>
                              </div>

                            </div>



                            <div class="row">
                              <div class="col-md-6">

                                <div class="form-group">
                                   <label for="warninglabel">Warning</label>
                                    <select aria-label="warning" name="warning" class="form-control">
                                        <option>(PG: Some Frightening Scenes)</option>
                                        <option>(NC16: Some Violence)</option> 
                                        <option>(M18: Violence and Coarse Language)</option>
                                      </select>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="movieimagelabel">Movie Image</label>
                                  <input required aria-label="file" type="file" name="anyfile" id="anyfile">
                                    
                                </div>
                                 <!-- <input type="submit" value="Upload" name="submit"> -->
                              </div>
  
                            </div>



                            <button type="submit" class="btn btn-primary">Submit</button>

                            </form>

                        </div>
                        
                    </div>

                </div>
            </div>

        </div>
            </main>
    </body>
    
</html>

