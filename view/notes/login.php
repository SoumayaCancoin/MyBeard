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
    <div class="container">
<div class="row">
  <div class="col">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="card shadow  card_connexion mb-2 p-5 " >
            <div class="card-body p-4">
               <h3 class=" text-center mb-1">Bienvenue
               </h3>
             <!-- -------------------Connexion form------------- -->
            <form method="post" action="./loginOk.php">
                  <!-- Email input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="form3Example3cg"> E-mail</label>
                    <input type="email" id="form3Example3cg" class="form-control form-control-sm" name="email" />
                    <span class="invalid-feedback"><?php ?></span>
                </div>
                  <!-- Password input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="form3Example4cg">Mot de passe</label>
                    <input type="password" id="form3Example4cg" class="form-control form-control-sm" name="password" />
                    <span class="invalid-feedback"><?php ?></span>
                </div>
                <!-- Connexion button -->
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn  btn-secondary gradient-custom-4 text-body">Se connecter</button>
                </div>
                <!-- Forgot password link -->
                <p class="text-center text-muted mt-5 mb-0"><a href="reset.php" class="fw-bold text-body"><u>Mot de passe oublié  </u></a></p>
            </form>
            </div>
        </div>
      </div>
   </div>
</div>
      <div class="col">
      <img src="<?php echo IMG_PATH;?>equip-pic-connexionpage.png" alt="photo_equipe_victorielle-avec3personnes">
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
            
        ?>
    </main>
     <!-- --------Footer---------- -->
    <?php require_once 'view/layout/footer.php'; ?>
</body>
</html>
