<!DOCTYPE html>
<html lang="en" style="border-radius: 12px;">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <title>Register By role</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Narrow&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spline+Sans+Mono&amp;display=swap" />
        <link rel="stylesheet" href="assets/css/login-style.css" />
    </head>

    <body>
        <div class="container">
            <!-- LEFT BLOC -- CREATE ACCOUNT -->
            <div class="container-account">
                <div class="logo-web">
                    <a href="./index.php"><img src="assets/img/logo-web-png.png" width="158" height="52" style="padding-top: 0px; margin-left: -43px; margin-top: 2px; margin-bottom: 11px;" /></a>
                </div>
                <div class="container-formulaire">
                    <h1 class="title-create-account">Join by your role</h1>
                    <p class="describeRole">Choose the right role for you to enter our site, this option can be changed in the account settings section.</p>
                    <!-- CONTAINER OF TWO ROLES  -->
                    <form action="includes/redirect.inc.php" method="post">
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
                        <!-- BUTTON CONTINUE -->
                        <button class="continue-btn btn btn-dark" type="submit" name="choose">Continue</button>
                    </form>
                </div>
            </div>
            <!-- Right bloc - image  -->
            <div class="container-img" style="background: url('assets/img/3293465.jpg') center / cover repeat, var(--bs-blue);">
                <p style="font-size: 1px;">d</p>
            </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/controleSaisie.js"></script>

    </body>
</html>
