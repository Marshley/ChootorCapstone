{{-- HERE IS THE MAIN NAVBAR --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CHOO-TOR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <link rel="icon" href="../img/logo-sq-wo.png" type="image/icon type">
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
            /* left: 10%;      
            bottom: 50%;     
            position: absolute; */
        }     

        .sub {
            font-size: 30px;
            color: #141945;
            font-family: "century gothic";
            /* left: 20%;      
            bottom: 49%;     
            position: absolute; */
        }

        .butts {
            position: absolute;      
            bottom: 45%; 
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
            background-color: #e27235;
            border-color: #e27235;
            color: #ffffff;
            left: 25%;  
            font-family: "century gothic";
        }

        /* .btn-outline-primary, .btn-outline-primary:active, .btn-outline-primary:visited, .btn-outline-primary:focus {
            border-color: #141945;
        } */

        .butt-login:hover {
            background-color: #1A2056;
            color: #ffffff;
            border-color: #1A2056;  
        }

        /* .btn-outline-dark, .btn-outline-dark:active, .btn-outline-dark:visited, .btn-outline-dark:focus {
            border-color: #141945;
        } */

        .butt-reg:hover {
            background-color: #d35400;
            color: #ffffff;
            border-color: #d35400;            
        }

        .company-head {
            margin-top:500px;
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

        .developers {
            font-size: 5em;
            color: #141945;
            font-weight: bold;
            font-family: "century gothic";
            margin-top:300px;
            margin-bottom:100px;
        }

        .about-chootor-alpha {
            font-size: 3em;
            margin-top: 500px;
            font-weight: bold;
            color: #141945;
            font-family: "century gothic";
        }
        
        .about-chootor-alpha-1 {
            font-size: 3em;
            margin-top: 200px;
            font-weight: bold;
            color: #141945;
            font-family: "century gothic";
        }

        .about-chootor-beta {
            font-size: 25px;
            margin-top: 10px;
            color: #141945;
            font-family: "century gothic";
        }

        .profile {
            font-size: 20px;
            font-family: "century gothic";
            color: #141945;
        }
        
        .animate{
            width:400px;
            height:400px;
            color: #141945;
            /* margin-top: 300px; */
        }

        .animation{
            margin-top:300px;
            color: #141945;

        }

        .contact {
            font-size: 18px;
            color: #141945;
            font-style: "century gothic";
            text-align: center;
        }

        .sayings {
            font-size:2em;
            color:#141945;
            font-family:"century gothic";
        }

        #sticky-footer {
            background-color: #ffffff;
            color: #141945;
        }

        
        .copyright {
            margin-top: 50px;
            margin-bottom: 5px;
            }
        /* .center{
            display: block;
        } */

        /* body {
            background: bg.png no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        } */

        .sign-in {
            bottom:28%;
            left: 45%;
            position: absolute;
            
        }

        #ccard {
            width: 400px;
            height: auto;
            margin-top: 50px;
            /* border-color: #FA935B; */
        }

        .header {
            margin-top: 200px;
        }

        @media only screen
        and (min-device-width : 320px)
        and (max-device-width : 480px) {
            .title {
            font-size: 50px;
            font-family: "Californian FB";
            font-weight: bold;
            color: #141945;
            /* margin-top: 800px; */
            /* left: 10%;      
            bottom: 50%;     
            position: absolute; */
            }     

            .sub {
                font-size: 15px;
                color: #141945;
                font-family: "century gothic";
                /* left: 20%;      
                bottom: 49%;     
                position: absolute; */
            }

            .company-head {
                margin-top:100px;
                font-size: 2em;
                font-family: "century gothic";
                color: #141945;
                font-weight: bold;
            }

            .company-desc {
                font-size: 15px;
                font-family: "century gothic";
                color: #141945;
                margin-top: 50px;
            }

            .sayings {
                font-size:1.5em;
                color:#141945;
                font-family:"century gothic";
            }

            .animate{
                width:90vw;
                height:100vw;
                color: #141945;

            }

            .animation{
                margin-top:100x;
                color: #141945;

            }

            .developers {
                font-size: 2em;
                color: #141945;
                font-weight: bold;
                font-family: "century gothic";
                margin-top:100px;
                margin-bottom:50px;
            }

            .header {
                margin-top: 20px;
            }

            #sticky-footer {
                text-align: center;
            }

            .contact {
                text-align: center;
            }

            .copyright {
                margin-top: 10px;
                margin-bottom: 20px;
            }
            /* .about-chootor-alpha {
                font-size: 3em;
                margin-top: 500px;
                font-weight: bold;
                color: #141945;
                font-family: "century gothic";
            }
            
            .about-chootor-alpha-1 {
                font-size: 3em;
                margin-top: 200px;
                font-weight: bold;
                color: #141945;
                font-family: "century gothic";
            }

            .about-chootor-beta {
                font-size: 25px;
                margin-top: 10px;
                color: #141945;
                font-family: "century gothic";
            } */
        }

        @media only screen
        and (min-device-width : 768px)
        and (max-device-width : 1366px) {
            .title {
            font-size: 50px;
            font-family: "Californian FB";
            font-weight: bold;
            color: #141945;
            }     

            .sub {
                font-size: 15px;
                color: #141945;
                font-family: "century gothic";
            }

            .company-head {
                margin-top:300px;
                font-size: 2em;
                font-family: "century gothic";
                color: #141945;
                font-weight: bold;
            }

            .company-desc {
                font-size: 20px;
                font-family: "century gothic";
                color: #141945;
                margin-top: 100px;
            }

            .animate{
                width:25vw;
                height:25vw;
                color: #141945;

            }

            .animation{
                margin-top:100px;
                margin-bottom: 100px;
                color: #141945;
            }

            .sayings {
                font-size: 20px;
                color:#141945;
                font-family:"century gothic";
                margin-bottom: 100px;
                /* margin-top: 250px; */
            }

            .developers {
                font-size: 4em;
                color: #141945;
                font-weight: bold;
                font-family: "century gothic";
                margin-top:100px;
                margin-bottom:50px;
            }

            .header {
                margin-top: 20px;
            }

            .about-chootor-alpha {
                font-size: 3em;
                margin-top: 300px;
                font-weight: bold;
                color: #141945;
                font-family: "century gothic";
            }
            
            .about-chootor-alpha-1 {
                font-size: 2em;
                margin-top: 200px;
                font-weight: bold;
                color: #141945;
                font-family: "century gothic";
            }

            .about-chootor-beta {
                font-size: 20px;
                margin-top: 10px;
                color: #141945;
                font-family: "century gothic";
            }

            .landing-logo {
                margin-top: 130px;
            }

            .login {
                margin-top: 20px;
            }
        }
