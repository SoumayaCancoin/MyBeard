<?php
    namespace Controller;  
    use App\Session;
    use App\Router;
    use Model\Manager\SecurityManager;
  

    class ResetValidController extends Router {


        /**
         * Afficher toutes les notes d'une personne (via une valeur get dans l'url)
         */
         
        public function sendMailSuccess(){
        
            $this->view('notes/resetValid.php', [
              
              ]);  
            }    
    }