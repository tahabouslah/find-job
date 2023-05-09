<?php 
session_start();

require_once 'includes/dbh.inc.php';

$p = $_SESSION["pseudo"] ;

$sql = "SELECT * FROM `candidature` WHERE code_offre_emploi = '".$_SESSION["id"]."';";
$res = mysqli_query($conn,$sql);

$info = array();

while($r = mysqli_fetch_assoc($res)){
    $info[] = $r;
}

$can = array();
foreach($info as $col) {
    $can[] = array(
        'pseudo' => $col["pseudo"]
    );
}

if(isset($_SESSION["pseudo"])) {
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

        <title>Dashboard Offerer</title>
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
        <link rel="stylesheet" href="assets/css/DashOff.css" />

        <!----===== Boxicons CSS ===== -->
        <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />

        <title>Dashboard Sidebar Menu</title>
    </head>
    <body>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="assets/img/logo.png" alt="" />
                    </span>

                    <div class="text logo-text">
                        <span class="name">Find Job</span>
                        
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
                        <li class="nav-link btn-side" id="btn-side-1">
                            <a href="DashOffer.php" class="btn-home">
                                <i class="bx bx-home-alt icon "></i>
                                <span class="text nav-text">Add Job</span>
                            </a>
                        </li>

                        <li class="nav-link btn-side" id="btn-side-2">
                            <a href="#">
                                <i class="bx bx-bar-chart-alt-2 icon "></i>
                                <span class="text nav-text">All Jobs</span>
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


        <section class="home active" id="home3">
            <div class="main">
                <!-- INDENDITY WEBSITE -->
                <div class="identity-website">
                    <img src="assets/img/logo-web-png.png" width="158" height="50">
                </div>
                        <!-- BLUE BLOC ESTHETIC ONE -->
                        <div class="bloc-esthetic-one-sing-offer">
                            <!-- BLUE BLOC ESTHETIC TWO -->
                            <div class="bloc-esthetic-two-sing-offer">
                                <!-- INFOs OFFER -->
                                <div class="offer-infos">
                                    <p class="title-offer"><?php echo $_SESSION["titre"] ?></p>
                                    <div class="single-infos-offer">
                                        <!-- CODE OFFER -->
                                        <div class="bloc-code">
                                            <p class="lblCode text-start">code :</p>
                                            <p class="valueCode text-start"><?php echo $_SESSION["id"]; ?></p>
                                        </div>
                                        <!-- Yrs of experience -->
                                        <div class="bloc-info">
                                            <p class="lblYrs ">Years of Experience&nbsp;</p>
                                            <p class="valueYrs "><?php echo $_SESSION["nbx"]." Years"; ?>&nbsp;</p>
                                        </div>
                                        <!-- DOMAIN -->
                                        
                                        <?php 
                                            $query = "select libelle_diplome from diplome where diplome.code_diplome = '".$_SESSION["code_dip"]."';"; 
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
                                            $dip = "";
                                            foreach($d as $col)
                                            {
                                                $dip = $col["libelle_diplome"];
                                            }
                                            $_SESSION["dip"] = $dip;
                                            ?>
                                        <div class="bloc-info">
                                            <p class="lblDiplom" >diplome</p>
                                            <p class="valueDiplom" ><?php echo $_SESSION["dip"]; ?>&nbsp;</p>
                                        </div>
                                        <!-- SALARY -->
                                        <div class="bloc-info">
                                            <p class="lblSalary">Salire&nbsp;</p>
                                            <p class="valueSalary"><?php echo $_SESSION["sala"]." K";  ?></p>
                                        </div>
                                        <!-- DESCRIPTION  -->
                                        <div  class="bloc-description">
                                            <p class="lblDescription">Description :</p>
                                            <p class="valueDescription"><br><?php echo $_SESSION["dess"] ?><br></p>
                                        </div>
                                    </div>
                                </div>
                                <p class="lblCandidat">Candidats</p>
                                <!-- CONTAINER OF ALL OFFERS  -->
                                <div class="container-candidats">
                                    <!-- HEAD OF TABLE -->
                                    <div class="head-table">
                                        <p class="picture">Picture</p>
                                        <p class="lblFullName" >Full name&nbsp;</p>
                                        <p class="post"><strong>Post</strong><br></p>
                                        <p class="resume" >Resume</p>
                                        <p class="lblAccept" >Accept</p>
                                        <p class="lblReject">Reject</p>
                                    </div>
                                    <!-- LOAD CANDIDATS -->
                                    <div class="load-candidats">
                                        <!-- single-candidat -->
                                        <?php
                                    $name = "";
                                    foreach($can as $col){ 
                                        $titre =$col["pseudo"];
                                       
                                    $query1 = "select firstName, lastName from demandeur where pseudo = '".$titre."';"; 
                                    $ress1 = mysqli_query($conn,$query1);
                        
                                    $dip1 = array();
                                        
                                    while($r = mysqli_fetch_assoc($ress1)){
                                        $dip1[] = $r;
                                    } 
                        
                                    $fullName = array();
                                    foreach($dip1 as $col) {
                                            $fullName[] = array(
                                            'fullName' => $col["firstName"]." ".$col["lastName"]
                                        );
                                    }  
                                    $query2 = "select * from demandeur_cv where pseudo = '".$titre."';"; 
                                    $ress2 = mysqli_query($conn,$query2);
                        
                                    $dip2 = array();
                                        
                                    while($r = mysqli_fetch_assoc($ress2)){
                                        $dip2[] = $r;
                                    } 
                        
                                    $demand = array();
                                    foreach($demand as $col) {
                                            $demand[] = array(
                                            'photo' => $col["photo"]
                                        );
                                    }
                                    
                                    $photo = "";
                                    foreach($demand as $col) {
                                     $photo = $col["photo"];
                                }
                                    
                                ?>
                                        <form action="includes/acceptReject.inc.php" method="post">
                                        <div class="single-candidat">
                                            <!-- IMAGE OF candidat -->
                                            <picture>
                                                <?php echo "<img class='rounded-circle' src='data:image/jpeg;base64,". base64_encode($photo)."'    width='50' height='45'/>" ?> 
                                            </picture>
                                            <!-- FULL NAME -->
                                            <p class="fullName"><?php foreach($fullName as $fn){echo $fn["fullName"];} ?></p>
                                            <?php echo '<input type="hidden" name="test" value="'.$titre.'" >';?>
                                            <!-- POST -->
                                            <p class="post">Developer</p>
                                            <!-- LINK TO GET RESUME -->
                                            <a class="linkResume"href="#">Get Resume</a>
                                            <!-- BUTTON ACCEPT  -->
                                            <?php 
                                            

                                            $sql = "SELECT * FROM candidature where pseudo = '".$titre."' and  code_offre_emploi = '".$_SESSION["id"]."'";
                                            $result = mysqli_query($conn, $sql);
                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    if($row["etat_candidature"] === "1"){
                                                   echo '<button class="btn-accept btn btn-success" style="width: 89.5px;height: 29px;font-size: 13px;margin-right: -2px; cursor: none" type="button" >Accepted</button>';
                                                }elseif($row["etat_candidature"]  === "2"){
                                                   echo '<button class="btn-reject  btn btn-danger" style="width: 89.5px;height: 29px;font-size: 13px;margin-right: -2px; cursor: none" type="button" >Rejected</button>';
                                                }elseif($row["etat_candidature"] ==="0"){
                                                    echo '<button class="btn-accept btn btn-success" type="submit" name="ops" value="1" >Accept</button>';
                                                    echo '<button class="btn-reject btn btn-danger" type="submit" name="ops" value="2">Reject</button>';
                                                }
                                                }
                                            } 
                                             ?>            
                                        </div>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>




                                <p class="lblCandidat">Proposed Candidats</p>
                                <!-- CONTAINER OF ALL OFFERS  -->
                                <div class="container-candidats">
                                    <!-- HEAD OF TABLE -->
                                    <div class="head-table">
                                        <p class="picture">Picture</p>
                                        <p class="lblFullName" >Full name&nbsp;</p>
                                        <p class="post"><strong>Post</strong><br></p>
                                        <p class="resume" >Resume</p>
                                    </div>
                                    <!-- LOAD CANDIDATS -->
                                    <div class="load-candidats">
                                        <!-- single-candidat -->
                                        <?php 
                                            //////demandeur

                                                $q = "SELECT * FROM `demandeur_cv`";
                                                $resultt = mysqli_query($conn,$q);

                                                $info0 = array();

                                                while($r = mysqli_fetch_assoc($resultt)){
                                                    $info0[] = $r;
                                                }

                                                $dem= array();
                                                foreach($info0 as $col) {
                                                    $dem[] = array(
                                                        'pseudo' => $col["pseudo"],
                                                        'photo' => $col["photo"],
                                                        'location' => $col["location"],
                                                        'poste' => $col["poste"],
                                                        'experience' => $col["experience"],
                                                        'score' => 0
                                                    );
                                                }


                                                ///// diplome
                                                $sql = "SELECT * FROM `diplome_demandeur` where pseudo = '$p'";
                                                $res = mysqli_query($conn,$sql);

                                                $info = array();

                                                while($r = mysqli_fetch_assoc($res)){
                                                    $info[] = $r;
                                                }

                                                $dip_dem = array();
                                                foreach($info as $col) {
                                                    $dip_dem[] = array(
                                                        'pseudo' => $col["pseudo"],
                                                        'code_diplome' => $col["code_diplome"]
                                                    );
                                                }

                                                ////// comp

                                                $sql1 = "SELECT * FROM `competence_demandeur` where pseudo = '$p'";
                                                $res1 = mysqli_query($conn,$sql1);

                                                $info1 = array();

                                                while($r = mysqli_fetch_assoc($res1)){
                                                    $info1[] = $r;
                                                }

                                                $comp_dem = array();
                                                foreach($info1 as $col) {
                                                    $comp_dem[] = array(
                                                        'pseudo' => $col["pseudo"],
                                                        'code_competence' => $col["code_competence"]
                                                    );
                                                }

                                                //////offre

                                                $sql2 = "SELECT * FROM `offre_emploi` where code_offre_emploi = '".$_SESSION["id"]."'";
                                                $res2 = mysqli_query($conn,$sql2);

                                                $info2 = array();

                                                while($r = mysqli_fetch_assoc($res2)){
                                                    $info2[] = $r;
                                                }

                                                $offres = array();
                                                foreach($info2 as $col) {
                                                    $offres[] = array(
                                                        'code_offre_emploi' => $col["code_offre_emploi"],
                                                        'titre' => $col["titre"],
                                                        'descriptions' => $col["descriptions"],
                                                        'code_diplome' => $col["code_diplome"],
                                                        'nombre_annees _experience' => $col["nombre_annees _experience"],
                                                        'salaire_propose' => $col["salaire_propose"],
                                                        'pseudo'=> $col["pseudo"],
                                                        
                                                    );
                                                }

                                                ////// comp offres
                                                $sql3 = "SELECT * FROM `offre_competence` where code_offre_emploi = '".$_SESSION["id"]."'";
                                                $res3 = mysqli_query($conn,$sql3);

                                                $info3 = array();

                                                while($r = mysqli_fetch_assoc($res3)){
                                                    $info3[] = $r;
                                                }

                                                $offres_comp = array();
                                                foreach($info3 as $col) {
                                                    $offres_comp[] = array(
                                                        'code_offre_emploi' => $col["code_offre_emploi"],
                                                        'code_competence' => $col["code_competence"]
                                                    );
                                                }

                                                /////////// calculate score offres

                                                foreach($dem as &$d) {
                                                   $score = 0;
                                                   foreach($comp_dem as $cd){
                                                        if($cd["pseudo"] === $d["pseudo"]){
                                                            foreach($offres_comp as $oc){
                                                                if($cd["code_competence"] === $d["code_competence"]){
                                                                    $score = $score + 5;
                                                                    $d["score"] = $score;
                                                                }
                                                            }
                                                        }
                                                   }
                                                   
                                                   foreach($offres as $a){
                                                    if($d["experience"] >= $a["nombre_annees _experience"]){
                                                        $score = $score +  2 * $d["experience"];
                                                        $d["score"] = $score;
                                                    }
                                                   }

                                                

                                                   foreach ($dip_dem as $diplome_item) { 
                                                    $found_match = false;
                                                    foreach ($offres as $offre) {
                                                        if($diplome_item["pseudo"] === $d["pseudo"]){
                                                            if ($offre['code_diplome'] == $diplome_item['code_diplome']) {
                                                                $d['score'] = $score; // increment score if match found
                                                                $found_match = true;
                                                            } 
                                                        }
                                                    }
                                                    if (!$found_match) {
                                                        $d['score'] = 0; // set score to 0 if no match found
                                                    }
                                                }

                                                

                                                }


                                                
                                            // $sql = "SELECT * FROM `demandeur`";
                                            // $res = mysqli_query($conn,$sql);
                                            
                                            // $info = array();
                                            
                                            // while($r = mysqli_fetch_assoc($res)){
                                            //     $info[] = $r;
                                            // }
                                            
                                            // $dema = array();
                                            // foreach($info as $col) {
                                            //     $dema[] = array(
                                            //         'pseudo' => $col["pseudo"]
                                            //     );
                                            // }

                                            $deman = array();
                                            foreach($dem as $r){
                                               if($r["score"] != 0){
                                                $deman[] = $r;
                                               }
                                            }

                                            
                                            function compareByScore($a, $b) {
                                                return $b['score'] - $a['score'];
                                            }
                                            
                                            // Sort the array using the custom comparison function
                                            usort($deman, 'compareByScore');
                                            $n = "";
                                            $post = "";
                                            $ph = "";
                                            foreach($deman as $c)
                                            {
                                                $n = $c["pseudo"];
                                                $post = $c["poste"];
                                                $ph = $c["photo"];
                                            
                                        ?>
                                        <div class="single-candidat">
                                            <!-- IMAGE OF candidat -->
                                            <picture>
                                            <?php echo "<img class='rounded-circle' src='data:image/jpeg;base64,". base64_encode($ph)."'    width='50' height='45'/>" ?> 
                                            </picture>
                                            <!-- FULL NAME -->
                                            <p class="fullName"><?php  echo $n?></p>
                                            <!-- POST -->
                                            <p class="post"><?php echo $post;  ?></p>
                                            <!-- LINK TO GET RESUME -->
                                            <a class="linkResume"href="#">Get Resume</a>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
        <script src="assets/js/dashOffer.js"></script>
    </body>
</html>
<?php
}else {
    header("location: index.php");
}

?>

