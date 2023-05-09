<?php
session_start();

include_once "includes/dbh.inc.php";

$sql2 = "SELECT * FROM `candidature` where pseudo = '".$_SESSION["pseudo"]."'";
$res2 = mysqli_query($conn,$sql2);  

$info2 = array();

while($r = mysqli_fetch_assoc($res2)){
    $info2[] = $r;
}

$offres = array();
foreach($info2 as $col) {
    $offres[] = array(
        'code_offre_emploi' => $col["code_offre_emploi"],
        'etat_candidature' => $col["etat_candidature"]
    );
}

  
  $sql = "SELECT * from demandeur_cv where pseudo = '".$_SESSION["pseudo"]."'";
  $re = mysqli_query($conn,$sql);                            
  $cv = array();

  while($r = mysqli_fetch_assoc($re)){
      $cv[] = $r;
  }  

  $ex = "";
  $email = "";
  $phone = "";
  $etat_c = "";
  $loc = "";
  $desc ="";
  $fn = "";
  $post = "";
  $bd = "";
  $uni = "";
  $photo = "";
  foreach($cv as $col) {
     $ex = $col["experience"];
     $email = $col["email"];
     $phone = $col["phone"];
     $etat_c = $col["etat_civile"];
     $loc = $col["location"];
     $desc = $col["descriptions"];
     $post = $col["poste"];
     $bd = $col["BD"];
     $uni = $col["universite"];
     $photo = $col["photo"];
  }        

  $sql1 = "SELECT * from demandeur where pseudo = '".$_SESSION["pseudo"]."'";
  $r1 = mysqli_query($conn,$sql1);                            
  $name = array();

  while($r = mysqli_fetch_assoc($r1)){
      $name[] = $r;
  }  

  $fn = "";

  foreach($name as $col) {
     $fn = $col["firstName"]." ".$col["lastName"];
  }        

  
  $_SESSION["poste"] = $post;


  $sql2 = "SELECT * from competence_demandeur where pseudo = '".$_SESSION["pseudo"]."'";
  $r2 = mysqli_query($conn,$sql2);                            
  $comp = array();

  while($r = mysqli_fetch_assoc($r2)){
      $comp[] = $r;
  }  

  $comp_dem = array();
  foreach($comp as $col) {
    $comp_dem[] = array(
        'code_competence' => $col["code_competence"]
    );
  }   

///////////diplome

$sql3 = "SELECT * from diplome_demandeur where pseudo = '".$_SESSION["pseudo"]."'";
  $r3 = mysqli_query($conn,$sql3);                            
  $diplom = array();

  while($r = mysqli_fetch_assoc($r3)){
      $diplom[] = $r;
  }  

  $diplom_dem = array();
  foreach($diplom as $col) {
    $diplom_dem[] = array(
        'code_diplome' => $col["code_diplome"]
    );
  }   


/////////// comp

//   $sql2 = "SELECT * from competence_demandeur where pseudo = '".$_SESSION["pseudo"]."'";
//   $r2 = mysqli_query($conn,$sql2);                            
//   $comp = array();

//   while($r = mysqli_fetch_assoc($r2)){
//       $comp[] = $r;
//   }  

//   $comp_dem = array();
//   foreach($comp as $col) {
//     $comp_dem[] = array(
//         'code_competence' => $col["code_competence"]
//     );
//   }   

