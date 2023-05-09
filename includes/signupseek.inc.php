<?php

    $cin = $_POST["cin"];
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $pseudo = $_POST["pseudo"];
    $pw = $_POST["pw"];
    $adresse = $_POST["adresse"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    // if(emptyInputSignup($code,$entName,$FirstName, $LastName,$pseudo, $pw) !== false){
    //     header("location: ../login.php?error=emptyinput");
    //     exit(); // stop the script from running

    // }
    // // if(invalidpseudo($pseudo) !== false){
    // //     header("location: ../login.php?error=invalidPseudo");
    // //     exit(); // stop the script from running
    // // }
    // if(uidExists($conn, $entName) !== false){
    //     header("location: ../login.php?error=EntNameTaken");
    //     exit(); // stop the script from running

    // }
    
    $sql = "INSERT INTO demandeur (pseudo, firstName, lastName, cin, pass_word, adresse) VALUES(? , ?, ?,?, ?,?);";
    $stmt = mysqli_stmt_init($conn);
 
    if(!mysqli_stmt_prepare($stmt, $sql)) {
       header("location: ../login.php?error=failed");
       exit(); // stop the script from running
    }
 
    mysqli_stmt_bind_param($stmt, "ssssss", $pseudo, $FirstName, $LastName, $cin, $pw, $adresse);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $_SESSION["cin"] = $cin;
    $_SESSION["pseudo"] = $pseudo;
    $_SESSION["role"] = "seeker";
 
    header("location: ../find job.php?error=none");
    exit();

