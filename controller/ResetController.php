<?php
    namespace Controller;  
    use App\Session;
    use App\Router;
    use Model\Manager\SecurityManager;
  

    class ResetController extends Router {


        /**
         * Afficher toutes les notes d'une personne (via une valeur get dans l'url)
         */
         
        public function resetPassword(){
        
            $this->view('notes/reset.php', [
              
              ]);  
            }    
    }