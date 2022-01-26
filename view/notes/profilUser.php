<!DOCTYPE html>
<html lang="FR">
    <head>
     <!--iclude head -->
      <?php require_once 'view/layout/head.php'; ?>
    </head>
    <body>
        <header>
       <!-- Navbar  -->
            <nav class="navbar  navbar-expand-lg navbar-dark p-md-3">
            <div class="container">
                <a href="index.php" class="navbar-brand nav-link"><img src="<?php echo IMG_PATH;?>logo.png" alt="logo" class="logo">MyBeard</a>
            </div>
            </nav>
        </header>
        <main>
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card shadow  card_connexion mb-2 p-5 " >
                    <div class="card-body p-4">
                        <img src="<?php echo IMG_PATH;?>icone.png" class="figure-img img-fluid rounded mx-auto d-block " alt="photo-personne-victorielle">
                        <h3 class=" text-center mb-1">N.B</h3>
             <!-- -------------------profil form UNUSED------------- -->
                    <form>
                        <!--  Name change input -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control mr-2" placeholder="Prenom" aria-label="Prenom" aria-describedby="button-addon2">
                            <a href="#" class="link-primary">Modifier</a>
                        </div>
                        <!-- family name password input -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control mr-2" placeholder="Nom" aria-label="Nom" aria-describedby="button-addon2">
                            <a href="#" class="link-primary">Modifier</a>
                        </div>
                        <h3 class=" text-center mb-1">Choisir votre avatar</h3>
                        <!-- Avatar chosing  -->
                        <div class="flex-row d-flex justify-content-lg-around">
                            <div class="flex-column d-flex" >
                                <img src="<?php echo IMG_PATH;?>icone.png" class="figure-img img-fluid " alt="photo-personne-victorielle">
                                <a href="#" class="link-primary">Choisir</a>
                            </div>
                            <div class="flex-column d-flex">
                                <img src="<?php echo IMG_PATH;?>icone.png" class="figure-img img-fluid " alt="photo-personne-victorielle">
                                <a href="#" class="link-primary">Choisir</a>
                            </div>
                            <div class="flex-column d-flex">
                                <img src="<?php echo IMG_PATH;?>icone.png" class="figure-img img-fluid " alt="photo-personne-victorielle">
                                <a href="#" class="link-primary">Choisir</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-light btn-secondary btn-lg gradient-custom-4 text-body mt-2">Valider</button>
                        </div>
                    </form>
            </div>
        </div>
      </div>
   </div>

   
    <?php
            require_once 'view/layout/error.php';
            //var_dump($data['notes']->getTitle());
        ?>
    </main>

<?php
            require_once 'view/layout/error.php';
            //var_dump($data['notes']->getTitle());
        ?>
    </main>
     <!-- --------Footer---------- -->
    <?php require_once 'view/layout/footer.php'; ?>
</body>
</html>
