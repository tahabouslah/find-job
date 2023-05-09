<?php 

if(isset($_POST["submit"])) {

    $pseudo = $_POST["pseudo"];
    $pw = $_POST["pw"];
    $role = $_POST['role'];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // if(emptyInputLogin($username,$pw) !== false) {
    //     header("location: ../login.php?error=emptyinput");
    //     exit();
    // }

    loginUser($conn, $pseudo, $pw,$role);

}else {
    header("location: ../login.php");
    exit();
}