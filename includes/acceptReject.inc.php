<?php

require_once 'dbh.inc.php';

session_start();
$name = $_POST["test"];

if (isset($_POST['ops'])) {
    $submit_button = $_POST['ops'];
    if ($submit_button == '1') {

       $s = 'UPDATE candidature set etat_candidature = "1" where pseudo = "'.$name.'" and code_offre_emploi = "'.$_SESSION["id"].'"';
       $stmt = mysqli_stmt_init($conn);
        //Example of executing the SQL query
        $result = mysqli_query($conn, $s);

        if(!mysqli_stmt_prepare($stmt, $s)) {
            header("location: ../DashOffer.php");
           exit(); // stop the script from running
       }
       mysqli_stmt_execute($stmt);
        header("location: ../single-offre.php#?acceptance=success");
    } else
    if ($submit_button == '2') {
        $s = 'UPDATE candidature set etat_candidature = "2" where pseudo = "'.$name.'" and code_offre_emploi = "'.$_SESSION["id"].'"';
        $stmt = mysqli_stmt_init($conn);
         //Example of executing the SQL query
         $result = mysqli_query($conn, $s);
 
         if(!mysqli_stmt_prepare($stmt, $s)) {
             header("location: ../DashOffer.php");
            exit(); // stop the script from running
        }
        mysqli_stmt_execute($stmt);
         header("location: ../single-offre.php#?Reject=success");
    }

  }


  

  