if(isset($_SESSION["pseudo"])) {


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

        <title>profile-user</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Andika&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Narrow&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spline+Sans+Mono&amp;display=swap" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css" />
        <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css" />
    
         <!----======== CSS ======== -->
        <link rel="stylesheet" href="assets/css/dashDem.css" /> 
        <link rel="stylesheet" href="assets/css/dashDem2.css"/>
        <link rel="stylesheet" href="assets/css/cv.css"/>
        <link rel="stylesheet" href="assets/css/cv2.css"/>

        <!----===== Boxicons CSS ===== -->
        <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />

        <title>Dashboard Sidebar Menu</title>
    </head>
    <body>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                       <a href="./index.php"> <img src="assets/img/logo.png" alt="" /></a>
                    </span>

                    <div class="text logo-text">
                        <span class="name">Find Job</span>
                        <span class="profession">Together we grow</span>
                    </div>
                </div>

                <i class="bx bx-chevron-right toggle"></i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <li class="search-box">
                        <i class="bx bx-search icon"></i>
                        <input type="text" placeholder="Search..." />
                    </li>

                    <ul class="menu-links" style="padding-left: 0rem;" ;>
                        <li class="nav-link">
                            <a href="#" class="btn-home">
                                <i class="bx bx-home-alt icon btn-side"></i>
                                <span class="text nav-text">Profile</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#">
                                <i class="bx bx-bar-chart-alt-2 icon btn-side"></i>
                                <!-- <i class='bx bx-save icon'></i> -->
                                <span class="text nav-text">Editor</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#">
                                <i class="bx bx-bell icon btn-side"></i>
                                <span class="text nav-text">Progress</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#">
                                <i class="bx bx-pie-chart-alt icon btn-side"></i>
                                <span class="text nav-text">Saved</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#">
                                <i class="bx bx-heart icon btn-side"></i>
                                <span class="text nav-text">CV</span>
                            </a>
                        </li>

                        
                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="">
                        <a href="includes/logout.inc.php">
                            <i class="bx bx-log-out icon"></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>

                    <li class="mode">
                        <div class="sun-moon">
                            <i class="bx bx-moon icon moon"></i>
                            <i class="bx bx-sun icon sun"></i>
                        </div>
                        <span class="mode-text text">Dark mode</span>

                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>
                </div>
            </div>
        </nav>

        <!-- 1st bloc profile -->
        <section class="home active" style="position: absolute;">
            <!-- indetify of site -->
            <div class="identify-site">
                <a class="logo-side-profile-editor" href="#"><img src="assets/img/logo-web-png.png" width="158" height="50" /></a>
            </div>
            <div class="container-profile-editor">
                <div class="container-TPE-btnSave">
                    <h1>Dashboard Seeker&nbsp;</h1>
                </div>
                <!-- FIRST COLUMN FROM THE LEFT -->
                <div class="profile-editor-1-column">
                    <!-- <img class="rounded-circle" src="assets/img/portrait-women.png" width="111" height="112" /> -->
                    <?php echo "<img class='rounded-circle' src='data:image/jpeg;base64,". base64_encode($photo)."'    width='111' height='112'/>" ?> 
                <!-- <img src="uploads/" alt="" class='rounded-circle'  width='111' height='112'> -->
                    <p class="text-center" id="fullName"><?php echo $fn ?></p>
                    <p class="text-center" id="post"><?php echo $post ?></p>
                    <p class="description">
                        <?php echo $desc ?>
                    </p>
                    <p class="skills-title">Skills :</p>
                    <div class="skills-items">
                         <?php 
                            foreach($comp_dem as $cd){
                                $code = $cd["code_competence"];
                            
                             
                        $query = "select libelle_competence from competence where code_competence  = '".$code."';"; 
                        $ress = mysqli_query($conn,$query);

                        $dip = array();
                
                        while($r = mysqli_fetch_assoc($ress)){
                            $dip[] = $r;
                        } 

                        $d = array();
                        foreach($dip as $col) {
                            $d[] = array(
                         'libelle_competence' => $col["libelle_competence"],
                        );
                        }
                            
                        ?>
                        <p id="p-4"><?php foreach($d as $m){echo $m["libelle_competence"];} ?></p>
                        <?php } ?>
                    </div>
                </div>
                <!-- CENTRE -->
                <div class="profile-editor-2-column">
                    <!-- BX BASIC INFOS -->
                    <div class="bx-basic-infos">
                        <!-- here -->
                        <p class="bx-basic-infos-title">Basic information :</p>
                        <div class="blocs-infos">
                            <div class="age-display">
                                <p class="age-title">DBO</p>
                                <p class="age-value"><?php echo $bd; ?></p>
                            </div>
                            <!-- BLOC Years of Experience -->
                            <div class="yrs-experience exp-show">
                                <p class="yrs-experience-title">Experience&nbsp;</p>
                                <p class="yrs-experience-value"><?php echo $ex." Years" ?>&nbsp;</p>
                            </div>
                            <div class="email email-show">
                                <p class="email-title">Email&nbsp;</p>
                                <p class="email-adr"><?php echo $email ?></p>
                            </div>
                            <div class="location">
                                <p class="location-title">Location :</p>
                                <p class="location-value"><?php echo $loc ?></p>
                            </div>
                            <div class="availability">
                                <p class="availability-title">Etat civil</p>
                                <?php
                                $e = ""; 
                                 if($etat_c === "1") {
                                    $e = "Marié";
                                 }else {
                                    $e = "célibataire";
                                 }
                                 ?>
                                <p class="availability-value"><?php echo $e ?></p>
                            </div>
                            <div class="phone-number">
                                <p class="phone-number-title">Phone Number :</p>
                                <p class="phone-number-value"><?php echo "+216 ".$phone ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- CENTER BLOC IN BOTTOM -->
                    <div class="container-career active">
                        <!-- <div class="nav-btns-carrer" style="width: 563px;height: 42.4px;border-bottom: 2px solid var(--bs-gray-500) ;">
                                        <p class="btn-exp    btn-career"style="margin-top: 10px;margin-bottom: 0px;height: 31.4px;padding-top: 0px;padding-right: 50px;padding-left: 50px;margin-right: -16px;border-style: solid;border-top-style: none;border-right-style: none;border-bottom-style: none;border-left-style: none;font-family: Poppins, sans-serif;font-size: 15px;color: var(--bs-gray);">Experience</p>
                                        <p class="btn-edu    btn-career"style="margin-top: 10px;margin-bottom: 0px;height: 31.4px;padding-top: 0px;padding-right: 50px;padding-left: 50px;margin-right: -16px;border-style: none;border-right: 1px none var(--bs-gray-500);border-bottom-style: none;border-bottom-color: var(--bs-gray-500);border-left: 1px solid var(--bs-gray-500);font-family: Poppins, sans-serif;font-size: 15px;color: var(--bs-gray);">Education</p>
                                        <p class="btn-certif btn-career"style="margin-top: 10px;margin-bottom: 0px;height: 31.4px;padding-top: 0px;padding-right: 50px;padding-left: 50px;border-style: none;border-bottom-style: none;border-bottom-color: var(--bs-gray-500);border-left: 1px solid var(--bs-gray-500);font-family: Poppins, sans-serif;font-size: 15px;color: var(--bs-gray);">Certification</p>
                                    </div> -->
                        <div class="nav-btns-carrer">
                            <p
                                class="btn-exp btn-career-display"
                                onmouseover="this.style.color='#3a86ff'; this.style.fontWeight='bold'; this.style.borderBottom='2px solid black';"
                                onmouseout="this.style.color='var(--bs-gray)'; this.style.fontWeight='bold'; this.style.borderBottom='none';"
                            >
                                Experience
                            </p>
                            <p
                                class="btn-edu btn-career-display"
                                onmouseover="this.style.color='#3a86ff'; this.style.fontWeight='bold'; this.style.borderBottom='2px solid black';"
                                onmouseout="this.style.color='var(--bs-gray)'; this.style.fontWeight='bold'; this.style.borderBottom='none';"
                            >
                                Diplome
                            </p>
                            <p
                                class="btn-certif btn-career-display"
                                onmouseover="this.style.color='#3a86ff'; this.style.fontWeight='bold'; this.style.borderBottom='2px solid black';"
                                onmouseout="this.style.color='var(--bs-gray)'; this.style.fontWeight='bold'; this.style.borderBottom='none';"
                            >
                                Université
                            </p>
                        </div>
                        <!-- BLOC DOM CAREER active career-->
                        <div class="box-singels-careers-exp display career-display" id="box-singels-careers-exp">
                            <div class="single-career-display">
                                <img src="assets/img/google.png" width="42" height="40" />
                                <p class="name-company">Google</p>
                                <p class="adr">Jan 2020 - Present | Tunis , Lac 2</p>
                                <p class="name-post">Lead - Front end developer&nbsp;</p>
                            </div>
                            <div class="single-career-display">
                                <img src="assets/img/google.png" width="42" height="40" />
                                <p class="name-company">Google</p>
                                <p class="adr">Jan 2020 - Present | Tunis , Lac 2</p>
                                <p class="name-post">Lead - Front end developer&nbsp;</p>
                            </div>
                            <div class="single-career-display">
                                <img src="assets/img/google.png" width="42" height="40" style="margin-top: 8px; margin-left: 14px;" />
                                <p class="name-company">Google</p>
                                <p class="adr">Jan 2020 - Present | Tunis , Lac 2</p>
                                <p class="name-post">Lead - Front end developer&nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <!-- BLOC DOM EDUCATION -->
                    <div class="box-singels-careers-edu career-display" id="box-singels-careers-edu">
                    <?php 
                            foreach($diplom_dem as $cd){
                                $code = $cd["code_diplome"];
                            
                             
                        $query = "select libelle_diplome from diplome where code_diplome   = '".$code."';"; 
                        $ress = mysqli_query($conn,$query);

                        $dip = array();
                
                        while($r = mysqli_fetch_assoc($ress)){
                            $dip[] = $r;
                        } 

                        $d = array();
                        foreach($dip as $col) {
                            $d[] = array(
                         'libelle_diplome' => $col["libelle_diplome"],
                        );
                        }
                     
                        ?>
                        <div class="single-career-display">
                            <img src="assets/img/tennis.png" width="42" height="40" />
                            <p class="name-company"><?php foreach($d as $l){ echo $l["libelle_diplome"];} ?></p>
                            <p class="name-post"><?php echo $post ?>&nbsp;</p>
                        </div>
                        <?php
                        }   
                        ?>
                    </div>
                    <!-- BLOC DOM CERTIF -->
                    <div class="box-singels-careers-certif career-display" id="box-singels-careers-certif">
                    <?php 
                            
                            
                             
                        $query1 = "select libelle_universite from universite where code_universite = '".$uni."';"; 
                        $ress1 = mysqli_query($conn,$query1);

                        $dip1 = array();
                
                        while($r = mysqli_fetch_assoc($ress1)){
                            $dip1[] = $r;
                        } 

                        $u = array();
                        foreach($dip1 as $col) {
                            $u[] = array(
                                'libelle_universite' => $col["libelle_universite"],
                        );
                        }
                        ?>
                        <div class="single-career-display">
                            <img src="assets/img/chess.png" width="42" height="40" />
                            <p class="name-company"><?php foreach($u as $l){ echo $l["libelle_universite"];}?></p>
                            <p class="name-post"><?php echo $post ?>&nbsp;</p>
                        </div>
                    </div>
                    
                </div>
                <!-- LAST COLUMN -->
                <div class="profile-editor-3-column">
                    <p class="video-title">That's My word</p>
                    <!-- VIDEO CODE  -->
                    <video
                        class="presVideo"
                        controls
                        src="assets/img/⚡🎵 Epic Electric Timer - 30 Seconds Countdown 🎵⚡.mp4"
                    ></video>

                    <p class="interest-title">That's My Interested</p>
                    <!-- single interest -->
                    <div class="box-single-interests">
                        <div class="single-interest-display d-flex">
                            <div class="single-interest">
                                <img src="assets/img/like (1).png" width="25" height="24" />
                                <p class="interest-name">Team Working</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PROFILE EDITOR -->
        <section class="home">
            <form name="frml-profile-editor" action="includes/ajoutDem.inc.php" method="post" enctype="multipart/form-data">
                <!-- indetify of site -->
                <div class="identify-site">
                    <a class="logo-side-profile-editor" href="#"><img src="assets/img/logo-web-png.png" width="158" height="50" /></a>
                </div>
                <div class="container-profile-editor">
                    <div class="container-TPE-btnSave">
                        <h1>User Profile</h1>
                        <input type="image" src="assets/img/floppy-disk.png" width="30" height="30" alt="submit">
                    </div>
                    <!-- FIRST COLUMN FROM THE LEFT -->
                    <div class="profile-editor-1-column uploadImpg">
                        <input type="file" name="photo" >
                        <!-- <img class="rounded-circle" src="" width="111" height="112" />
                         <input type="file" name="pdf" class="rounded-circle"  width="111" height="112" /> -->
                        <!-- <input class="btn btn-primary btn-upload" type="file" name="" id="uploadPicture" value="Upload" onclick="setImgSrcFromInputFile('#uploadPicture','.uploadImpg>img')" />
                        <button class="btn btn-primary" type="button" >Upload</button> --> 
                        <input class="inpt-name" type="text" name="fn"  placeholder="Fatima Ben Ahmed" />
                        <input class="inpt-function" type="text" name="poste" placeholder="Lead - Front end developer" />
                        
                        <textarea
                            name="desc"
                            class="profile-editor-description"
                            rows="5"
                            cols="8"
                            placeholder="Develop responsive HTML pages using bootstrap as per approved mock-ups, matching of the mock-ups. Motivated to combine the art of design with the art of programming."
                        ></textarea>
                        <p class="skills-title">Skills :</p>
                        
                            <select class="form-control select-input focused" name="skills[]" multiple width="15%">
                                <!-- <option selected disabled>Choose Option </option> -->
                                <option value="2">CSS</option>
                                <option value="1">HTML</option>
                                <option value="3">Java</option>
                                <option value="4">gestion de projet</option>
                                <option value="5">Analyse financière</option>
                            </select>
                    </div>
                    <!-- CENTER COLUMN -->
                    <div class="profile-editor-2-column">
                        <!-- BX BASIC INFOS -->
                        <div class="bx-basic-infos">
                            <p class="bx-basic-infos-title">Basic information :</p>
                            <div class="blocs-infos">
                                <!-- bloc age -->
                                <div class="age">
                                    <p class="age-title">DOB</p>
                                    <div class="container-inptAge" >
                                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" min="1000-01-01" max="9999-12-31">
                                    </div>
                                </div>
                                <!-- BLOC Years of Experience -->
                                <div class="yrs-experience">
                                    <p class="yrs-experience-title">Experience&nbsp;</p>
                                    <div class="container-inptExp">
                                        <input type="number" name="nbx" placeholder="3" />
                                        <p>&nbsp;Years</p>
                                    </div>
                                </div>
                                <!-- BLOC EMAIL -->
                                <div class="email" style="width: 193px;">
                                    <p class="email-title">Email&nbsp;</p>
                                    <input class="inptEmail" type="email" name="email" placeholder="fbenahmed@gmail.com" />
                                </div>
                                <!-- BLOC Location -->
                                <div class="location">
                                    <p class="location-title">Location :</p>
                                    <div class="container-location-infos">
                                        <input class="inptVille" type="text" name="loc" placeholder="Soliman" />
                                        <p>&nbsp;,</p>
                                        <input class="inptGouv" type="text" placeholder="Nabeul" />
                                    </div>
                                </div>
                                <!-- BLOC Availability -->
                                <div class="availability">
                                    <p class="availability-title">Etat civil&nbsp;</p>
                                    <div width="15%">
                                        <select class="form-select form-select-edit frm-select-2" name="etat" width="2%">
                                            <option>Choose Option</option>
                                            <option value="1">Marié (e)</option>
                                            <option value="2">célibataire</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- BLOC Phone Number -->
                                <div class="phone-number">
                                    <p class="phone-number-title">Phone Number :</p>
                                    <div class="phone-number-inputs">
                                        <p>+216&nbsp;</p>
                                        <input type="tel" name="phone" placeholder="12345678" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CENTER BLOC IN BOTTOM -->
                        <div class="container-career">
                            <div class="nav-btns-carrer">
                                <p class="btn-exp btn-career" onmouseover="this.style.color='#3a86ff'; this.style.fontWeight='bold'; this.style.borderBottom='2px solid black';" onmouseout="this.style.color='var(--bs-gray)'; this.style.fontWeight='bold'; this.style.borderBottom='none';">Experience</p>
                                <p class="btn-edu btn-career" onmouseover="this.style.color='#3a86ff'; this.style.fontWeight='bold'; this.style.borderBottom='2px solid black';" onmouseout="this.style.color='var(--bs-gray)'; this.style.fontWeight='bold'; this.style.borderBottom='none';">Diplome</p>
                                <p class="btn-certif btn-career" onmouseover="this.style.color='#3a86ff'; this.style.fontWeight='bold'; this.style.borderBottom='2px solid black';" onmouseout="this.style.color='var(--bs-gray)'; this.style.fontWeight='bold'; this.style.borderBottom='none';">Universités</p>
                            </div>
                            <!-- BLOC DOM CAREER -->
                            <div class="bx-career">
                                <!-- SINGLE CAREER EDITOR -->
                                <div class="exp-editor-display active career">
                                    <p class="title-subbx">Experience</p>
                                    <div class="single-career-editor-exp">
                                        <div class="left-col-exp">
                                            <img id="imgOne-exp" src="assets/img/unknown.png" width="36" height="36" />
                                            <input class="btn" type="file" id="uploadCompany" onclick="setImgSrcFromInputFile('#uploadCompany','.left-col-exp>img')" />
                                        </div>
                                        <input class="inputCompany" type="text" />
                                        <input class="inputPost" type="text" />
                                        <input class="inputDesc" type="text" />
                                    </div>
                                    <div class="btn-add-career">
                                        <!-- ADD BUTTON -->
                                        <button class="btn btn-primary addCareer" type="button">add</button>
                                    </div>
                                    <!-- SINGLE CAREER DISPLAY -->
                                    <div class="box-singels-careers-exp-edit">
                                        <!-- <div class="single-career-display">
                                        <img src="assets/img/google.png" width="34" height="34" />
                                        <p class="name-company">Google</p>
                                        <p class="adr">Jan 2020 - Present | Tunis , Lac 2</p>
                                        <p class="name-post">Lead - Front end developer&nbsp;</p>
                                    </div> -->
                                    </div>
                                </div>
                                <div class="edu-editor-display career">
                                    <p class="title-subbx">Diplomes</p>
                                    <div class="single-career-editor-edu d-flex">
                                        <div class="left-col-edu">
                                            <img id="imgOne-edu" src="assets/img/unknown.png" width="36" height="36" />
                                            <input class="btn" type="file" id="uploadInstitue" onclick="setImgSrcFromInputFile('#uploadInstitue','.left-col-edu>img')" />
                                        </div>
                                        <select class="form-select  form-select-edit-2 frm-select-3" width="2%" name="diplome">
                                            <option selected disabled>Choose Option</option>
                                            <option value="1">Business Information System </option>
                                            <option value="2">Business Inteligence</option>
                                            <option value="4">Accounting</option>
                                            <option value="3">Digital Marketing</option>
                                        </select>
                                        <input class="inputSpec" type="text" />
                                        <input class="inputDesc" type="text" />
                                    </div>
                                    <!-- SINGLE CAREER DISPLAY -->
                                    <div class="box-singels-careers-edu-edit">
                                        <!-- <div class="single-career-display">
                                        <img src="assets/img/google.png" width="34" height="34" />
                                        <p class="name-company">Google</p>
                                        <p class="adr">Jan 2020 - Present | Tunis , Lac 2</p>
                                        <p class="name-post">Lead - Front end developer&nbsp;</p>
                                    </div> -->
                                    </div>
                                </div>

                                <div class="certif-editor-display career">
                                    <p class="title-subbx">Université</p>
                                    <!-- SINGLE CERTIFICATION -->
                                    <div class="single-career-editor-certif d-flex">
                                        <div class="left-col-certif">
                                            <img id="imgOne-certif" src="assets/img/unknown.png" width="36" height="36" />
                                            <input class="btn" type="file" id="uploadCentre" onclick="setImgSrcFromInputFile('#uploadCentre','.left-col-certif>img')" />
                                        </div>
                                        <select class="form-select  form-select-edit-2 frm-select-4" width="2%" name="uni">
                                            <option selected disabled>Choose Option</option>
                                            <option value="1">ISG Tunis </option>
                                            <option value="iset nabeul">ISET NABEUL</option>
                                            <option value="5">FSEG</option>
                                            <option value="2">Ihec Carthage</option>
                                            <option value="ihec">ISCAE</option>
                                            <option value="3">INSAT </option>
                                            <option value="4">ISI</option>
                                            <option value="6">ISET</option>
                                        </select>
                                        <input class="inputSpec" type="text" />
                                        <input class="inputDesc" type="text" />
                                    </div>
                                    <div class="btn-add-certif">
                                        <!-- ADD BUTTON -->
                                        <button class="btn btn-primary addCertif" type="button">add</button>
                                    </div>
                                    <!-- SINGLE CAREER DISPLAY -->
                                    <div class="box-singels-careers-certif-edit">
                                        <!-- <div class="single-career-display">
                                            <img src="assets/img/google.png" width="34" height="34" />
                                            <p class="name-company">Google</p>
                                            <p class="adr">Jan 2020 - Present | Tunis , Lac 2</p>
                                            <p class="name-post">Lead - Front end developer&nbsp;</p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- LAST COLUMN -->
                    <div class="profile-editor-3-column">
                        <p class="video-title">That's My word</p>
                        <!-- VIDEO CODE  -->
                        <video class="presVideo " id="video-player" controls>
                            <source src="assets/img/⚡🎵 Epic Electric Timer - 30 Seconds Countdown 🎵⚡.mp4" type="video/mp4">
                            
                        </video>
                        <input id="video-upload" type="file" accept="video/*" style="display: none;"/>
                        <button class="btn-primary btn-load" onclick="uploadVideo()" >Load video</button>
                        <p class="interest-title">That's My Interested</p>
                        <!-- single interest editor -->
                        <div class="single-interest-editor">
                            <div class="interest">
                                <img src="assets/img/like%20(1).png" width="25" height="24" />
                                <input type="text" placeholder="My .........." />
                            </div>
                            <div class="btn-block">
                                <button class="btn btn-primary btn-add-int" type="button">add</button>
                            </div>
                        </div>
                        <!-- single interest -->
                        <div class="box-single-interests-edit">
                            <!-- <div class="single-interest-display">
                            <div class="single-interest d-flex  " >
                                <img src="assets/img/like%20(1).png" width="25" height="24" />
                                <p class="interest-name">Team Working</p>
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
            </form>
        </section>

        <section class="home home2" style=" margin-left: 1%;width: 94%;margin-bottom: 27px;">
            <!-- BLOCK APPLIED -->
                <div class="identify-site d-flex d-xxl-flex justify-content-around align-items-xxl-center" style="height: 65.8px; width: 1308.4px; border-style: none; margin-left: -60px;">
                    <img src="assets/img/logo-web-png.png" width="158" height="50" style="margin-top: 9px; margin-left: 328px;" />
                </div>
                <div class="container-jobs d-flex justify-content-center flex-wrap">
                    <div class="container-title d-flex" >
                        <h1>Applied Jobs</h1>
                    </div>
                    <div class="container-all-saved-jobs d-flex justify-content-center align-items-xxl-center">
                        <div class="container-load-jobs col-md-6 col-xxl-11 d-flex justify-content-start flex-wrap" style="height: 564px; width: 96%; margin-left: 10px; margin-top: 14px;">
                            <?php
                                $code_off ="";
                                foreach($offres as $c){
                                    $code_off = $c["code_offre_emploi"];

                                $query = "select * from offre_emploi where code_offre_emploi = '".$code_off."';"; 
                                $ress = mysqli_query($conn,$query);
                    
                                $dip = array();
                                    
                                while($r = mysqli_fetch_assoc($ress)){
                                    $dip[] = $r;
                                } 
                    
                                $d = array();
                                foreach($dip as $col) {
                                    $d[] = array(
                                        'titre' => $col["titre"],
                                        'salaire_propose' => $col["salaire_propose"],
                                        'descriptions' => $col["descriptions"],
                                        'nombre_annees _experience' => $col["nombre_annees _experience"],
                                        'code_diplome' => $col["code_diplome"],
                                        'code_offre_emploi' => $col["code_offre_emploi"],

                                    );
                                } 

                                        
                                
                            ?>
                            <!-- Single-offer -->
                            <div class="single-offer-saved">
                                <div class="first-line d-flex justify-content-between">
                                    <img  width="33" height="31" src="assets/img/google.png" />
                                    
                                </div>
                                <div class="second-line justify-content-between" style="height: 119px; width: 298.2px; border-width: 1px; border-color: var(--bs-blue);">
                                    <h2><?php foreach($d as $cl){echo $cl["titre"];} ?></h2>
                                    <p class="text-start"><?php foreach($d as $cl){echo $cl["descriptions"];} ?></p>
                                </div>
                                <div class="third-line d-flex justify-content-between">
                                    <p class="p1"><?php foreach($d as $cl){echo $cl["salaire_propose"]." K";} ?>&nbsp;</p>
                                    <?php 
                                        $code_dip = "";
                                        foreach($d as $cl){
                                            $code_dip = $cl["code_diplome"];

                                            $query = "select libelle_diplome from diplome where diplome.code_diplome = '".$code_dip."';"; 
                                            $ress = mysqli_query($conn,$query);
                            
                                            $d1 = array();
                                            
                                            while($r = mysqli_fetch_assoc($ress)){
                                                $d1[] = $r;
                                            } 
                            
                                            $d2 = array();
                                            foreach($d1 as $col) {
                                                 $d2[] = array(
                                                     'libelle_diplome' => $col["libelle_diplome"],
                                                );
                                            }

                                            $dip = "";
                                            foreach($d2 as $col)
                                            {
                                                $dip = $col["libelle_diplome"];
                                            }
                                            $_SESSION["dipp"] = $dip;
                                            
                                        }
                                    ?>
                                    <p><?php echo $_SESSION["dipp"];?>&nbsp;</p>
                                    <p class="p3"><?php foreach($d as $cl){echo $cl["nombre_annees _experience"]." Years";} ?>&nbsp;</p>
                                </div>
                                <div class="fourth-line-btns-applied d-flex justify-content-around">
                                    <?php

                                         if($c["etat_candidature"] === "1"){
                                            echo ' <button class="btn btn-success" type="button">Accepted</button>';
                                        }else if($c["etat_candidature"] === "0"){
                                            echo ' <button class="btn btn-warning" type="button">In progress</button>';
                                        }else if($c["etat_candidature"] === "2"){
                                            echo ' <button class="btn btn-danger" type="button">Denied</button>';
                                        } 
                                    ?>
                                   
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
        </section>
        <!-- SAVED JOBS -->
        <section class="home saved-jobs">
                <div class="identify-site d-flex d-xxl-flex justify-content-around align-items-xxl-center">
                    <img src="assets/img/logo-web-png.png" width="158" height="50" />
                </div>
                <div class="container-jobs d-flex justify-content-around flex-wrap align-items-xxl-start">
                    <div class="container-title d-flex">
                        <h1>Saved Jobs</h1></div>
                    <div class="container-all-saved-jobs d-flex justify-content-center flex-wrap align-items-xxl-center">
                        <div class="container-load-jobs col-md-6 col-xxl-11 d-flex justify-content-start flex-wrap align-items-xxl-start">
                            <!-- Single-offer -->
                            <?php
                               $ps = $_SESSION["pseudo"];
                               $sql3 = "SELECT * FROM `savedjobs` where pseudo = '".$ps."'";
                               $res3 = mysqli_query($conn,$sql3);
                               
                               $info3 = array();
                               
                               while($r = mysqli_fetch_assoc($res3)){
                                   $info3[] = $r;
                               }
                               
                               $saved = array();
                               foreach($info3 as $col) {
                                   $saved[] = array(
                                       'pseudo' => $col["pseudo"],
                                       'code_offre_emploi' => $col["code_offre_emploi"]
                                   );
                               }



                               foreach($saved as $s){
                                    $code_off = $s["code_offre_emploi"];

                                
                                $sql4 = "SELECT * FROM `offre_emploi` where code_offre_emploi  = '".$code_off."'";
                                $res4 = mysqli_query($conn,$sql4);
                                
                                $info4 = array();
                                
                                while($r = mysqli_fetch_assoc($res4)){
                                    $info4[] = $r;
                                }
                                
                                $off_info = array();
                                foreach($info4 as $col) {
                                    $off_info[] = array(
                                        'titre' => $col["titre"],
                                        'code_offre_emploi' => $col["code_offre_emploi"],
                                        'descriptions' => $col["descriptions"],
                                        'salaire_propose' => $col["salaire_propose"],
                                        'nombre_annees _experience' => $col["nombre_annees _experience"],
                                        'code_diplome' => $col["code_diplome"]
                                    );
                                }    
                                 
                            ?>
                            <form action="includes/applyS.inc.php" method="post">
                            <div class="single-offer-saved">
                                <div class="first-line d-flex justify-content-between">
                                    <img  width="33" height="31" src="assets/img/google.png" />
                                    <input class="icon-save" type="image"src="assets/img/bookmark.png" width="23" height="22" onclick="toggleImage(this, 'assets/img/bookmark.png', 'assets/img/save-instagram.png')">
                                </div>
                                <div class="second-line justify-content-between">
                                <?php echo '<input type="hidden" name="code" value="'.$code_off.'">'; ?>
                                    <h2 ><?php foreach($off_info as $o){echo $o["titre"];} ?></h2>
                                    <p class="text-start"><?php foreach($off_info as $o){echo $o["descriptions"];} ?>&nbsp;</p>
                                </div>
                                <div class="third-line d-flex justify-content-between">
                                    <p class="p1"><?php foreach($off_info as $o){echo $o["salaire_propose"]." K";} ?>&nbsp;</p>
                                    <p><?php 
                                    $code_dip = "";
                                    foreach($off_info as $o){$code_dip = $o["code_diplome"];} 
                                    $sql5 = "SELECT * FROM `diplome` where code_diplome   = '".$code_dip."'";
                                    $res5 = mysqli_query($conn,$sql5);
                                    
                                    $info5 = array();
                                    
                                    while($r = mysqli_fetch_assoc($res5)){
                                        $info5[] = $r;
                                    }
                                    
                                    $lib_dip = array();
                                    foreach($info5 as $col) {
                                        $lib_dip[] = array(
                                            'libelle_diplome' => $col["libelle_diplome"]
                                        );
                                    } 

                                    foreach($lib_dip as $l) {
                                        echo $l["libelle_diplome"];
                                    }
                                    ?>&nbsp;</p>
                                    <p class="p3"><?php foreach($off_info as $o){echo $o["nombre_annees _experience"]." Years";} ?>&nbsp;</p>
                                </div>
                                <div class="fourth-line-btns d-flex justify-content-around">
                                    <?php
                                         $ps = $_SESSION["pseudo"];
                                         $sql = "SELECT * FROM candidature where pseudo = '".$ps."'";
                                         $result = mysqli_query($conn, $sql);
                                         $applied = false;
                                         if ($result) {
                                             while ($row = mysqli_fetch_assoc($result)) {
                                                 if($row['code_offre_emploi'] === $code_off){
                                                      $applied = true;
                                                }
                                             }
                                             if($applied === false){
                                                echo '<button class="btn btn-primary navigation-btn" style="height:36px"  type="submit" value="apply" name="app">Apply Now</button>';
                                            }else {
                                                echo '<button class="btn btn-primary navigation-btn" style="background-color:red; border:none; cursor:none; height:36px" type="button" name="app">Applied</button>';
                                            }
                                        }
                                    ?>
                                </div>
                            </div> 
                            </form>
                            <?php
                               }    
                            ?>
                        </div>
                    </div>
                </div>
            
        </section>
        <section class=" home2 cvs-containers " style="width: 94%;margin-left: 94px;">
            <div class="cv-editor">
                <!-- start of boxes -->
                <div class="info">
                    <div class="showen-box">
                        <span class="title">Information personnelles</span>
                        <button class="open-key">show</button>
                    </div>
                    <div class="hidden-box">
                        <div class="info-hidden-box">
                            <div class="up-box">
                                <div class="up-box-left">
                                    <img src="assets/img/noPhoto.png" alt=""  width="30%" height="30%"class="preview1" >
                                    <input type="file" name="" id="" onchange="previewImage(event, 'preview1')">

                                </div>
                                <div class="up-box-right">
                                    <label for="prenom">prenom</label><input type="text" name="prenom" id="" class="inpt-prenom">
                                    <label for="nom">nom</label><input type="text" name="nom" id="" class="inpt-nom">
                                    <label for="addr-email">Adresse e-mail</label><input type="text" name="addr-email" id="">
                                </div>
                            </div>
                            <div class="down-box">
                                <label for="title-profile">Titre du profil</label><input type="text" name="title-profile" id="" class="title-profile">
                                <label for="num-tel">Numero telephoe</label><input type="text" class="num-tel" name="num-tel" id="">
                                <label for="addr">addresse</label><input type="text" class="addr" name="addr" id="">
                                <label for="code-postal">Code postal</label><input type="text" name="code-postal" id="">
                                <label for="ville">ville</label><input type="text" name="ville" id="" class="ville">
                                <label for="linkedin">linkedin</label><input type="text" name="linkedin" class="linkedin" id="">
                            </div>
                            <button class="send-description btn-send-infos" >Send</button>
                        </div>
                        
                    </div>
                </div>
                <div class="profil">
                    <div class="showen-box">
                        <span class="title">Profile</span>
                        <button class="open-key">show</button>
                    </div>
                    <div class="hidden-box">
                        <div class="hide-box-profile">
                            <label for="description-profile">Description</label>
                            <textarea class="description-profile" name="description-profile" id="" cols="20" rows="10"></textarea>
                            <button class="send-description" onclick="addProfile()">send</button>
                        </div>
                        
                    </div>
                </div>
                <div class="exp-pro">
                    <div class="showen-box">
                        <span class="title">Experience professionlle</span>
                        <button class="open-key">show</button>
                    </div>
                    <div class="hidden-box">
                        <!-- container for the saved experiences -->
                        <div id="saved-experiences-container"></div>
                        <!-- container for the experiences -->
                        <div id="experiences-container" ></div>
                        <button onclick="addExperience()" class="send-description">Add diplome</button>
                    </div>
                    
                </div>
                
                <div class="competenece">
                    <div class="showen-box">
                        <span class="title">Skills</span>
                        <button class="open-key">show</button>
                    </div>
                    <div class="hidden-box">
                        <div class="container-l-i"> 
                            <select class="form-control select-input focused list-skills" multiple width="15%">
                                <!-- <option selected disabled>Choose Option </option> -->
                                <option value="css">CSS</option>
                                <option value="html">HTML</option>
                                <option value="js">JS</option>
                                <option value="analyse financiere">Analyse financiere</option>
                                <option value="java">Java</option>
                                <option value="gestion de projet">Gestion de projet</option>
                            </select>
                            <button class="btn btn-primary" onclick="addCompetence()">Save</button>
                        </div>
                    </div>
                </div>
                <div class="langue">
                    <div class="showen-box">
                        <span class="title">Langue</span>
                        <button class="open-key">show</button>
                    </div>
                    <div class="hidden-box">
                        <div class="container-l-i"> 
                             <select class="form-control select-input focused list-langue " multiple width="15%">
                                <!-- <option selected disabled>Choose Option </option> -->
                                <option value="English">English</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Arabic">Arabic</option>
                                <option value="French">French</option>
                            </select>
                            <button class="btn btn-primary" onclick="addLangue()">Save</button>     
                        </div> 
                    </div>
                </div>
                <div class="formation">
                    <div class="showen-box">
                        <span class="title">Diplome</span>
                        <button class="open-key">show</button>
                    </div>
                    <div class="hidden-box">
                        <select class="form-select list-diplome">
                            <option selected disabled>Choose Option</option>
                            <option value="BIS">Business Information System </option>
                            <option value="BI">Business Inteligence</option>
                            <option value="accounting">Accounting</option>
                            <option value="digital marketing">Digital Marketing</option>
                            <option value="security information system">Security Information System</option>
                        </select>
                        <button onclick="addFormation()" class="send-description">Add experience</button>
                    </div>
                </div>
                <div class="stages">
                    <div class="showen-box">
                        <span class="title">Stages</span>
                        <button class="open-key">show</button>
                    </div>
                    <div class="hidden-box">
                        <!-- container for the saved experiences -->
                        <div id="saved-stage-container"></div>
                        <!-- container for the experiences -->
                        <div id="stage-container"></div>
                        <button onclick="addStages()" class="send-description">Add Stage</button>
                    </div>
                </div>
                <div class="certificats">
                    <div class="showen-box">
                        <span class="title">Université</span>
                        <button class="open-key">show</button>
                    </div>
                    <div class="hidden-box">
                        <select class="form-select list-universite" >
                            <option selected disabled>Choose Option</option>
                            <option value="isg tunis">ISG Tunis </option>
                            <option value="iset nabeul">ISET NABEUL</option>
                            <option value="esen">ESEN</option>
                            <option value="ihec">Ihec Carthage</option>
                            <option value="iscae">ISCAE</option>
                            <option value="insat">INSAT </option>
                            <option value="FST">FST</option>
                            <option value="ENSI">ENSI</option>
                        </select>
                        <button onclick="addCertificat()" class="send-description">Add Université</button>
                    </div>
                </div>
                <div class="centre-interet">
                    <div class="showen-box">
                        <span class="title">Centre d'interet</span>
                        <button class="open-key">show</button>
                    </div>
                    <div class="hidden-box">
                        <div class="container-l-p"> 
                            <label>Interet</label>
                            <input type="text" class="inpt-interet"/>
                            <button class="btn-add" onclick="addInteret()">add</button>
                        </div> 
                    </div>
                </div>
    
                
    
    
            </div><!-- END CV EDITOR -->
    
            <!-- CV VIEW  -->
            <div class="cv-view " style="background: var(--bs-link-hover-color);">
                <div class="result-frame" id="result-frame">
                    <!-- container image and info personnelles -->
                    <div class="conatiner-image-info">
                        <!-- img -->
                        <img src="assets/img/noPhoto.png" height="175" class="preview2" alt="" width="130px">
                        <!-- img -->
                        <div class="info" style="height: 172.2px;">
                            <!-- full name and jb --> <!-- edit here -->
                            <p class="full-name text-capitalize" style="margin-left: 17px;font-size: 31px;margin-top: 32px;"></p>
                            <p class="title-profile-value text-capitalize" style="margin-left: 17px;font-size: 25px;font-family: 'Albert Sans', sans-serif;margin-top: -15px;color: var(--bs-orange);"></p>
                            <!-- informations -->
                            <img src="assets/img/email (1).png " alt="" width="21" style="margin-left: 23px;margin-right: 11px;" height="17">
                            <label class="addr-view form-label " for="" style="margin-right: 17px;"></label>
                            <img src="assets/img/appel-telephonique (1).png" alt="" width="20px" style="margin-right: 11px;">
                            <label class=" form-label num-tel-show" for="" style="margin-right: 15px;"></label>
                            <img src="assets/img/emplacements.png" width="20px" style="margin-right: 11px;">
                            <label class="form-label ville-view" for=""></label>
                        </div>
                    </div>
                    <div class="rest-of-infos">
                        <div class="left-column"  style="background: var(--bs-gray-100);font-size: 18px;">
                            <div class="profile-box">
                                <div class="profile-cv-view">
                                    <p class="profile-title">
                                        Profile
                                    </p>
                                    <!-- every event will change the content of this p -->
                                    <p class="profile-description">
                                        
                                    </p>
                                </div>
                            </div>
                            <div class="experience-box">
                                <p class="experience-title">Experience</p>
                                
                                
                                
                            </div>
                            <div class="stage-box">
                                <p class="stage-title">Stage</p>
                                <div class="stage-cv-view">
                                    <!-- every event will add -->
                                    
                                </div>
                            </div>
                            <div class="formation-box">
                                <p class="formation-title">Diplome</p>
                                <p class="diplome-line">My degree is :  <span class="put-diplome"></span></p>
                            </div>
                           
                            <div class="certificat-box">
                                <p class="certificat-title">Université</p>
                                <p class="universite-line">My degree is :  <span class="put-universite"></span></p>
                            </div>
                        </div>
    
                        <div class="right-column">
                            <!-- Info personnel -->
                            <div class="info-perso-cv-view">
                                <p class="infos-perso-title">informations personnelles</p>
                                <div class="container-single-info-cv-view">
                                    <p class="infos-perso-name">Linkedin  :<span class="linkedin-account-name">test</span></p>
                                </div>
                            </div>
                            <!-- Skills -->
                            <div class="competence-box">
                                <label for="" class="langue-title">Skills :</label>
                                <ul class="list-group list-group-flush list-skills-show " >
                                   
                                  </ul>
                            </div>
                            <!-- Langue -->
                            <div class="langue-box">
                                <label for="" class="langue-title">Langue :</label>
                                <ul class="list-group list-group-flush list-langue-show"  >
                                   
                                  </ul>
                            </div>
                            <div class="interet-box">

                            </div>
                        </div>                    
                    </div>
                </div>
                <div style="margin-top: 8px;position: fixed;right: 1%;">
                    <button class="btn btn-warning downloadPDF"  type="button" >Download</button>
                </div >
            </div>
        </section>
        
        <script src="assets/js/cv.js"></script>
        <script src="assets/js/dashDem.js"></script>
    </body>
</html>
<?php
}else {
    header("location: index.php");
}


?>