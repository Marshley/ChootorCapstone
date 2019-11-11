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
    <script defer src="" > </script>

    <style>
        .full-width-div {
            position: absolute;
            width: 100%;
            left: 0;
            padding: 0px !important;
        }

        .title {
            font-size: 100px;
            font-family: "Californian FB";
            font-weight: bold;
            color: #141945;
            left: 10%;      
            bottom: 60%;     
        }     

        .sub {
            font-size: 30px;
            color: white;
            font-family: "century gothic";
            left: 16%;      
            bottom: 58%;     
        }

        .butts {
            position: absolute;      
            bottom: 50%; 
            font-family: "Century Gothic";
        }

        .butt-login {
            /* border-radius: 50px; */
            background-color: #141945;
            border-color: #141945;
            font-family: "century gothic";
            font-weight: ;
            left: 16%;  
            color: #ffffff;
            margin-right: 15px;
        }

        .butt-reg {
            /* border-radius: 50px; */
            background-color: transparent;
            border-color: #141945;
            color: #141945;
            left: 23%;  
            font-family: "century gothic";
        }

        .btn-outline-primary, .btn-outline-primary:active, .btn-outline-primary:visited, .btn-outline-primary:focus {
            border-color: #141945;
        }

        .btn-outline-primary:hover {
            background-color: #141945;
        }

        .btn-outline-dark, .btn-outline-dark:active, .btn-outline-dark:visited, .btn-outline-dark:focus {
            border-color: #141945;
        }

        .btn-outline-dark:hover {
            background-color: transparent;
            color: #141945;
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
            font-size: 5em;
            color: #141945;
            font-weight: bold;
            font-family: "century gothic";
        }

        .about-chootor-alpha {
            font-size: 4em;
            font-weight: bold;
            color: #141945;
            font-family: "century gothic";
        }

        .about-chootor-beta {
            font-size: 2em;
            color: #141945;
            font-family: "century gothic";
        }

        .profile {
            font-size: 20px;
            font-family: "century gothic";
            color: #141945;
        }

        .contact {
            font-size: 18px;
            color: #ffffff;
            font-style: "century gothic";
        }

        .center{
            display: block;
        }

        /* body {
            background: bg.png no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        } */
    </style>
</head>
 
<body>

    <div class="container">
        <div class="full-width-div">
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <img src="/img/dashboard1.png" class="w-100  inline-block" alt="Responsive image">
                <p class="bottom-left title">CHOOTOR</p>                 
                <p class="bottom-left sub">CHOOSE A TUTOR</p>                 
                <!-- <img src="/img/logo-sq-wo.png" class="img-responsive bottom-left" style="width:256px;height:256px"> -->
                <!-- <p class="butts"> -->
                    <a href="/login" class="btn btn-lg btn-outline-dark butt-login butts" role="button" style="">LOGIN</a>
                    <a href="/register" class="btn btn-lg btn-outline-primary butt-reg butts" role="button">REGISTER</a>
                <!-- </p>      -->
            </div>             
            
            <div class="container justify-content-center" style="margin-top:80px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 justify-content-center">
                     <p class="company-head text-center" style="margin-top:300px" >HAVING TROUBLE LOOKING FOR A TUTOR?</p>   
                    <p class="company-desc text-center" >We'll be guiding you to easily look for <br/> your desired peer tutor.</p>   
                </div>
            </div>

            <div class="container" style="margin-top:300px;margin-bottom:100px">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="text-center about-chootor-alpha">BOOKING MADE EASY!</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row" style="margin-top:100px">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <p class="text-center about-chootor-alpha">STEP 1:</p>
                        <p class="text-center about-chootor-beta">BOOK YOUR DESIRED PEER TUTOR.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <p class="text-center about-chootor-alpha">STEP 2:</p>
                        <p class="text-center about-chootor-beta">Set your appointment. <br/> Choose which schedule that you <br/> and your  chosen Tutor is available.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <p class="text-center about-chootor-alpha">STEP 3:</p>
                        <p class="text-center about-chootor-beta">Meet your Tutor in person for the session!</p>
                    </div>
                </div>
            </div>
            
            <div class="container" style="margin-top:300px">
                <!-- <div class="row"> -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <img src="/img/logo-sq-wo.png" class="img-responsive center" style="width:400px;height:400px">                       
                    </div>
                <!-- </div> -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="text-center" style="font-size:2em;color:#141945;font-family:century gothic">
                            <br/> <br/> In order to fulfill the needed requirements, <br/>
                            this website will serve as a thesis under <br/>
                            CSIT 141: Capstone Project Technopreunership.
                        </p>                         
                    </div>
            </div>

            <div class="container" style="margin-top:300px;margin-bottom:100px">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="text-center about-us">DEVELOPERS</p>
                    </div>
                </div>
            </div>

            <div class="container center" style="margin-bottom:100px">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  text-center">
                        <img src="/img/erg.png" class="img-responsive rounded center-block" style="width:256px;height:256px">
                        <p class="profile" style="margin-top:30px">ERGIE CANILLAS</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  text-center" >
                        <img src="/img/mah.png" class="img-responsive rounded center-block" style="width:256px;height:256px">
                        <p class="profile" style="margin-top:30px">MAHDA HARUN</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  text-center" >
                        <img src="/img/dap.png" class="img-responsive rounded center-block" style="width:256px;height:256px">
                        <p class="profile" style="margin-top:30px">DAPHNIE REA MAGPANTAY</p>
                    </div>
                </div>
            </div>

            <footer id="sticky-footer" class="py-4 bg-dark text-white text-center">
                <div class="container" style="margin-top:50px">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
                            <!-- <p class="text-left contact-us">CONTACT US</p> -->
                            <img src="/img/icon-facebook-256.png" class="img-responsive rounded center" style="width:50px;height:50px;">
                            <img src="/img/icon-instagram-256.png" class="img-responsive rounded center" style="width:50px;height:50px;">
                            <img src="/img/icon-google-256.png" class="img-responsive rounded center" style="width:50px;height:50px;">
                            <img src="/img/icon-twitter-256.png" class="img-responsive rounded center" style="width:50px;height:50px;">
                            </br>
                            </br>
                            <img src="/img/logo-rec-w.png" class="img-responsive rounded center-block" style="width:200px;height:80px;">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center" style="margin-top:30px;margin-bottom:5px;">
                            <a class="text-transparent contact"> COPYRIGHT © 2019 SAKURA 🌸</a>
                        </div>            
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
                            <p class="text-left contact text-center">Nuñez Extension Highway </br> Zamboanga City, 7000 </br> Philippines</p>
                            <p class="text-left contact text-center">choochoochootor@gmail.com</p>
                            <p class="text-left contact text-center">(+63)9 12 3456 789</p>
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