</style>
</head>
 
<body>

    <div class="container-fluid">
        <section>
            <div class="row header">
                <div class="col-xs-12 col-lg-6 align-middle"> <!-- CHOOTOR LOGO -->
                    <img src="/img/logo-rec-wo.png" class="img-responsive landing-logo rounded offset-lg-3" style="width:100%;">
                    <p class="offset-lg-5 text-center font-italic" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Connects you to a student tutor that will help you improve your studies.</p>
                </div>
                <div class="col-xs-12 col-lg-6 login">
                    <div class="row justify-content-center align-middle">
                        <div class="card shadow rounded" id="ccard">
                            
                            @if(session('msg'))
                                <div class="alert alert-danger" role="alert" > 
                                    {{ session('msg') }}
                                </div>
                            @endif

                            <!-- <div class="container absolute-center">
                                <img src="/img/owl-wo.png" class="img-responsive rounded offset-lg-3" style="width:200px;height:200px;">
                            </div>              -->
                            <form method="POST" action="/login">
                                {{ csrf_field() }}
                                <div class="container" style="margin-top:10px;margin-bottom:30px;background-color:#ffffff">
                                    <div class="col-lg-12 offset-lg-12">
                                        <div class="card" style="border-color:white">
                                            <div class="container">
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" id="email" name="email" style="border-color: #141945;">
                                                </div>                
                                                <div class="form-group">
                                                    <label for="password">Password:</label>
                                                    <input type="password" class="form-control" id="password" name="password" style="border-color: #141945;">
                                                </div>                
                                                <div class="form-group" style="margin-top:20px;margin-bottom:20px">
                                                    <button id="cbtn" style="cursor:pointer" type="submit" class="btn butt-login btn-block" >LOGIN</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="margin-top:50px;margin-bottom:20px">
                                            <p class="font-italic">No account? Click Register to create an account.</p>
                                            <a href="/register" style="cursor:pointer" class="btn butt-reg btn-block">REGISTER</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section> <!-- HAVING TROUBLE -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 justify-content-center">
                    <p class="company-head text-center" >HAVING TROUBLE LOOKING FOR A TUTOR?</p>   
                    <p class="company-desc text-center" >We'll be guiding you to easily look for <br/> your desired peer tutor.</p>   
                </div>
            </div>
        </section>
        <section> <!-- booking made easy -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 justify-content-center">
                    <p class="text-center about-chootor-alpha">BOOKING MADE EASY!</p>   
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <p class="text-center about-chootor-alpha-1">STEP 1:</p>
                    <p class="text-center about-chootor-beta">Book your desired peer tutor.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <p class="text-center about-chootor-alpha-1">STEP 2:</p>
                    <p class="text-center about-chootor-beta">Set your appointment.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <p class="text-center about-chootor-alpha-1">STEP 3:</p>
                    <p class="text-center about-chootor-beta">Meet your Tutor in person for the session!</p>
                </div>
            </div>
        </section>
        <section> <!-- sayings csit 141 -->
            <div class="container text-center animation">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <img src="/img/dash-disp.png" class="img-responsive animate">                       
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <div class="container">
                            <p class="text-left sayings">
                                <br/> <br/> In order to fulfill the needed requirements, 
                                this website will serve as a project under
                                CSIT 141: Capstone Project Technopreunership.
                            </p>
                        </div>                         
                    </div>
                </div>
            </div>
        </section>
        <section>       <!--   DEVELOPERS -->
             <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="text-center developers">DEVELOPERS</p>
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
        </section>
        <footer id="sticky-footer" class="py-4 " style="margin-right:-12px;margin-left:-12px;">
            <div class="container" style="margin-top:50px;">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                        <img src="/img/icon-facebook-256.png" class="img-responsive rounded" style="width:50px;height:50px;">
                        <img src="/img/icon-instagram-256.png" class="img-responsive rounded" style="width:50px;height:50px;">
                        <img src="/img/icon-google-256.png" class="img-responsive rounded" style="width:50px;height:50px;">
                        <img src="/img/icon-twitter-256.png" class="img-responsive rounded" style="width:50px;height:50px;">
                        </br>
                        </br>
                        <img src="/img/logo-rec-w.png" class="img-responsive rounded center-block" style="width:200px;height:80px;">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 copyright">
                        <a class="text-transparent "> COPYRIGHT © 2020 SAKURA 🌸</a>
                    </div>            
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                        <p class="contact ">Nuñez Extension Highway </br> Zamboanga City, 7000 </br> Philippines</p>
                        <p class="contact ">choochoochootor@gmail.com</p>
                        <p class="contact ">(+63)9 12 3456 789</p>
                    </div>    
                </div>
            </div>
        </footer>        
    </div>
    
    
 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

