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
                        
                        <h3 class=" text-center mb-1">Créer un nouveau projet</h3>
                        <p>Vous pouvez ajouter des informations sur votre projet</p>
                         <!-- -------------------project form------------- -->
                        <form action="./createProjectOK.php" method="post">
                            <!--  Title change input -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="form3Example3cg"> Titre (3 caractères minimum) </label>
                                <input type="text" class="form-control mr-2" placeholder="Titre" aria-label="Titre" aria-describedby="button-addon2 " name="name">  
                            </div>
                            <!--  description add input -->
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">La description (1 caractère minimum) </label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                            </div>
                            <a href="index.php">Retour</a>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="submit" class="btn btn-light btn-secondary btn-lg gradient-custom-4 text-body mt-2">Valider</button> 
                            </div>
                            <img class="rounded mx-auto d-block"  src="<?php echo IMG_PATH;?>pic_project_add.png" alt="photo_ictorielle">
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
