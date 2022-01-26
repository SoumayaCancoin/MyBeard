<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    use App\Session;
    
    class NoteManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Note";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){

            $sql = "SELECT *
                    FROM notes n
                    ORDER BY datesujet DESC";

            return self::getResults(
                self::select($sql,
                    null, 
                    true
                ), 
                self::$classname
            );
            // Session::addMessage()
        }

        public function findOneById($id){
            $sql = "SELECT *
                        FROM notes 
                        WHERE id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }
    }