<!DOCTYPE html>
<html lang="FR">
<head>
     <!--iclude head -->
<?php require_once 'view/layout/head.php'; ?>
</head>
<body>
    <header>
        <!-- include nav -->
        <?php require_once 'view/layout/menu.php'; ?>
    </header>
    <main>
        <!-- -----------  Project list paragraph---------- -->
        <div class="row">
            <div class="container">
                
                <div class="justify-content-md-center">
                <h2>Les projets dont vous avez accès</h2>
                <ul>
                <?php 
                if ($data['projects']){
                    foreach ($data["projects"] as $project) { ?>
                        <li><a class="btn  me-md-6 btn-lg" type="button" href="userPage.php?idProject=<?php echo $project->getProject()->getId(); ?>" ><?php echo $project->getProject()->getName(); ?></a></li>
                    <?php } 
                    }else{
                        echo "Vous n'avez aucun projet ! Il serait temps de s'y mettre !";
                    }?>
                </ul>
                </div>
                <div class="row text-center">
                </div>
                <div class="row justify-content-md-center">
                   <img src="<?php echo IMG_PATH;?>Myprojects.png" alt="photo_equipe_victorielle_fonctions"><br>
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
