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
                        
                        <h3 class=" text-center mb-1">Modifier la carte <?php echo $data["currentCard"]->getName(); ?></h3>
                        <p>Vous pouvez ajouter des informations sur la carte</p>
                        <!-- -------------------card form------------- -->
                        <form action="./cardModifOk.php?idCard=<?php echo $data["currentCard"]->getId(); ?>" method="post">
                       
                        <!-- containd card input -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="form3Example3cg"> Titre </label>
                                <input type="text" class="form-control mr-2" placeholder="Titre" aria-label="Titre" aria-describedby="button-addon2 " name="name" value="<?php echo $data["currentCard"]->getName(); ?>">                                
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description </label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?php echo $data["currentCard"]->getDescription(); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Couleur de la carte</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="color">
                                    <?php 
                                        $arrayColor = ["Orange","Bleu","Cyan","Jaune","Violet"]; // pre select the color
                                        foreach ($arrayColor as $color) {
                                            if ($color == $data["currentCard"]->getColor()){
                                                echo "<option selected>".$color."</option>";
                                            }else{
                                                echo "<option>".$color."</option>";
                                            }
                                        }
                                    ?>
                                </select>                            
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Liste de la carte</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="newList">
                                    <?php 
                                        $arrayColor = ["Orange","Bleu","Cyan","Jaune","Violet"]; // pre select the color

                                        foreach ($data["allListFromProject"] as $projectList) {
                                            if($projectList->getId() == $data["currentCard"]->getlistProject()->getId()){
                                                echo "<option value=".$projectList->getId()." selected>".$projectList->getName()."</option>";
                                            }else{
                                                echo "<option value=".$projectList->getId().">".$projectList->getName()."</option>";
                                            }
                                        }
                                    ?>
                                </select>                           
                            </div>
                            <a href="./userPage.php?idProject=<?php echo $data["currentCard"]->getListProject()->getProject()->getId(); ?>">Retour</a>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="submit" class="btn btn-light btn-secondary btn-lg gradient-custom-4 text-body mt-2">Ajouter</button>                            
                            </div>                        
                            <img src="<?php echo IMG_PATH;?>card-img-forn.png" alt="photo_ictorielle">
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
