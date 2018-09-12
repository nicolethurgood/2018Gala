<?php require_once("../../core2.php");
$numberOfPeople = 100;
$dbc = mysqli_connect(getConfigValue("dbHost_w_cab"),"w-cab",getConfigValue("dbPass_w_cab"));
mysqli_select_db($dbc, "w_cab");
// Total number of people attending
$guestResults = mysqli_query($dbc, "SELECT guest_firstname FROM senior_night WHERE guest_firstname IS NOT NULL AND guest_firstname > '' AND Year='2018' ORDER BY guest_firstname");
$seniorResults = mysqli_query($dbc, "SELECT ID FROM senior_night WHERE Year='2018' ORDER BY ID");
$numberOfPeople = mysqli_num_rows($seniorResults) + mysqli_num_rows($guestResults);

mysqli_close($dbc);

$time = time();
?>

    <header>

        <script src="https://use.typekit.net/fvl1rpg.js"></script>
        <script>
            try{
                Typekit.load({
                    async: true
                });
            }
            catch(e){

            }
        </script>
        <title>RIT Senior Night</title>
        <!-- Bootstrap core CSS -->
        <link href="https://friendlyu.com/css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="RIT Class of 2018 Gala">
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Register for Class of 2018 Gala" />
        <meta property="og:image" content="https://www.rit.edu/studentaffairs/cab/senior/picnic/img/senior night_facebook banner-09.png">
        <!-- Facebook Looks at this as the preview image when the page is shared -->
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-68179372-1', 'auto');
            ga('send', 'pageview');



        </script>
        <style>
            .formlabel{
                text-align: left;
                margin-top: 0;
                margin-bottom: 0;
                padding-top: 11px;
            }

        </style>

    </header>

    <div class="grad">
        <div class="top">
            <div class="col-lg-offset-2 col-lg-6 logos">
                <a class="col-lg-2" href='http://www.rit.edu/studentaffairs/cab/'><img src="img/cabLogo.png"></a>
                <a class="col-lg-1" href='http://www.rit.edu/studentaffairs/cab/about.php'><img src="img/classof2018_banner_white.png" ></a>

            </div>
            <div class="col-lg-4 nav">
                <a href="http://www.rit.edu/studentaffairs/cab/2018/gala/index.php" class="col-lg-2" >Gala</a>
                <a  href="http://www.rit.edu/studentaffairs/cab/2018/gala/faq.php" class="col-lg-2">FAQ</a>
                <a href="http://www.rit.edu/studentaffairs/cab/2018/gala/registration.php" ><button class="col-lg-3 btn btn-picnic btn-m text-center">Sign Up</button></a>
            </div>
        </div>
        <div class="header row">
            <div class="title container text-center">
                <h1 style="font-size: 100pt;">Sign Up</h1>
            </div>
            <div>
        <div class="container about">
            <div class="row" id="main">
                    <!-- basic form maybe add clickable boxes that drop down with more info-->
                <div class="container">
                    <div class='col-lg-offset-2'>
                        <h2>Login with your RIT ID</h2>
                    </div>

                    <form action="../../api/login.php" id="target" method="POST" name="target" class="form-horizontal" role="form">
                        <div class="form-group">
                            <div id="" class="alert alert-danger col-lg-offset-2 col-lg-8" style=" text-align: center;">This event is currently at capcity.</div>
                            <div id="loginMessage" class="alert alert-danger col-lg-offset-2 col-lg-8" style="display: none; text-align: center;"></div>
                            <label class="formlabel col-lg-offset-2 col-lg-3  text-left" for="username">Username:</label>
                            <label class="formlabel col-lg-5 " for="pwd">Password:</label>
                            <div class="col-lg-offset-2 col-lg-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" disabled>
                            </div>

                            <div class="col-lg-3">
                                <input type="password" class="form-control" id="pwd" name="password" placeholder="Password" disabled>
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" id="loginButon" style="display: block; width: 100%;" class="btn btn-picnic btn-large text-center">Go</button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <div class="container">
                    <form action="../../api/seniorNightRegistration.php" id="registration" method="POST" name="registration" class="form-horizontal" role="form">
                        <input type="hidden" name="first" id="hidden_first" value="">
                        <input type="hidden" name="last" id="hidden_last" value="">
                        <input type="hidden" name="email" id="hidden_email" value="">
                        <div class="form-group">
                            <label class="formlabel text-left col-lg-offset-2 col-lg-12 " for="username">Name:</label>
                            <div class="col-lg-offset-2 col-lg-8">
                                <input type="text" class="form-control" id="full_name" placeholder="Full Name" value="" disabled>
                            </div>
                            <label class="formlabel col-lg-offset-2 col-lg-4" for="pwd">Email:</label>
                            <label class="formlabel col-lg-5" for="age">Age:</label>
                            <div class=" col-lg-offset-2 col-lg-4">
                                <input type="text" class="form-control" id="email_address" name="email" placeholder="Email" value="" disabled>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="age" name="age" placeholder="21"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="formlabel col-lg-offset-2 col-lg-4 " for="pwd">Guest First Name:</label>
                            <label class="formlabel col-lg-4" for="pwd">Guest Last Name:</label>
                            <div class="col-lg-offset-2  col-lg-4">
                                <input type="text" class="form-control" id="guest_first" name="guest_first" placeholder="John">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="guest_last" name="guest_last" placeholder="Smith">
                            </div>
                            <label class="formlabel col-lg-offset-2 col-lg-4 " for="pwd">Guest Email:</label>
                            <label class="formlabel col-lg-5">Guest Age:</label>
                            <div class="col-lg-offset-2 col-lg-4 ">
                                <input type="text" class="form-control" id="guest_email" name="guest_email" placeholder="john.smith@example.com">
                            </div>
                            <div class="  col-lg-4">
                                <input type="text" class="form-control" id="guest_age" name="guest_age" placeholder="21"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="transportation"> Transportation</label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="interpret"> Interpreter</label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="gluten">Gluten Free</label>
                                </div>
                            </div>
                            <div class=" col-lg-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="vegi"> Vegetarian</label>
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="vegan"> Vegan</label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="kosher"> Kosher</label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="nut"> Nut Allergies</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-offset-2 col-lg-1 " for="pwd">Other:</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="diet" name="diet" placeholder="List any other dietary restriction you have (If any)">
                            </div>
                        </div>
                            <div id="registrationMessage" class="alert alert-danger col-lg-offset-2 col-lg-8" style="display: none; text-align: center;"></div>
                            <div class="col-lg-offset-5 col-lg-2">
                                <button type="submit" id="registration" style="display: block; width: 100%; margin-bottom: 1%" class='btn btn-picnic btn-lg text-center' disabled>Register</button>
                            </div>

                            <div id="paymentMessage" class="alert alert-success col-lg-offset-2 col-lg-8" style="padding-top: 5px; display: none; text-align: center;"></div>
                            <div id="paymentButton" class="col-lg-offset-2 col-lg-8" style="display: none; text-align: center;">
                                <a href='https://www.rit.edu/clubs/payments/3028/CAB-Class-of-2018-Gala' target='_blank'><button type='button' class='btn btn-picnic btn-lg text-center'>Pay Now</button></a>
                            </div>
                        </div>
                </form>

            </div>

    <!-- <?php
    if ($numberOfPeople < 750) {
        echo '<button type="button" class="btn btn-picnic btn-xlarge text-center" data-toggle="modal" data-target="#myModal">Register</button>';
        //echo "This is the number of people attending: " . "$numberOfPeople";
    } else {
        echo '<center><h2>Sorry, we\'ve reach full capacity for this event. </h2></center>';
    }

    ?> -->
                    <BR>
                    <BR>
                    <BR>
            </div>
        </div>

            <footer>
                <div class="footer">
                    <div class="col-lg-9 logos">
                        <a class="col-lg-1" href='http://www.rit.edu/studentaffairs/cab/'><img src="img/cabLogo.png"></a>
                        <a class="col-lg-2" href='http://www.rit.edu/studentaffairs/cab/about.php'><img src="img/classof2018_banner_white.png" ></a>
                        <a  href='https://twitter.com/ritcab'><img src="img/twitter.png"></a>
                        <a  href='https://www.instagram.com/ritcab/'><img src="img/insta.png"></a>
                        <a  href='https://www.facebook.com/ritcab/'><img src="img/fb.png"></a>
                    </div>
                </div>
            </footer>

    </div>


