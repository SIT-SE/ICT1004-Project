<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Yellow Village</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">

        <!--jQuery-->
        <script defer     
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script> 

        <!--Bootstrap JS--> 
        <script defer
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
                integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
                crossorigin="anonymous">
        </script>

        <!-- Custom JS -->
        <script defer src="js/main.js"></script>

    </head>
    <body>
        <main class = container>
            <form action="" method="">
                <div class="container mt-5 text-center">
                    <h3 class="text-center">Quick Buy</h3>
                    <br>
                    <div class="form-group d-inline">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Movie
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Disney's Mulan</a>
                            <a class="dropdown-item" href="#">Tenet</a>
                            <a class="dropdown-item" href="#">Pinocchio</a>
                        </div>
                    </div>
                    <div class="form-group d-inline">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Cinema
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Yellow Dhoby</a>
                            <a class="dropdown-item" href="#">Yellow Vivo City</a>
                            <a class="dropdown-item" href="#">Yellow Bedok</a>
                        </div>
                    </div>
                    <div class="form-group d-inline">
                        <button type="button" style="width:100;" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Date
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Tue, 3-11-2020</a>
                            <a class="dropdown-item" href="#">Wed, 4-11-2020</a>
                            <a class="dropdown-item" href="#">Thur, 5-11-2020</a>
                        </div>
                    </div>
                    <div class="form-group d-inline">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Time
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">14:00</a>
                            <a class="dropdown-item" href="#">15:00</a>
                            <a class="dropdown-item" href="#">16:00</a>
                        </div>
                    </div>
                    <div class="form-group d-inline">
                        <button class="btn btn-warning" type="submit">Book Now</button>
                    </div>
                </div>
            </form>
            <section id ="highlights">
                <br><br>
                <h3>What's On?</h3>
                <div class="row">
                    <article class="col-sm">
                        <figure>
                            <img src="images/promo_homepage.PNG"
                                 class="img-thumbnail"
                                 alt="Promotions">
                            <figcaption>Promotions</figcaption>
                        </figure>
                    </article>


                    <article class="col-sm">
                        <figure>
                            <img src="images/membership_homepage.PNG"
                                 class="img-thumbnail"
                                 alt="Membership">
                            <figcaption>Membership</figcaption>
                        </figure>
                    </article>

                    <article class="col-sm">
                        <figure>
                            <img src="images/tracetogether_homepage.PNG"
                                 class="img-thumbnail"
                                 alt="TraceTogether">
                            <figcaption>TraceTogether</figcaption>
                        </figure>
                    </article>
                </div>
            </section>
        </main>
    </body>
</html>
