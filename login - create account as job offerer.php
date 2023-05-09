<!DOCTYPE html>
<html lang="en" style="border-radius: 12px;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sign up - Job OFFERER</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Narrow&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spline+Sans+Mono&amp;display=swap">
    <link rel="stylesheet" href="assets/css/login-style.css">
</head>

<body>
    <div class="container">
        <!-- LEFT BLOC -- CREATE ACCOUNT -->
    <div class="container-account">
            <!-- LOGO OF WEBSITE -->
            <div class="logo-web"><a href="./index.php"><img src="assets/img/logo-web-png.png" width="158" height="52"></a></div>

            <div class="container-formulaire">
                <h1 class="title-create-account">Create an account</h1>
                <p class="role-title" >AS JOB OFFERER</p>
                <p class="describe">Describe yourself as clearly so that there are no mistakes </p>
                <div class="line-or"><hr></div>
                <!-- FORMULAIRE -->
                <form class="formulaire-create-account form-job-offerer" action="includes/signupoff.inc.php" method="post">
                    <!-- REGISTER NUMBER -->
                    <input class="inptCodeReg form-control" type="number" id="exampleFormControlInput-1"placeholder="Code registre" name="code"/>
                    <!-- ENTREPRISE NAME  -->
                    <input class="inptEntrName form-control" id="exampleFormControlInput-3"type="text"placeholder="Entreprise Name"  name="entName"/>
                    <!-- FIRST NAME  -->
                    <input class="inptFirstName form-control" type="text" placeholder="First name" name="FirstName"/>
                    <!-- LAST NAME -->
                    <input class="inptLastName form-control" type="text" placeholder="Last name" name="LastName"/>
                    <!-- PSEUDO  -->
                    <input class="inptPseudo form-control "type="text" id="exampleFormControlInput-2" placeholder="pseudo" name="pseudo"/>
                    <!-- EMAIL  -->
                    <input class="inptEmail form-control" type="email" id="exampleFormControlInput1" placeholder="name@example.com" />
                    <!-- PASSWORD  -->
                    <input class="inptPwd form-control" type="password" id="inputPassword" placeholder="Password" name="pw"/>
                    <!-- BUTTON CREATE -->
                    <button class="create-btn btn btn-dark" type="submit" name="submit1" onclick="offerer()">Create account</button>
                </form>
                <p class="create-login-row">Already have an account ? <a href="./login.php">Login</a></p>
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