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
                        
                        <h3 class=" text-center mb-1">Modifier projet</h3>
                        <p>Vous pouvez changer le titre et la description de votre projet</p>
                        <!-- -------------------profil form------------- -->
                        <form>
                            <!--  Title change input -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="form3Example3cg"> Titre </label>
                                <input type="text" class="form-control mr-2" placeholder="Titre" aria-label="Titre" aria-describedby="button-addon2">
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">La description </label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-light btn-secondary btn-lg gradient-custom-4 text-body mt-2 mr-2">Valider</button>
                                <button type="button" class="btn btn-light btn-secondary btn-lg gradient-custom-4 text-body mt-2">Annuler</button>
                            </div>
                            <a href="userPage.php">Retour</a>
                            <img src="<?php echo IMG_PATH;?>modif_project.png" alt="photo_ictorielle">
                        </form>
                    </div>
                </div>
            </div>

            <?php
                require_once 'view/layout/error.php';
            ?>
        </main>
     <!-- --------Footer---------- -->
    <?php require_once 'view/layout/footer.php'; ?>
</body>
</html>
