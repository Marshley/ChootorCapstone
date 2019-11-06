{{-- HERE IS THE MAIN NAVBAR --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CHOO-TOR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo.png" type="image/png">

    <style>
        .full-width-div {
            position: absolute;
            width: 100%;
            left: 0;
            padding: 0px !important;
        }

        .title {
            font-size: 7em;
            font-family: "Century Gothic";
            font-weight: bold;
            color: #141945;
            bottom: 50%; 
            left: 10%;
        }     

        .sub {
            font-size: 28px;
            color: white;
            bottom: 48%; 
            left: 11%;
            font-family: "Century Gothic";
        }

        .butts {
            font-size: 30px;
            color: white;
            bottom: 43%; 
            left: 11%;
            font-family: "Century Gothic";
        }

        .butt-login {
            /* border-radius: 50px; */
            background-color: #141945;
            border-color: #141945;
            font-family: "century gothic";
            color: #ffffff;
        }

        .butt-reg {
            /* border-radius: 50px; */
            background-color: transparent;
            border-color: #141945;
            color: #141945;
            font-family: "century gothic";
        }

        .bottom-left {
            position: absolute;                       
        }

        .company-head {
            font-size: 3em;
            font-family: "century gothic";
            color: #141945;
            font-weight: bold;
        }

        .company-desc {
            font-size: 25px;
            font-family: "century gothic";
            color: #141945;
            margin-top: 100px;
        }

        .about-us {
            font-size: 6em;
            color: #141945;
        }

        .about-chootor-alpha {
            font-size: 3em;
            font-weight: bold;
            color: #141945;
        }

        .about-chootor-beta {
            font-size: 2em;
            color: #141945;
        }

        .profile {
            font-size: 20px;
            font-family: "Century Gothic";
            color: #141945;
        }

        .contact {
            font-size: 18px;
            color: #ffffff;
            font-style: "Century Gothic";
        }

    </style>
</head>
 
<body>

    <div class="container">
        <div class="full-width-div">
            
            <div class="col-lg-12 col-xs-6">
                <img src="/img/dashboard1.png" class="w-100  inline-block" alt="Responsive image">
                <p class="bottom-left title">CHOOTOR</p> 
                <p class="bottom-left sub">Choose a Tutor</p>
                <p class="bottom-left butts">
                    <a href="/login" class="btn btn-outline-primary text-white btn-lg butt-login" role="button" style="margin-right:15px">LOGIN</a>
                    <a href="/register" class="btn btn-outline-primary btn-lg butt-reg" role="button">REGISTER</a> </p> 
                    
            </div>
                
            

            <div class="container justify-content-center" style="margin-top:80px">
                <div class="col-lg-12 col-xs-12 justify-content-center">
                     <p class="company-head text-center" style="margin-top:300px" >HAVING TROUBLE LOOKING FOR A TUTOR?</p>   
                    <p class="company-desc text-center" >We'll be guiding you to easily look for </br> your desired peer tutor.</p>   
                </div>
            </div>

            <div class="container" style="margin-top:300px;margin-bottom:100px">
                <div class="row">
                    <div class="col-lg-12 col-xs-6">
                        <p class="text-center about-chootor-alpha">BOOKING MADE EASY!</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row" style="margin-top:100px">
                    <div class="col-lg-4">
                        <p class="text-center about-chootor-alpha">STEP 1:</p>
                        <p class="text-center about-chootor-beta">Book your desired peer Tutor.</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="text-center about-chootor-alpha">STEP 2:</p>
                        <p class="text-center about-chootor-beta">Set your appointment. </br> Choose which schedule that you </br> and your  chosen Tutor is available.</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="text-center about-chootor-alpha">STEP 3:</p>
                        <p class="text-center about-chootor-beta">Meet your Tutor in person for the session!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xs-12 text-center">
                            <img src="/img/Logo.png" class="img-responsive rounded center-block" style="border-radius:50%;width:300px;height:300px">                       
                    </div>
                </div>
            </div>

            <div class="container" style="margin-top:300px">
                <div class="row">
                    <div class="col-lg-12 col-xs-6">
                        <p class="text-center about-us">DEVELOPERS</p>
                    </div>
                </div>
            </div>

            <div class="container center" style="margin-bottom:100px">
                <div class="row">
                    <div class="col-lg-4 col-xs-4  text-center">
                        <img src="/img/erg.png" class="img-responsive rounded center-block" style="width:256px;height:256px">
                        <p class="profile" style="margin-top:30px">ERGIE CANILLAS</p>
                    </div>
                    <div class="col-lg-4 col-xs-4  text-center" >
                        <img src="/img/mah.png" class="img-responsive rounded center-block" style="width:256px;height:256px">
                        <p class="profile" style="margin-top:30px">MAHDA HARUN</p>
                    </div>
                    <div class="col-lg-4 col-xs-4  text-center" >
                        <img src="/img/dap.png" class="img-responsive rounded center-block" style="width:256px;height:256px">
                        <p class="profile" style="margin-top:30px">DAPHNIE REA MAGPANTAY</p>
                    </div>
                </div>
            </div>

            <footer id="sticky-footer" class="py-4 bg-dark text-white">
                <div class="container" style="margin-top:50px">
                    <div class="row">
                        <div class="col-lg-4 col-xs-4 text-left">
                            <!-- <p class="text-left contact-us">CONTACT US</p> -->
                            <img src="/img/icon-facebook-256.png" class="img-responsive rounded center-block" style="width:50px;height:50px;">
                            <img src="/img/icon-instagram-256.png" class="img-responsive rounded center-block" style="width:50px;height:50px;">
                            <img src="/img/icon-google-256.png" class="img-responsive rounded center-block" style="width:50px;height:50px;">
                            <img src="/img/icon-twitter-256.png" class="img-responsive rounded center-block" style="width:50px;height:50px;">
                            </br>
                            </br>
                            <img src="/img/bannn.png" class="img-responsive rounded center-block" style="width:200px;height:80px;">
                        </div>
                        <div class="col-lg-4 col-xs-4 text-center" style="margin-top:30px;margin-bottom:5px;">
                            <a class="text-transparent contact"> COPYRIGHT © 2019 SAKURA 🌸</a>
                        </div>            
                        <div class="col-lg-4 col-xs-4">
                            <p class="text-left contact">Nuñez Extension Highway </br> Zamboanga City, 7000 </br> Philippines</p>
                            <p class="text-left contact">choochoochootor@gmail.com</p>
                            <p class="text-left contact">(+63)9 12 3456 789</p>
                        </div>    
                    </div>
                </div>
            </footer>        
        </div>
    </div>


    <!-- Footer -->
    <!-- <footer class="text-center text-white font-small fixed-bottom" style="margin-top:100px;margin-bottom:10px;">
        <a class="text-transparent"> Copyright © 2019 Sakura 🌸</a>
    </footer> -->
        
    <!-- Copyright -->
    <!-- <div class="footer-copyright text-center py-3">©
        <a> SAKURA 🌸 2019</a>
    </div> -->
    <!-- Copyright -->
    <!-- Footer -->
 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

