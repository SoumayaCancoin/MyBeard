<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    use App\Session;
    // mettre tous les messages d'erreur dans Session


    class ListProjectManager extends AbstractManager
    {
        private static $classname = "Model\Entity\ListProject";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){

            $sql = "SELECT * FROM listproject";

            return self::getResults(
                self::select($sql,
                    null, 
                    true
                ), 
                self::$classname
            );
        }

        public function findOneById($id){
            $sql = "SELECT *          
                    FROM listproject 
                    WHERE id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function getAllListFromProject($project){
            $sql = "SELECT *         
                    FROM listproject
                    WHERE project_id = :project_id";
            return self::getResults(
                self::select($sql, 
                    ["project_id" => $project], 
                    true
                ), 
                self::$classname
            );
        }

        public function createList($name, $project){
            $sql = "INSERT INTO listproject (name, isArchived, project_id)
                VALUES (:name, 0, :project_id)";
                self::create($sql, 
                    ["name" => $name,
                    "project_id" => $project],
                    true
            ); 
        }

        public function isListInProject($id, $project){
            $sql = "SELECT *          
                    FROM listproject 
                    WHERE id = :id
                    AND project_id = :project";
            return self::getResults(
                self::select($sql, 
                    ["id" => $id,
                    "project" => $project], 
                    true
                ), 
                self::$classname
            );
        }

        
    }