<?php
    namespace Controller;  
    use App\Session;
    use App\Router;
    use Model\Manager\SecurityManager;
  

    class ProfilController extends Router {


        /**
         * Afficher toutes les notes d'une personne (via une valeur get dans l'url)
         */
         
        public function profil(){
        
            $this->view('notes/profil.php', [
              
              ]);  
            }    
    }