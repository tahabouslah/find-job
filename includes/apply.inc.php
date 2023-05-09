<?php
session_start();

require_once 'dbh.inc.php';
$code =  $_POST["code"];
$ps = $_SESSION["pseudo"];
// $id = $_POST["id"];

if (isset($_POST['app'])) {
    $submit_button = $_POST['app'];
    if ($submit_button == 'apply') {

        $sql = "INSERT INTO `candidature` (`pseudo`, `code_offre_emploi`, `etat_candidature`, `date_candidature`) VALUES (?, ?, '0', '2023-04-06 17:58:19')";

        $stmt = mysqli_stmt_init($conn);
        // Example of executing the SQL query
        $result = mysqli_query($conn, $sql);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../find job.php?apply=error");
            exit(); // stop the script from running
        }

        mysqli_stmt_bind_param($stmt,"ss", $ps,$code);

        mysqli_stmt_execute($stmt);


        header("location: ../find job.php?apply=success");
}else if ($submit_button == 'save') {
    $sql1 = "INSERT INTO `savedjobs` (`pseudo`, `code_offre_emploi`) VALUES (?, ?)";

    $stmt1 = mysqli_stmt_init($conn);
    // Example of executing the SQL query
    $result1 = mysqli_query($conn, $sql1);

    if(!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("location: ../find job.php?save=error");
        exit(); // stop the script from running
    }

    mysqli_stmt_bind_param($stmt1,"ss", $ps,$code);
    mysqli_stmt_execute($stmt1);

    header("location: ../find job.php?save=success");

   

  
} 

}


  

  

