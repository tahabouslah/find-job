<?php
session_start();

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

$p = $_SESSION["pseudo"];

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
        'code_competence' => $col["code_competence"]
    );
}

//////offre

$sql2 = "SELECT * FROM `offre_emploi`";
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
        'score' => 0
    );
}

////// comp offres
$sql3 = "SELECT * FROM `offre_competence`";
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

foreach($offres as &$row) {
    $score = 0;
    $sal = $row["salaire_propose"] / 100;
    $score = $score + $sal;
    $row["score"] =  $score;
    foreach($offres_comp as $comp){
        if($comp["code_offre_emploi"] === $row["code_offre_emploi"]){
            foreach($comp_dem as $d){
                if($d["code_competence"] == $comp["code_competence"]){
                    $score += 5;
                    $row["score"] = $score;
                }
            }
        }
    }


foreach ($offres as &$offre) { // use a reference to update the $offres array
    $found_match = false;
    foreach ($dip_dem as $diplome_item) {
        if ($offre['code_diplome'] == $diplome_item['code_diplome']) {
            $row['score'] = $score; // increment score if match found
            $found_match = true;
        }
    }
    if (!$found_match) {
        $offre['score'] = 0; // set score to 0 if no match found
    }
}


}


if(isset($_SESSION["pseudo"])) {
?>
<!DOCTYPE html>
<html lang="en" style="border-radius: 12px;margin-left: -14px;margin-right: 36px;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>find-job-full</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Andika&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Narrow&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spline+Sans+Mono&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-sidebar.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/find-job.css">
</head>

<body>
    <!-- NAV BAR  -->
    <nav class="navbar navbar-expand-md nav-home">
        <div class="container">
            <!-- LOGO OF WEB SITE -->
            <a href="index.php"><img class="home-logo" src="assets/img/logo-web-png.png" width="222" height="67"></a>
            <!-- LINKS BLOC -->
            <div class="nav-container-list" >
                <!-- DROPDOWN LOGIN INFOS -->
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" >
                        <img class="img-profile" src="assets/img/icons8-utilisateur-64.png" width="37" height="35">
                        My account
                    </button>
                    <!-- Hidden LIST OF DROPDOWN -->
                    <ul class="dropdown-menu dropdown-menu-dark">
                       <?php 
                            echo ' <li><a class="dropdown-item active" href="#">'.$_SESSION["pseudo"].'</a</li>';
                            if(isset($_SESSION["role"])) {
                                if($_SESSION["role"] === "seeker"){
                                    echo' <li><a class="dropdown-item" href="dashDem.php">Dash </a></li>';
                                }else {
                                    echo'<li><a class="dropdown-item" href="DashOffer.php">Dash </a></li>';
                                }
                              }
                        ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="includes/logout.inc.php">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

<!-- search barre  with filter  -->
<div class="horizontal-class">
    <div class="horizontal-filter">
        <i class="fas fa-search"></i>
        <input class="form-control inptKeyWord" type="text" placeholder="Job title or keyword" />
        <hr/>
        <i class="icon-location-pin" ></i>
        <input class="form-control inptAdresse" type="text" placeholder="New York, USA"  />
        <hr/>
        <i class="icon-social-steam "></i>
        <input class="form-control inptTypeJob" type="text" placeholder="Type Job" />
        <hr/>
        <svg class="icon icon-tabler icon-tabler-adjustments-alt" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <rect x="4" y="8" width="4" height="4"></rect>
            <line x1="6" y1="4" x2="6" y2="8"></line>
            <line x1="6" y1="12" x2="6" y2="20"></line>
            <rect x="10" y="14" width="4" height="4"></rect>
            <line x1="12" y1="4" x2="12" y2="14"></line>
            <line x1="12" y1="18" x2="12" y2="20"></line>
            <rect x="16" y="5" width="4" height="4"></rect>
            <line x1="18" y1="4" x2="18" y2="5"></line>
            <line x1="18" y1="9" x2="18" y2="20"></line>
        </svg>
        <input class="form-control inptRangeSalary" type="text" placeholder="Range Salary" />
        <button class="btn btn-primary findJob" type="button" >Find Job</button>
    </div>
</div>

<!-- CONTAINER OF TWO COLUMN-->
<div class="container-offers">
    <!-- ONE ROW OF ALL -->
    <div class="row row-of-all">
        <!-- VERTICAL FILTER -- RIGHT COLUMN -->
        <div class="vertical-filter">
            <div class="alert-job">
                <p class="alert-job-title">Create Job Alert</p>
                <p class="alert-job-title-description">Create a job alert now and never miss a job.</p>
                <input class="form-control alter-job-email" type="email" placeholder="Enter your email"/>
                <button class="btn btn-primary alter-job-btn" type="button">Remember Me !</button>
            </div>
            <!-- TYPE OF EMPLOYEMENT -->
            <div class="type-of-employement">
                <p class="type-of-employement-title" >Type Of Employment</p>
                <div class="type-of-employement-checks">
                    <div class="form-check">
                        <input id="formCheck-1" class="form-check-input" type="checkbox"  />
                        <label class="form-check-label" for="formCheck-1" >Full Time Job</label>
                    </div>
                    <div class="form-check" >
                        <input id="formCheck-3" class="form-check-input" type="checkbox"  />
                        <label class="form-check-label" for="formCheck-3" >Part Time Jobs</label>
                    </div>
                    <div class="form-check"   >
                        <input id="formCheck-2" class="form-check-input" type="checkbox"  />
                        <label class="form-check-label" for="formCheck-2" >Contract</label>
                    </div>
                </div>
            </div>

            <!-- CATEGORY -->
            <div class="category">
                <p class="category-title">Category</p>
                <div class="category-checkes">
                    <div class="form-check">
                        <input id="formCheck-4" class="form-check-input" type="checkbox"/>
                        <label class="form-check-label" for="formCheck-4" >Graphic Designer</label>
                    </div>
                    <div class="form-check">
                        <input id="formCheck-5" class="form-check-input" type="checkbox" />
                        <label class="form-check-label" for="formCheck-5" >Front-end developer</label>
                    </div>
                    <div class="form-check">
                        <input id="formCheck-6" class="form-check-input" type="checkbox" />
                        <label class="form-check-label" for="formCheck-6" >Marketing</label>
                    </div>
                </div>
            </div>

            <!-- Seniority Level -->
            <div class="seniority-level">
                <p  class="seniority-level-title">Seniority Level</p>
                <div class="seniority-level-title-checkes">
                        <div class="form-check" >
                            <input id="formCheck-4" class="form-check-input" type="checkbox" />
                            <label class="form-check-label" for="formCheck-4" >Student Level</label>
                        </div>
                        <div class="form-check" >
                            <input id="formCheck-5" class="form-check-input" type="checkbox"   />
                            <label class="form-check-label" for="formCheck-5" >Junior Level</label>
                        </div>
                        <div class="form-check">
                            <input id="formCheck-6" class="form-check-input" type="checkbox"   />
                            <label class="form-check-label" for="formCheck-6" >Senior Level</label>
                        </div>
                </div>
            </div>

            <!-- Salary Range -->
            <div class="salary-range">        
                <p class="salary-range-title">Salary Range</p>
                <div class="salary-range-checks">
                        <div class="form-check" >
                            <input id="formCheck-7" class="form-check-input" type="checkbox" />
                            <label class="form-label form-check-label" for="formCheck-7" >$ 700 - $ 1000</label>
                        </div>
                        <div class="form-check" >
                            <input id="formCheck-8" class="form-check-input" type="checkbox" />
                            <label class="form-label form-check-label" for="formCheck-8" >$ 1000 - $ 1200<br /></label>
                        </div>
                        <div class="form-check" >
                            <input id="formCheck-9" class="form-check-input" type="checkbox" />
                            <label class="form-label form-check-label" for="formCheck-9" >$ 1200 - $ 1400</label>
                        </div>
                        <div class="form-check" >
                            <input id="formCheck-11" class="form-check-input" type="checkbox"/>
                            <label class="form-label form-check-label" for="formCheck-9" >$ 1500 - $ 1800</label>
                        </div>
                        <div class="form-check" >
                            <input id="formCheck-10" class="form-check-input" type="checkbox"/>
                            <label class="form-label form-check-label" for="formCheck-9" >$ 2000 - $ 3000</label>
                        </div>
                </div>
            </div>
        </div>
        <div class="container-offers-small">
        <?php
            $i = 0;
            $titre = "";
            $desc = "";
            $sal = "";
            $nbex = "";
            $code = "";
            $code_off = "";
            $off = array();
                foreach($offres as $r){
                   if($r["score"] != 0){
                    $off[] = $r;
                   }
                }

                function compareByAge($a, $b) {
                    return $b['score'] - $a['score'];
                }
                
                // Sort the array using the custom comparison function
                usort($off, 'compareByAge');

                foreach($off as $col){ 
                   $titre = $col["titre"]; 
                   $sal = $col["salaire_propose"];
                   $desc = $col["descriptions"];
                   $nbex = $col["nombre_annees _experience"];
                   $code = $col["code_diplome"];
                   $code_off = $col["code_offre_emploi"];
                  
                 
                $query = "select libelle_diplome from diplome where diplome.code_diplome = '".$code."';"; 
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
        <!-- BLOC OFFERS  -- RIGHT COLUMN -->
        <form  action="includes/apply.inc.php" method="post">
            <!-- SINGLE-OFFER -->
            <div class="single-offer">
                <!-- BLOC LOGOS -->
                <div class="logos"  >
                    <!-- LOGO OF COMPANY -->
                    <img class="logo-company" height="31" src="assets/img/google.png" />
                    <!-- LOGO OF SAVE -->
                    <img class="logo-save"  width="23" height="22" src="assets/img/save-instagram.png" />
                </div>
                <!-- OFFRE INFOS-->
                <div class="offre-infos">
                    <h2 class="offre-infos-title"><?php echo $titre ?>  </h2>
                    <p class="offre-infos-description"><?php echo $desc ?></p>
                    <?php 
                    echo '<input type="hidden" name="code" value="'.$code_off.'">'; ?>
                </div>
                <!-- OFFRE TAGS -->
                <div class="offre-tags">
                    <p class="offre-tags-typeWork" ><?php echo $sal." K" ?></p>
                    <p class="offre-tags-category"><?php  foreach($d as $col){echo $col["libelle_diplome"];}  ?></p>
                    <p class="offre-tags-seniority-level" ><?php echo $nbex." Years" ?></p>
                </div>
                <div class="navigation-btns">
                    <?php 
                        $ps = $_SESSION["pseudo"];
                        $sql = "SELECT * FROM candidature where pseudo = '".$ps."'";
                        $result = mysqli_query($conn, $sql);
                        $applied = false;
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($row['code_offre_emploi'] === $code_off){
                                     $applied   = true;
                                }
                            }
                         $sql2 = "SELECT * FROM savedjobs where pseudo = '".$ps."'";
                         $result2 = mysqli_query($conn, $sql2);
                            $applied2 = false;
                        if ($result2) {
                            while ($row = mysqli_fetch_assoc($result2)) {
                                if($row['code_offre_emploi'] === $code_off){
                                     $applied2 = true;
                                }
                            }
                        }      
                        if($applied === false){
                            echo '<button class="btn btn-primary navigation-btn"  type="submit" value="apply" name="app">Apply Now</button>';
                        }else {
                            echo '<button class="btn btn-primary navigation-btn" style="background-color:red; border:none; cursor:none" type="button" name="app">Applied</button>';
                        }
                        if($applied2 === false){
                            echo '<button class="btn btn-primary navigation-btn"  type="submit" value="save" name="app">Save</button>';
                        }else {
                            echo '<button class="btn btn-primary navigation-btn" style="background-color:red; border:none; cursor:none" type="button" name="app">Saved</button>';
                        }
                    }
                    ?>
                    <!-- <button class="btn btn-primary navigation-btn"  type="submit" name="app">Apply Now</button> -->
                </div>
            </div>
        </form>
        <?php
                }
            ?>
            </div>
    </div>
