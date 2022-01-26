<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    use App\Session;
    // mettre tous les messages d'erreur dans Session


    class HasAccessManager extends AbstractManager
    {
        private static $classname = "Model\Entity\HasAccess";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findProjectUserAccess($id){
            $sql = "SELECT *         
                    FROM has_access
                    WHERE users_id = :id";
            return self::getResults(
                self::select($sql, 
                    ["id" => $id], 
                    true
                ), 
                self::$classname
            );
        }

        public function findUsersInProject($id){
            $sql = "SELECT *         
                    FROM has_access
                    WHERE project_id = :id";
            return self::getResults(
                self::select($sql, 
                    ["id" => $id], 
                    true
                ), 
                self::$classname
            );
        }

        public function hasAccessToProject($user, $project){
            $sql = "SELECT *          
                    FROM has_access
                    WHERE users_id = :user
                    AND project_id = :project" ;
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["user" => $user,
                     "project" => $project], 
                    false
                ), 
                self::$classname
            );
        }
    }