<?php

require_once 'dbh.inc.php';

$id = $_POST["id"];

if (isset($_POST['op'])) {
    $submit_button = $_POST['op'];
    if ($submit_button == 'det') {

        $sql = "SELECT * FROM offre_emploi where code_offre_emploi = '".$id."'";
        $result = mysqli_query($conn, $sql);
        $titre = "";
        $desc = "";
        $code_dip = ""; 
        $nbx = "";
        $sal = ""; 
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
               $titre = $row['titre'];
                $id = $row["code_offre_emploi"];
                $desc = $row["descriptions"];
                $sal = $row["salaire_propose"];
                $code_dip = $row["code_diplome"];
                $nbx = $row["nombre_annees _experience"];
                
            }
            } else {
            echo "Error: " . mysqli_error($conn);
                }

        session_start();
        $_SESSION["titre"] = $titre;   
        $_SESSION["id"] = $id;
        $_SESSION["dess"] = $desc;   
        $_SESSION["nbx"] = $nbx;
        $_SESSION["sala"] = $sal; 
        $_SESSION["code_dip"] = $code_dip; 
        
        header("location: ../single-offre.php#?details=success");

    } else
    if ($submit_button == 'del') {
        // process the form data for delete button
        // Préparer la requête d'insertion
        // Example of constructing an SQL query for delete
        $sql = "DELETE FROM offre_emploi WHERE code_offre_emploi = ? "; 

        $stmt = mysqli_stmt_init($conn);
        // Example of executing the SQL query
        $result = mysqli_query($conn, $sql);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../DashOffer.php");
            exit(); // stop the script from running
        }

        mysqli_stmt_bind_param($stmt,"s", $id);

        mysqli_stmt_execute($stmt);
        header("location: ../DashOffer.php#?delete=success");
    }

  }

  

  