</div>
<!-- FOOTER -->
<footer>
    <div class="content">
        <div class="top">
            <div class="logo-details">
                <i class="fab fa-slack"></i>
                <span class="logo_name">Search Job</span>
            </div>
            <div class="media-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
    </div>
    <div class="link-boxes">
        <ul class="box">
            <li class="link_name">Company</li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Get started</a></li>
        </ul>
        <ul class="box">
            <li class="link_name">Services</li>
            <li><a href="#">App design</a></li>
            <li><a href="#">Web design</a></li>
            <li><a href="#">Logo design</a></li>
            <li><a href="#">Banner design</a></li>
        </ul>
        <ul class="box">
            <li class="link_name">Account</li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">My account</a></li>
            <li><a href="#">Prefrences</a></li>
            <li><a href="#">Purchase</a></li>
        </ul>
        <ul class="box">
            <li class="link_name">Courses</li>
            <li><a href="#">HTML & CSS</a></li>
            <li><a href="#">JavaScript</a></li>
            <li><a href="#">Photography</a></li>
            <li><a href="#">Photoshop</a></li>
        </ul>
        <ul class="box input-box">
            <li class="link_name">Subscribe</li>
            <li><input type="text" placeholder="Enter your email"></li>
            <li><input type="button" value="Subscribe"></li>
        </ul>
        </div>
    </div>
    <div class="bottom-details">
        <div class="bottom_text">
            <span class="copyright_text">Copyright &#169; 2023 <a href="#">Search Job.</a>All rights reserved</span>
            <span class="policy_terms">
                <a href="#">Privacy policy</a>
                <a href="#">Terms & condition</a>
            </span>
        </div>
    </div>
</footer>
    <a href="#" style="height: 173px;"> </a>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>
<?php
}else {
    header("location: index.php");
}

?>