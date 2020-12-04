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
       href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"    
       integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       
       

        <!--Custom CSS-->
        <link rel="stylesheet" href="css/faq.css">
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
       
               <script defer src="js/main.js"></script>
               <style>
                   @media screen and (max-width: 768px) {
  .accaordion{
    margin-left: 10px;
    margin-right: 10px;
  }
}</style>
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
                //header("Location: http://www.yourdomain.com/login.php");
                include "nav.inc.php";
                
            }
        ?> 
        
         <!--Accordion wrapper-->
            <div class="accaordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                <h3 id="faqh">Top 3 Most Frequently Asked Questions</h3>
                <!-- Accordion card -->
                <div class="card-faq ">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingOne1">
                        <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                           aria-controls="collapseOne1">
                            <h5 class="mb-0">
                                How far in advance can i book my tickets? 
                            </h5>
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                         data-parent="#accordionEx">
                        <div class="card-body">
                            A cinema week is from Thursday to Wednesday. To better meet the needs of our 
                            patrons, please refer to our Programming schedule:
                            Thursday to Friday sessions (released on Wednesday after 3pm) / Saturday to
                            Wednesday sessions (released on Friday after 3pm)
                            Sessions for Gold Class® are released every Tuesday after 2pm for the full
                            cinema week.
                            From time to time, we may release Advance Sales for selected blockbuster titles
                            1 to 3 weeks before opening date.
                        </div>
                    </div>

                </div>
                <!-- Accordion card -->

                <!-- Accordion card -->
                <div class="card-faq">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingTwo2">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                           aria-expanded="false" aria-controls="collapseTwo2">
                            <h5 class="mb-0">
                                Why can’t I buy promotional tickets eg. Senior Citizen tickets, Student 
                                Promotion or Kids Watch for Free online?  
                            </h5>
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                         data-parent="#accordionEx">
                        <div class="card-body">
                            These tickets need to be purchased at the Box Offices/Automated Ticketing 
                            Machines in order for staff to verify age & identity.
                        </div>
                    </div>

                </div>
                <!-- Accordion card -->

                <!-- Accordion card -->
                <div class="card-faq">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingThree3">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                           aria-expanded="false" aria-controls="collapseThree3">
                            <h5 class="mb-0">
                                What should I do if I lose my tickets or make a wrong booking? 
                            </h5>
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                         data-parent="#accordionEx">
                        <div class="card-body">
                            Please proceed to the booking cinema at least 1 hour before the movie session to
                            seek assistance from staff. Alternatively, if the movie haven't start yet you may email 
                            our Customer Service team (we will response to you within 4 working days) at 
                            customersvc@Yellowvillage.com.sg or call +65 6333 8899 (during Customer Service Operating Hours) 
                            for further assistance.
                        </div>
                    </div>

                </div>
                <!-- Accordion card -->

            </div>
            <!-- Accordion wrapper -->







            <div class="container my-4">


                <div class="row justify-content-center">

                    <!-- Grid column -->
                    <div class="col-xl-12 mb-4 mb-xl-0">

                        <!-- Title -->
                        <h2 class="secondary-heading mb-3">
                            FAQ
                        </h2>

                        <!-- Description -->
                        <p class="mb-4">I can't find a FAQ to answer my question, what can I do?<br>
                            You may send us an email at customersvc@yellowvillage.com.sg</p>

                        <!-- Section: Live preview -->
                        <section>
                           
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item waves-effect waves-light" role="tablist">
                                    <a class="nav-link " id="ticketing-tab" data-toggle="tab" href="#ticketing" role="tab" aria-controls="ticketing" aria-selected="true">Ticketing</a>
                                </li>

                                <li class="nav-item waves-effect waves-light" role="tablist">
                                    <a class="nav-link" id="movieclub-tab" data-toggle="tab" href="#movieclub" role="tab" aria-controls="movieclub" aria-selected="false"> Movie CLub</a>
                                </li>
                                <li class="nav-item waves-effect waves-light" role="tablist">
                                    <a class="nav-link active" id="others-tab" data-toggle="tab" href="#others" role="tab" aria-controls="others" aria-selected="false">Others</a>
                                </li>
                            </ul>


                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade" id="ticketing" role="tabpanel" aria-labelledby="ticketing-tab">

                                    <strong>  Why can't I select seats by leaving a space in between?</strong> <br>
                                    The purpose is to optimize seating arrangements in the cinema hall 
                                    so that patrons in group will not have to be separated especially when the occupancy is high.<br>
                                    <strong>   What are the payment methods for online ticketing?</strong> <br>
                                    We accept Credit & Debit Card, Visa Click to Pay, DBS Paylah!,
                                    HSBC's Movie Card, YV Prepaid Card and selected YV Gift Vouchers.<br>
                                    <strong>What is your refund policy?</strong><br>
                                    Kindly head down to the respective Box Office at least an hour before your movie starts for further assistance.<br>
                                    
                                </div>

                                <div class="tab-pane fade" id="movieclub" role="tabpanel" aria-labelledby="movieclub-tab">
                                   <div class="container mt5"> 
                                    <strong> What are the benefits of being a YV Movie Club® member?</strong> <br>
                                    YV Movie Club® membership is FREE and you get to enjoy :
                                    <br>
                                    
                                    - $2 off Online Tickets on Mondays<br>
                                    - $7 Movie Tickets on Tuesday<br>
                                    - Invitation to Gala Premieres<br>
                                    - Discounted SMS Confirmation<br>
                                    - YV Movie Club® Movie Reviewer<br>
                                    - $1 OFF Combo of the Week<br>
                                    - 10% off Wine & Dine at Gold Class<br>
                                    - Members' price for selected events and screenings<br>

                                    <br>
                                    Benefits are not applicable for Corporate Bookings.<br><br>

                                    <strong>Why is there a rating for the movie but no movie review posted?</strong>            
                                    <br>
                                    YV Movie Club® Reviewers may choose to rate the movie they have watched but not post a review.
                                    <br>
                                    <strong>Why is there no rating and no reviews posted for some movies? </strong>
                                    <br>
                                    YV Movie Club® Reviewers may not have watched or had the chance to post their reviews yet.
                                    
                                    </div>
                                </div>
                                    


                                <div class="tab-pane fade active show" id="others" role="tabpanel" aria-labelledby="others-tab">
                                    <strong>  What do the different film classifications mean?  (G, PG, PG13, NC16, M18 and R21)</strong> <br>
                                    Films in Singapore are rated according to the following ratings
                                    <br>
                                    General (G)<br>
                                    Suitable for all ages.<br>

                                    Parental Guidance (PG)<br>
                                    Suitable for all but parents should guide their young.<br>

                                    Parental Guidance 13 (PG13)<br>
                                    Suitable for persons aged 13 and above but parental guidance is advised for children below 13.<br>

                                    No Children under 16 (NC16)<br>
                                    Restricted to persons aged 16 and above.<br>

                                    Mature 18 (M18)<br>
                                    Restricted to persons aged 18 and above.<br>

                                    Restricted 21 (R21)<br>
                                    Restricted to persons aged 21 and above.
                                    <br>
                                    <strong>Are all the films screening in YV subtitled?</strong><br>
                                    No, not all films are subtitled. Please approach our Box Office for more information on which films have subtitles.
                                    <br>
                                    <strong>Do you have any facilities for the physically impaired?</strong><br>
                                    All our cinemas except Gold Class® have wheelchair accessibility.
                                    
                                </div><br>
                            </div>
                        </section>
                        <!-- Section: Live preview -->
                    </div>
                    <!-- Grid column -->
                </div>
            </div>
    </main>
        
        <?php include "footer.php"; ?> 
            
    </body>
</html>

