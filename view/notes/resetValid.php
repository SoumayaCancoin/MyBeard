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
     <!-- Reset password div -->
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card shadow  card_connexion mb-2 p-5 " >
            <div class="card-body p-4">
               <h3 class=" text-center mb-1">Réinitialisation de  mot de passe
               </h3>
               <p>Nous vous avons envoyé un lien de récupération à l'adresse :
               </p>
               <div >
                   <!-- image illudtration div  -->
                <img src="<?php echo IMG_PATH;?>send-mail.png"  alt="photo_equipe_victorielle-avec3personnes " class="rounded mx-auto d-block ">
                </div>
            </div>
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
