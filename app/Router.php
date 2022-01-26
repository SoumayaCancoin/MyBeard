<?php
    namespace App;

    use Controller\HomeController;
    

    abstract class Router {

        // public static function handleRequest($get){

        //     $ctrlname = "Controller\HomeController";
        //     $method = "index";

        //     // $get = "index.php?ctrl=forum&method=allTopics";
        //     // $get = "index.php?ctrl=forum&method=findTopic&id=3";
            
        //     if(isset($get['ctrl'])){
        //         // ctrl = forum
        //         // Controller\ForumController
        //         $ctrlname = "Controller\\".ucfirst($get['ctrl'])."Controller";
        //     }
            
        //     if(isset($get['method']) && class_exists($ctrlname)){
        //         // method = allTopics
        //         // $ctrl = new ForumController();
        //         $ctrl = new $ctrlname();
        //     } else $ctrl = new HomeController();

        //     if(isset($get['id'])){
        //         $id = $get['id'];
        //     } else $id = null;

        //     if(isset($get['method']) && method_exists($ctrl, $get['method'])){
        //         // $method = allTopics
        //         $method = $get['method'];
        //     }
            
        //     // ForumController->allTopics();
        //     // ForumController->findTopic($id)
        //     return $ctrl->$method($id);
        // }

        // public static function redirectTo($ctrl = null, $method = null, $id = null){
        //     header("Location:?ctrl=".$ctrl."&method=".$method."&id=".$id);
        //     die();
        // }

          /**
         * Chemin du dossier des vues à partir de la racine
         */
        const VIEW_PATH = '/View/';
        
        protected function view(string $fileName, array $data = []): void
        {
          $filePath = APP_BASE_PATH . self::VIEW_PATH. $fileName;
      
          if (file_exists($filePath)) {
            require $filePath; // Importe/Charge le code php de la vue
          } // else error 404
     
        }
    }