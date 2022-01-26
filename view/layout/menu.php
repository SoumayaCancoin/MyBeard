<?php use App\Session; ?>
<!-- Navbar  -->
<nav class="navbar  navbar-expand-lg navbar-dark p-md-3">
  <div class="container">
    <!-- Logo -->
    <a href="index.php" class="navbar-brand nav-link"><img src="<?php echo IMG_PATH;?>logo.png" alt="logo" class="logo">MyBeard</a>
      <button class="navbar-toggler" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-grid gap-2  justify-content-md-end">
          <?php if (!Session::hasUser()){ ?>
          <a class="btn  me-md-6 btn-lg" type="button" href="login.php" >Connexion</a>
          <a class="btn btn-lg" type="button" href="index.php">Inscription</a>
          <?php }else{?>
            <a class="btn  me-md-6 btn-lg" type="button" href="./newProject.php" >Créer un projet</a>
            <a class="btn  me-md-6 btn-lg" type="button" href="seeProjects.php" >Voir les projets</a>
            <a class="btn  me-md-6 btn-lg" type="button" href="disconnect.php" >Deconnexion</a>
            <?php }?>
        </div>
      </div>
    </nav>
