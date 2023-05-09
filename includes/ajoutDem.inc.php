<?php

require_once 'dbh.inc.php';

session_start();

$description = $_POST['desc'];
$dip = $_POST["diplome"];
$poste = $_POST['poste'];
$skills = $_POST["skills"];
$dateOfBirth = $_POST["dateOfBirth"];
$nbx = $_POST["nbx"];
$email = $_POST["email"];
$loc = $_POST["loc"];
$etat = $_POST["etat"];
$phone = $_POST["phone"];
$uni = $_POST["uni"];
$p = $_SESSION["pseudo"];
$photo_name = $_FILES['photo']['name'];
$photo_type = $_FILES['photo']['type'];
$photo_tmp_name = $_FILES['photo']['tmp_name'];
$photo_size = $_FILES['photo']['size'];
$photo_data = file_get_contents($_FILES['photo']['tmp_name']);

$sql = "INSERT INTO `demandeur_cv` (`pseudo`, `experience`, `email`, `location`, `etat_civile`, `phone`, `universite`, `descriptions`, `poste`, `BD`,`photo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)) {
    echo "erreur";
      header("location: ../dashDem.php?error");
      exit(); // stop the script from running
 }

 mysqli_stmt_bind_param($stmt,"sssssssssss", $p,$nbx,$email,$loc,$etat,$phone,$uni,$description,$poste,$dateOfBirth,$photo_data);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
foreach($skills as $skill){
    $sql2 = "INSERT INTO `competence_demandeur` (`pseudo`, `code_competence`) VALUES ('".$p."', '".$skill."');";
    $result3 = mysqli_query($conn, $sql2);
}


$sql3 = "INSERT INTO `diplome_demandeur` (`pseudo`, `code_diplome`) VALUES ('".$p."', '".$dip."');";
$result4 = mysqli_query($conn, $sql3);


header("location: ../dashDem.php?ajout=success");


mysqli_close($conn);