<script type='text/javascript'>
    $("#registration").submit(function (event) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function (data, textStatus, jqXHR) {
                var returnedData = JSON.parse(data);
                var total = 10;
                if (document.getElementById("guest_first").value != "") {
                    total += 15;
                }
                document.getElementById("paymentMessage").style.display = 'block';
                document.getElementById("paymentMessage").innerHTML = "Total Due: $" + total + "";
                document.getElementById("paymentButton").style.display = 'block';
                $('#registerModal').modal('hide');
                $("#paymentModal").modal();

            },
            error: function (jqXHR, textStatus, errorThrown) {
                var result = jQuery.parseJSON(jqXHR.responseText);
                var errorMessage = result.error;
                document.getElementById("registrationMessage").style.display = 'block';
                document.getElementById("registrationMessage").innerHTML = "" + errorMessage + "";
            }
        });
        event.preventDefault();
    });

    $("#target").submit(function (event) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function (data, textStatus, jqXHR) {
                var returnedData = JSON.parse(data);
                if (returnedData.info.year != 1 && returnedData.info.year != 2 && returnedData.info.year != 3 && returnedData.info.year != "" || document.getElementById("username").value == "nat9488" || document.getElementById("username").value == "adlcab") {
                    //User is a senior
                    document.getElementById("full_name").value = returnedData.info.first_name + " " + returnedData.info.last_name;
                    document.getElementById("hidden_first").value = returnedData.info.first_name;
                    document.getElementById("hidden_last").value = returnedData.info.last_name;
                    document.getElementById("email_address").value = returnedData.info.email;
                    document.getElementById("hidden_email").value = returnedData.info.email;
                    $('#myModal').modal('hide');
                    $("#registerModal").modal();
                } else {
                    //User is not a senior
                    document.getElementById("loginMessage").style.display = "block";
                    document.getElementById("loginMessage").innerHTML = "This event is only available to seniors.";

                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("loginMessage").style.display = "block";
                document.getElementById("loginMessage").innerHTML ='Invalid username or password.';
            }
        });
        event.preventDefault();
    });
</script>