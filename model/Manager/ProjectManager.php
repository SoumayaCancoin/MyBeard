<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    use App\Session;
    // mettre tous les messages d'erreur dans Session


    class ProjectManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Project";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){

            $sql = "SELECT * FROM project";

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
                    FROM project 
                    WHERE id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function createProject($name, $description, $id){
            $sql = "INSERT INTO project (name, description, isArchived, users_id)
                VALUES (:name, :description, 0, :id)";
                self::create($sql, 
                    ["name" => $name,
                    "description" => $description,
                    "id" => $id],
                    true
            ); 
            $sql2 = "INSERT INTO has_access (users_id, project_id, isAdmin)
                VALUES (:users, :project, 1)";
                self::create($sql2, 
                    ["users" => $id,
                    "project" => self::getLastInsertId()],
                    true
            );
        }
    }