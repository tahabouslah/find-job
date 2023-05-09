<?php 
session_start();

require_once 'includes/dbh.inc.php';

$p = $_SESSION["pseudo"] ;

$sql = "SELECT code_offre_emploi ,titre FROM offre_emploi where pseudo = '".$p."'";
$result = mysqli_query($conn, $sql);


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
        <style>
            a{
                text-decoration: none;
                color: white;
            }
        </style>
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
                            <a href="#" class="btn-home">
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

        
        <section class="home active" id="home1"style="position: absolute;padding:11%;padding-top: 1%;">
            <h1>Ajouter un offre d'emploi</h1>
            <form onsubmit="validateForm()" action="includes/ajoutoffre.inc.php" method="post">
              <div class="form-group">
                <label for="titre">Titre de l'offre</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
              </div>
              <div class="form-group">
                <label for="description">Description de l'offre</label>
                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
              </div>
              <div class="form-group">
                <label for="experience">Nombre d'années d'expérience requises</label>
                <input type="number" class="form-control" id="experience" name="nbex" required>
              </div>
              <div class="form-group">
                <label for="salaire">Salaire proposé</label>
                <input type="number" class="form-control" id="salaire" name="salaire" required>
              </div>
              <div class="form-group">
                <label for="diplome">Type de diplome</label>
                <select class="form-control" id="contrat" name="diplome" required>
                  <option value="">-- Sélectionnez un diplome --</option>
                  <option value="1">Business Information System</option>
                  <option value="2">Business Intelligence</option>
                  <option value="3">Marketing</option>
                  <option value="4">comptabilité et de gestion</option>
                </select>
              </div>
              <div class="form-group" >
                <label for="diplome" style="margin-top: 1%;">Type de skills</label>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="skills[]" value="2" id="css">
                  <label class="form-check-label" for="css">CSS</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="skills[]" value="1" id="html">
                  <label class="form-check-label" for="html">HTML</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="skills[]" value="5" id="analyse financiere">
                  <label class="form-check-label" for="analyse financiere">Analyse financière</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="skills[]" value="3" id="java">
                  <label class="form-check-label" for="java">Java</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="skills[]" value="4" id="gestion de projet">
                    <label class="form-check-label" for="gestion de projet">gestion de projet</label>
                </div>
              </div>

              <button type="submit" class="btn btn-primary" style="margin-top: 2%;">Soumettre</button>
            </form>
        
         </section>
        <section class="home" id="home2">
           
                <div class="main">
                    <!-- INDENDITY WEBSITE -->
                    <div class="identity-website">
                        <img src="assets/img/logo-web-png.png" width="158" height="50">
                    </div>
                    
                    <!-- BLUE BLOC ESTHETIC ONE -->
                    <div class="bloc-esthetic-one">
                    <!-- BLUE BLOC ESTHETIC TWO -->
                    <div class="bloc-esthetic-two">
                    <!-- CONTAINER OF ALL OFFERS  -->
                            <div class="container-offers">
                                <!-- HEAD OF TABLE -->
                                <div class="head-table">
                                    <p class="picture">Picture</p>
                                    <p class="title">Title</p>
                                    <p class="post"><strong>Post</strong><br></p>
                                    <p class="details">Details</p>
                                    <p class="delete">Delete</p>
                                </div>
                                
                                <!-- LOAD OFFERS -->
                                <div class="load-offer">
                                    <!-- single-offer -->
                                    <?php
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $titre = $row['titre'];
                                            $id = $row["code_offre_emploi"];
                                            $_SESSION["ajo"] = $id;
                                            

                                    ?>
                                    <form action="includes/deleteoffre.inc.php" method="post">
                                        <div class="single-offer">
                                            <!-- IMAGE OF OFFER -->
                                            <picture>
                                                <img class="rounded-circle" width="50" height="45"  src="assets/img/portrait-women.png">
                                            </picture>
                                            <!-- TITLE OF JOB  -->
                                            <p class="title" ><?php echo $titre ?></p>
                                            <?php 
                                                echo '<input type="text" style="display:none" name="id" value="'.$id.'">';
                                                echo '<input type="text" style="display:none" name="titre" value="'.$titre.'">';
                                                
                                            ?>
                                            <!-- POST -->
                                            <p class="post">Developer</p>
                                            
                                                <!-- BUTTON DETAILS  -->
                                                <button class="btn-details btn btn-info" type="submit" name="op" value="det">Details</button>
                                                <!-- BUTTON DELETE -->
                                                <button class="btn-delete btn btn-danger" type="submit" name="op" value="del" >Delete</button>
                                            
                                        </div>      
                                </form>      
                                    <?php
                                        }
                                        } else {
                                        echo "Error: " . mysqli_error($conn);
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