<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    use App\Session;
    // mettre tous les messages d'erreur dans Session


    class CardManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Card";

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
                    FROM card
                    WHERE id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function getAllCardFromList($list){
            $sql = "SELECT *         
                    FROM card
                    WHERE listProject_id = :listProject_id";
            return self::getResults(
                self::select($sql, 
                    ["listProject_id" => $list], 
                    true
                ), 
                self::$classname
            );
        }

        public function createCard($name, $description, $deadLine, $color, $list){
            $sql = "INSERT INTO card (name, description, deadLine, color, isArchived, listProject_id)
                VALUES (:name, :description, :deadLine, :color, 0, :id)";
                self::create($sql, 
                    ["name" => $name,
                    "description" => $description,
                    "deadLine" => $deadLine,
                    "color" => $color,
                    "id" => $list],
                    true
            );
        }

        public function editCard($id, $name, $description, $color, $list){
            $sql = "UPDATE card
            SET name = :name, description = :description, color = :color, listProject_id = :projectId
            WHERE id = :id";
            self::update($sql, 
                ["id" => $id,
                "name" => $name,
                "description" => $description,
                "color" => $color,
                "projectId" => $list],
                true
            );
        }

        public function cardDelete($id){
            $sql = "DELETE FROM card
            WHERE id = :id";
            self::delete($sql, 
                ["id" => $id],
                true
            );
        }
    }