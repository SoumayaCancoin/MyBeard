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
        <div class="container h-100 "> 
           <div class="row d-flex  justify-content-center align-items-center h-100">
             <div class="card shadow mb-3" style="border-radius: 15px;">
               <div class="card-body p-5">
                <h3 class=" text-center mb-4">Réinitialisation mot de passe
                </h3>
          <!-- ------------reset Password form------------ -->
              <form>
            <!-- ---------------Mail input-------------- -->
                <div class="form-outline mb-2">
                <label class="form-label" for="form3Example4cg">Email</label>
                  <input type="mail" id="form3Example4cg" class="form-control form-control-sm" />
                  <span class="invalid-feedback"><?php ?></span>
                </div>
              <!-- ---------------reset button--------------- -->
                <div class="d-flex justify-content-center mb-2">
                  <button type="button" class="btn btn-light btn-secondary btn-lg gradient-custom-4 text-body">Réinitialiser</button>
                </div>

            <!-- --------------reset passord form image------------- -->
              <img src="<?php echo IMG_PATH;?>equipe_forgotpage.png" alt="photo_equipe_victorielle-avec3personnes">
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

     <!-- --------Footer---------- -->
    <?php require_once 'view/layout/footer.php'; ?>
</body>
</html>