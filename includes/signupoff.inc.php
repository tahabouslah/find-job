<?php

if(isset($_POST["submit1"])) {
    
    $code = $_POST["code"];
    $entName = $_POST["entName"];
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $pseudo = $_POST["pseudo"];
    $pw = $_POST["pw"];
  

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    // if(emptyInputSignup($code,$entName,$FirstName, $LastName,$pseudo, $pw) !== false){
    //     header("location: ../login.php?error=emptyinput");
    //     exit(); // stop the script from running

    // }
    // if(invalidpseudo($pseudo) !== false){
    //     header("location: ../login.php?error=invalidPseudo");
    //     exit(); // stop the script from running
    // }
    // if(uidExists($conn, $entName) !== false){
    //     header("location: ../login.php?error=EntNameTaken");
    //     exit(); // stop the script from running

    // }

    createUser($conn,$code,$entName,$FirstName, $LastName,$pseudo, $pw,$role );

}else {
    header("location: ../login.php?error=EntNameTaken");    
    exit();
}