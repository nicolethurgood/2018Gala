<?php require_once("../../core2.php"); 
$numberOfPeople = 100;
$dbc = mysqli_connect(getConfigValue("dbHost_w_cab"),"w-cab",getConfigValue("dbPass_w_cab"));
    mysqli_select_db($dbc, "w_cab");
// Total number of people attending
$guestResults = mysqli_query($dbc, "SELECT guest_firstname FROM senior_night WHERE guest_firstname IS NOT NULL AND guest_firstname > '' AND Year='2017' ORDER BY guest_firstname");
$seniorResults = mysqli_query($dbc, "SELECT ID FROM senior_night WHERE Year='2017' ORDER BY ID");
$numberOfPeople = mysqli_num_rows($seniorResults) + mysqli_num_rows($guestResults);

mysqli_close($dbc);

$time = time();
?>

    <header>

        <script src="https://use.typekit.net/onv3tyk.js"></script>
        <script>
            try {
                Typekit.load({
                    async: true
                });
            } catch (e) {}
        </script>
        <title>RIT Senior Night</title>
        <!-- Bootstrap core CSS -->
        <link href="https://friendlyu.com/css/bootstrap.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa:400,700" />
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="RIT Senior Night!">
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Register for Senior Night" />
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
            .stepwizard-step p {
                margin-top: 10px;
            }
            
            .stepwizard-row {
                display: table-row;
            }
            
            .stepwizard {
                display: table;
                width: 100%;
                position: relative;
            }
            
            .stepwizard-step button[disabled] {
                opacity: 1 !important;
                filter: alpha(opacity=100) !important;
            }
            
            .stepwizard-row:before {
                top: 14px;
                bottom: 0;
                position: absolute;
                content: " ";
                width: 100%;
                height: 1px;
                background-color: #ccc;
                z-order: 0;
            }
            
            .stepwizard-step {
                display: table-cell;
                text-align: center;
                position: relative;
            }
            
            .btn-circle {
                width: 30px;
                height: 30px;
                text-align: center;
                padding: 6px 0;
                font-size: 12px;
                line-height: 1.428571429;
                border-radius: 15px;
            }
        </style>

    </header>
    <div class="grad">
        <div class="container-fluid">
            <div class="row">
                <img src="../img/image_top_new.png" style="margin-top:0px;" width="100%" class="img-responsive">
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" id="main">
                <BR>
                <h3 style="padding-right:20%;padding-left:20%;" class="text-center">
            
                April 1, 2017<BR><BR>
                Time: 6:00 - 11:00 PM<BR><BR>
                Location: Riverside Radisson in Downtown Rochester<BR><BR>
                Seniors: $5 | Guests: $10<BR><BR></h3>
                <BR>

                <h4 style="padding-right:20%;padding-left:20%;">
                Start checking in at Gleason Circle at 5:00pm.<BR><BR>

                Buses will start shuttling from Gleason Circle to Radisson all night - Parking is available on site at a discounted price according to availability. We recommend taking the bus to avoid any issues. <BR><BR>

                <strong><h3>Need to bring 21+ ID to purchase alcohol from the cash bar.</h3></strong>
                ** Guests are considered attendees who are not RIT seniors.
                <BR><BR>

                Bring your RIT ID to the event.
                <BR><BR>
                Cash payments end on 4:00 Friday March 31st, 2017. Please pay by credit card if you still want to attend.
                If you have any questions or concerns, please stop by the CAB office (03-A740) or email cab@rit.edu
            
                </h4>
                <BR>

    <?php 
    if ($numberOfPeople < 750) { 
        echo '<center><button type="button" class="btn btn-picnic btn-xlarge text-center" data-toggle="modal" data-target="#myModal">Register</button></center>';
        //echo "This is the number of people attending: " . "$numberOfPeople";
    } else {
        echo '<center><h2>Sorry, we\'ve reach full capacity for this event. </h2></center>';
    }

    ?>
                    <BR>
                    <BR>
                    <BR>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <img src="../img/image_bottom.png" width="100%" class="img-responsive">
            </div>
        </div>

    </div>

    <!-- Login Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">RIT Senior Night Registration</h4>
                </div>
                <div class="modal-body text-center">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                <p>Login </p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p>Info</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>Payment</p>
                            </div>

                        </div>
                    </div>
                    <div id="loginMessage"></div>
                    <form action="../../../api/login.php" id="target" method="POST" name="target" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="username">Username:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwd" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" id="loginButon" style="display: block; width: 100%;" class="btn btn-picnic">Login</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>


    <!-- Payment Modal -->
    <div id="paymentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">RIT Senior Night Registration</h4>
                </div>
                <div class="modal-body text-center">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
                                <p>Login </p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p>Info</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-primary btn-circle">3</a>
                                <p>Payment</p>
                            </div>

                        </div>
                    </div>
                    <div id="paymentMessage"></div>
                    <div id="paymentButton"></div><br>
                    <div class='alert alert-warning'>Once we recieve your payment, you will be officially registered for Senior Night. <br>Payment is due by <strong>March 30, 2017</strong>.</div>
                </div>

            </div>

        </div>
    </div>



    <!-- Senior Register Modal -->
    <div id="registerModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">RIT Senior Night Registration</h4>
                </div>
                <div class="modal-body text-center">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
                                <p>Login </p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-primary btn-circle">2</a>
                                <p>Info</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>Payment</p>
                            </div>

                        </div>
                    </div>
                    <div id="registrationMessage"></div>
                    <form action="../../../api/seniorNightRegistration.php" id="registration" method="POST" name="registration" class="form-horizontal" role="form">
                        <input type="hidden" name="first" id="hidden_first" value="">
                        <input type="hidden" name="last" id="hidden_last" value="">
                        <input type="hidden" name="email" id="hidden_email" value="">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="username">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="full_name" placeholder="Full Name" value="" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Email:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email_address" name="email" placeholder="Email" value="" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="age">Age:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="age" name="age" placeholder="21"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Guest Name:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="guest_first" name="guest_first" placeholder="John">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="guest_last" name="guest_last" placeholder="Smith">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Guest Email:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="guest_email" name="guest_email" placeholder="john.smith@example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="guest_age">Guest Age:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="guest_age" name="guest_age" placeholder="21"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Allergies:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="allergies" name="allergies" placeholder="List any allergies you have (If any)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="vegi"> I'm vegetarian</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="transportation"> I need transportation</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="interpret"> I need an interpeter</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" id="registerButton" style="display: block; width: 100%;" class="btn btn-picnic">Next</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
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
                    var total = 5;
                    if (document.getElementById("guest_first").value != "") {
                        total += 10;
                    }
                    document.getElementById("paymentMessage").innerHTML = "<h3>Total Due: $" + total + "</h3><br>";
                    document.getElementById("paymentButton").innerHTML = "<a href='https://www.rit.edu/clubs/payments/1921/CAB-Senior-Night-Ball' target='_blank'><button type='button' class='btn btn-picnic btn-lg text-center'>Pay Now</button></a>";
                    $('#registerModal').modal('hide');
                    $("#paymentModal").modal();

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    var result = jQuery.parseJSON(jqXHR.responseText);
                    var errorMessage = result.error;
                    document.getElementById("registrationMessage").innerHTML = "<div class='alert alert-danger'>" + errorMessage + "</div>";
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
                        document.getElementById("loginMessage").innerHTML = "<div class='alert alert-warning'>This event is only available to seniors.</div>";
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    document.getElementById("loginMessage").innerHTML = "<div class='alert alert-danger'>Invalid username or password.</div>";
                }
            });
            event.preventDefault();
        });
    </script>