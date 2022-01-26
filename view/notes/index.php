<?php use App\Session; ?>

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

       <div class="container mb-2">
        <div class="row">
            <div class="col">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5 shadow" >
                                <h3 class=" text-center mb-1">Bienvenue sur notre site<br>Commençons
                                </h3>


                                <?php if (!Session::hasUser()){ ?>
                                <!-- .....Registere Form....... -->
                                <form method="post" action="./registerOk.php">
                                <!-- ......Name Input.......... -->
                                <div class="form-outline mb-2">
                                   <label class="form-label" for="form3Example1cg">Nom Complet</label>
                                   <input type="text" name="name" id="form3Example1cg" class="form-control form-control-sm" />
                                   <span class="invalid-feedback"><?php ?></span>
                                </div>
                                <!-- ......Email Input.......... -->
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example3cg"> E-mail</label>
                                    <input type="email" name="email" id="form3Example3cg" class="form-control form-control-sm" />
                                    <span class="invalid-feedback"><?php ?></span>
                                </div>
                                <!-- ......Password Input.......... -->
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example4cg">Mot de passe</label>
                                    <input type="password"  name="password" id="form3Example4cg" class="form-control form-control-sm" /> 
                                    <span class="invalid-feedback"><?php ?></span>
                                </div>
                                 <!-- ......Password confirm Input.......... -->
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example4cdg">Confirmer mot de passe </label>
                                    <input type="password" name="confirmPassword" id="form3Example4cdg" class="form-control form-control-sm" />
                                    <span class="invalid-feedback"><?php ?></span>
                                </div>
                                 <!-- ......register button .......... -->
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class=" btn btn-lg">S'inscrire</button>
                                </div>
                                  <!-- .....connexion link.......... -->
                                <p class="text-center text-muted mt-5 mb-0">Vous avez déjà un compte ? <a href="login.php" class="fw-bold text-body"><u>Se connecter</u></a></p>

                                </form>
                                <?php }?>


                            </div>
                         </div>
                    </div>
                </div> 
            </div>
            <!-- ........Grip Paragraph.......  -->
            <div class="col text-center grip-text ">
            <h1>L'outil de gestionnaire des tâches idéal pour votre équipe</h1>
            <p>Planifiez, gérez et suivez toutes les tâches de votre  équipe dans un seul logiciel flexible en ligne
            </p>
             <img src="<?php echo IMG_PATH;?>Fichier1.png" alt="photo_equipe_victorielle">
            </div>
        </div>
        <!-- -----------  Fonctionality paragraph---------- -->
        <div class="row">
            <div class="container">
                <div class="row justify-content-md-center">
                   <img src="<?php echo IMG_PATH;?>equipe_fonction_section.png" alt="photo_equipe_victorielle_fonctions"><br>
                </div>
                <div class="row justify-content-md-center">
                <h2>Fonctionnalités </h2> <br>
                </div>
                <div class="row text-center">
                <p><strong>Fonctionnalités </strong>conçues pour aider votre équipe à réussir Pour soutenir<strong> une équipe </strong>productive, il faut un outil puissant (et plein d'en-cas). Qu'il s'agisse
                <strong>de réunions</strong>, <strong>de projets</strong>, d'événements ou encore de la définition d'objectifs, les fonctionnalités
                intuitives  permettent à n'importe quelle équipe de configurer et de <strong>personnaliser
                </strong>rapidement des flux de production pour à peu près tout.
                </p>
                </div>
            </div>
        </div>
        <!-- -----------  Fonctionality paragraph---------- -->
        <div class="row">
            <div class="col">
            <img src="<?php echo IMG_PATH;?>capture_site_user.png" alt="photo_page_site">
            </div>
            <div class="col ">
                <h1>Pourquoi ??</h1>
                <p>
                    Votre équipe et vous-même pouvez démarrer une carte  en quelques secondes. Grâce aux différents angles de vision des données d'un tableau, tous les membres de l'équipe peuvent rester informés de la manière qui leur convient le mieux :
                    <ul>
                        <li>Utilisez une vue Chronogramme pour la planification d'un projet.</li>
                        <li>Le calendrier facilite la gestion du temps</li>
                        <li>La vue Table permet de connecter différents éléments de travail dans des tableaux</li>
                        <li>Affichez des statistiques de tableau grâce à la vue Tableau de bord, et plus encore !</li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
   
        <?php
            require_once 'view/layout/error.php';
            //var_dump($data['notes']->getTitle());
        ?>
    </main>
     <!-- --------Footer---------- -->
    <?php require_once 'view/layout/footer.php'; ?>
</body>
</html>
