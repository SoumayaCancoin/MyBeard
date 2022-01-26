<?php
    namespace Controller;  
    use App\Session;
    use App\Router;
    use Model\Manager\UsersManager;
  

    class UsersController extends Router {

        public function index() {
                $this->view('notes/index.php', [
                    "pageTitle" => "MyBeard - Page d'accueil",
                ]);
            }
    }
