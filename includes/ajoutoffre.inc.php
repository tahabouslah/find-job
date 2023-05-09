<?php
session_start();
// Récupérer les données du formulaire
$titre = $_POST['titre'];
$description = $_POST['description'];
$nbex = $_POST['nbex'];
$salaire = $_POST['salaire'];
$diplome = $_POST["diplome"];
$skills = $_POST["skills"];
$pseudo = $_SESSION["pseudo"];
$id = $_SESSION["ajo"] + 1;

require_once 'dbh.inc.php';
// Préparer la requête d'insertion
$sql = "INSERT INTO `offre_emploi` (`code_offre_emploi`, `titre`, `descriptions`, `code_diplome`, `nombre_annees _experience`, `salaire_propose`, `pseudo`) VALUES (NULL, ?, ?,?,?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../DashOffer.php?error");
      exit(); // stop the script from running
 }

mysqli_stmt_bind_param($stmt,"ssssss", $titre, $description,$diplome ,$nbex,$salaire,$pseudo );

mysqli_stmt_execute($stmt);


foreach($skills as $skill){
      $sql2 = "INSERT INTO `offre_competence` (`code_offre_emploi`, `code_competence`) VALUES ('".$id."', '".$skill."');;";
      $result2 = mysqli_query($conn, $sql2);
  }


header("location: ../DashOffer.php");

mysqli_stmt_close($stmt);
mysqli_close($conn);

