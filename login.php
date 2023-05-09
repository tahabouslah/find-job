<!DOCTYPE html>
<html lang="en" style="border-radius: 12px;">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <title>Login</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Narrow&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spline+Sans+Mono&amp;display=swap" />
        <link rel="stylesheet" href="assets/css/login-style.css" />
    </head>

    <body>
        <div class="container ">
            <!-- Left bloc - login  -->
            <div class="login">
                <!-- LOGO OF WEBSITE  -->
                <div class="logo-web">
                    <a href="./index.php"><img src="assets/img/logo-web-png.png" width="158" height="52"/></a>
                </div>
                <!-- CONTAINER OF FORM -->
                <div class="container-formulaire" >
                    <!-- TITLE  -->
                    <h1 class="title-login">Login</h1>
                    <!-- FORMULAIRE -->
                    <form class="formulaire" id="log" action="includes/login.inc.php" method="post">
                        <div class="col1"></div>
                        <div class="col2"></div>
                        <!-- PSEUDO -->
                        <input class="inptPseudo form-control" type="text" id="exampleFormControlInput-2" placeholder="pseudo" name="pseudo"/>
                        <!-- PASSWORD -->
                        <input class="inptPwd form-control" type="password" id="inputPassword" placeholder="Password" name="pw"/>
                        <!-- BUTTON LOGIN  -->
                        <div class="container-Roles">
                            <!-- SINGLE ROLE JOB OFFERER -->
                            <div class="signle-role">
                                <div class="img-bloc">
                                    <img width="33" height="34" src="assets/img/job-offer%20(1).png" />
                                    <!-- RADIO BUTTON 1 -->
                                    <input id="radio-btn-1" type="radio" name="role" value="emp"/>
                                </div>
                                <span class="lbl-two">i'm a job offerer<br /></span>
                                <p>who is looking for an employer to hire.</p>
                            </div>
                            <!-- SINGLE ROLE JOB SEEKER -->
                            <div class="signle-role">
                                <div class="img-bloc">
                                    <img width="36" height="36" src="assets/img/job.png" />
                                    <!-- RADIO BUTTON 1 -->
                                    <input id="radio-btn-2" type="radio" name="role" value="seeker"/>
                                </div>
                                <span>i'm a job seeker<br /></span>
                                <p>who is looking for to work.</p>
                            </div>
                        </div>
                        <button class="login-btn btn btn-dark" type="submit" name="submit">Login</button>
                    </form>
                    <p class="login-row" >I don't have an account ? <a href="./login join by your role.php">Sign Up</a></p>
                </div>
            </div>
            <!-- Right bloc - image  -->
            <div class="container-img" style="background: url('assets/img/3293465.jpg') center / cover repeat, var(--bs-blue);">
                <p style="font-size: 1px;">d</p>
            </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/controleS.js"></script>
        <script src="assets/js/controleSaisie.js"></script>

    </body>
   
</html>
