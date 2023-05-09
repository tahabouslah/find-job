<?php 

function emptyInputSignup($code,$entName,$FirstName, $LastName,$pseudo, $pw){
    $result;
    if(empty($code)|| empty($entName)  || empty($FirstName) || empty($LastName) || empty($pseudo) || empty($pw) ){
        $result = true;
    }else {
        $result = false;
    }

    return $result;
}


// function invalidpseudo($pseudo){
//     $result;
//     if(!preg_match("/^[a-zA-Z0-9]*$/"), $pseudo){
//         $result = true;
//     }else {
//         $result = false;
//     }

//     return $result;
// }




function createUser($conn,$code,$entName,$FirstName, $LastName,$pseudo, $pw ,$role) {
   $sql = "INSERT INTO employeur (pseudo, nom_entreprise, nom_gerant, prenom_gerant, pass_word,code_registre_commerce) VALUES(? , ?, ?,?, ?,?);";
   $stmt = mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../login.php?error=failed");
      exit(); // stop the script from running
   }

   mysqli_stmt_bind_param($stmt, "ssssss", $pseudo, $entName, $FirstName, $LastName, $pw,$code);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);

   session_start();
    $_SESSION["pseudo"] = $pseudo;
    $_SESSION["role"] = "offerer";
   header("location: ../DashOffer.php?error=none");
   exit();

}



function emptyInputLogin($username,$pw) {
    $result;
    if(empty($username)|| empty($pw) ){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}


function userExists($conn, $pseudo, $role){
   if($role === "seeker"){
     $sql = "SELECT * FROM demandeur WHERE pseudo = ? ;";
   }else {
    $sql = "SELECT * FROM  employeur WHERE pseudo = ? ;";
   } 
   
   $stmt = mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../login.php?error=failed");
        exit(); // stop the script from running
   }

   mysqli_stmt_bind_param($stmt, "s", $pseudo);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if($row = mysqli_fetch_assoc($resultData)) {
    return $row;
   }else {
    $result = false;
    return $result;
   }

   mysqli_stmt_close($stmt);

}

function checkPw($conn, $pseudo,$pw ,$role){
    if($role === "seeker"){
      $sql = "SELECT * FROM demandeur WHERE pseudo = ?  and pass_word = ?;";
    }else {
     $sql = "SELECT * FROM  employeur WHERE pseudo = ? and pass_word = ?;";
    } 
    
    $stmt = mysqli_stmt_init($conn);
 
    if(!mysqli_stmt_prepare($stmt, $sql)) {
       header("location: ../login.php?error=failed");
         exit(); // stop the script from running
    }
 
    mysqli_stmt_bind_param($stmt, "ss", $pseudo, $pw);
    mysqli_stmt_execute($stmt);
 
    $resultData = mysqli_stmt_get_result($stmt);
 
    if($row = mysqli_fetch_assoc($resultData)) {
     return $row;
    }else {
     $result = false;
     return $result;
    }
 
    mysqli_stmt_close($stmt);
 
 }

function loginUser($conn, $pseudo, $pw,$role) {

    $userExists = userExists($conn,$pseudo,$role);
    
    if($userExists === false) {
       header("location: ../login.php?error=wrongLogin");
       exit();
   }

    $checkPwd = checkPw($conn,$pseudo,$pw,$role);

    if($checkPwd === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
        session_start();
        $_SESSION["pseudo"] = $pseudo;
        $_SESSION["role"] = $role;
        header("location: ../index.php");
        exit();
}


function systemScoringOffre() {
    $score = 0;
    





    return $score;
}



function Score_Offre(&$offres,$dem_comp,$dem_dip,$off_comp) {
    $score = 0;
    $sal = $offres["salaire_propose"] /100;
    $score += $sal;

    for($i=0;$i<count($dem_comp);$i++){
        for($j=0;$j<count($off_comp);$j++){
            if($dem_comp[$i] === $off_comp[$j]){
                $score += 5;
            }
        }
    }

    if($offres["code_diplome"] === $dem_dip["code_diplome"]){
        $score * 0;
    }

    

}