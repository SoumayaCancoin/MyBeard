<?php use App\Session; ?>

<!DOCTYPE html>
<html lang="FR">
<head>
    <!--iclude head -->
<?php require_once 'view/layout/headuserpage.php'; ?>
</head>
<body>
    <header>
       <!-- Navbar  -->
      
      <nav class="navbar navbar-expand-lg navbar-dark  ">
         <div class="container-fluid">
           <!-- ----Logo----- -->
            <a href="index.php" class="navbar-brand nav-link"><img src="<?php echo IMG_PATH;?>logo.png" alt="logo" class="logo">MyBeard</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             </button>
             <div class="collapse navbar-collapse container-fluide " id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <!-- the projects drop dow button -->
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes projets</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach ($data["projectsAcces"] as $projectListFromUser) {?>
                      <li><a class="dropdown-item" href="userPage.php?idProject=<?php echo $projectListFromUser->getProject()->getId(); ?>"><?php echo $projectListFromUser->getProject()->getName(); ?></a></li>
                    <?php } ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="newProject.php">Ajouter un projet</a></li>
                   </ul>
                </li>
                <!-- the project drop dow button -->
                <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Mes favoris </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Projet</a></li>
                    <li><a class="dropdown-item" href="#">Ajouter un projet</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Supprimer un projet</a></li>
                  </ul>
                </li> -->
             </ul>
             <!-- search form -->
                <form class="d-flex mr-2  justify-content-end">
                  <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
                  <button class="btn btn-outline" type="submit">Recherche</button>
                </form>
                <figure class="figure text-center m-2">
                  <img src="<?php echo IMG_PATH;?>icone.png" class="figure-img img-fluid  " alt="...">
                    <figcaption class="figure-caption "><?php echo Session::getUser()->getName(); ?></figcaption>
                </figure>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <!-- bady of page  -->
     <div class="container w-75 rounded-bottom container-nav-2">
        <div class="row  ">
          <!-- the first menu  -->
           <div class="col border-end">
            <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo IMG_PATH;?>projet_icone.png" class="figure-img img-fluid " alt="...">  <?php echo $data["projectInfos"]->getName(); ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Modifier</a></li>
            </ul>
          </div>
        <div class="col border-end">
    
            <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo IMG_PATH;?>description_icone.png" class="figure-img img-fluid " alt="..."> Description
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li class="dropdown-item"><?php echo $data["projectInfos"]->getDescription(); ?></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Ajouter description</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Supprimer descript</a></li>
            </ul>
       
        </div>
          <div class="col border-end">
            <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo IMG_PATH;?>equipe.png" class="figure-img img-fluid " alt="..."> Equipe
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php foreach ($data["usersProject"] as $projectUsers) {?>
                <li><a class="dropdown-item"><?php echo $projectUsers->getUsers()->getName(); ?></a></li>
              <?php } ?>
            </ul>
          </div>
        <div class="col">
          <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?php echo IMG_PATH;?>ajouter_icone.png" class="figure-img img-fluid " alt="...">   Inviter
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Ajouter un utilisateur</a></li>
          </ul>
          </div>
        </div>
      </div>
      <!-- choosing the card color div -->
        <!-- list div  -->
        <div class="container   d-flex justify-content-start gap-3 row flex-row flex-nowrap  overflow-scroll"style="margin-left:0px;margin-top:10px  ">
          <div class="card card-aside text-center" style="width: 100px; padding-top: 60px">
            <a href="list.php?idProject=<?php echo $data["idProject"] ?>" class="link" ><img src="<?php echo IMG_PATH;?>add-icone.png" alt="icone" class="rounded mx-auto d-block">
              Ajouter une liste
            </a></div>

            <?php
            $i = 0;
            foreach ($data["tableEverything"] as $liste) {    ?> 
              <div class="card bg-transparent card-table text-center mb-4" >
                <!-- list name -->

              <div class="border border-5 rounded-3"><h5 class="card-title text-center  "  ><?php echo "<br/>".($liste["listProject".$i]->getName())."<br/>";?></h5></div>
              <a href="card.php?idList=<?php echo $liste["listProject".$i]->getId() ?>" class="link"><div class="container overflow-hidden">
          <div class="row gx-5">
            <div class="col">
              <div class=" p-3   post-it-pearple"><img src="<?php echo IMG_PATH;?>add-icone.png" alt="icone" class="rounded mx-auto d-block">Ajouter</div></a>
            </div>   
            </div>
            </div> 
            
                 <!-- card div -->
                <?php
                foreach($liste["cards"] as $cards){?>
                  <div class="card-body-custom overflow-auto  
                  
                  <?php switch ($cards->getColor()) {
                      case "Bleu":
                        echo 'post-it-blue';
                        break;
                      case "Orange":
                        echo 'post-it-orange';
                        break;
                      case "Cyan":
                        echo 'post-it-cyan';
                        break;
                      case "Jaune":
                        echo 'post-it-yellow';
                        break;
                      default:
                        echo 'post-it-pearple';
                        break;
                    } ?>
                    ">
                    <!-- card containd --><?php echo $cards->getName();?>
                    <p class="card-text " style="transform: rotate(0);">  
                    
                    <a href="cardDelete.php?idCard=<?php echo $cards->getId(); ?>" class="card-link"><img src="<?php echo IMG_PATH;?>delete-icone.png" alt="icone" class="icone"></a>
                    <a href="cardModif.php?idCard=<?php echo $cards->getId(); ?>" class="card-link"><img src="<?php echo IMG_PATH;?>modif-icone.png" alt="icone" class="icone"></a>
                    </p>  
                  </div>
                  <?php
                }
                $i++;
                ?>
              </div>
              <?php
                }
              ?> 
            </div>
           <?php
              require_once 'view/layout/error.php';
            ?>
        </main>
     <!-- --------Footer---------- -->
    <?php require_once 'view/layout/footer.php'; ?>
</body>
</html>
