<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    use App\Session;
    
    // mettre tous les messages d'erreur dans Session


    class UsersManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Users";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){

            $sql = "SELECT * FROM users";

            return self::getResults(
                self::select($sql,
                    null, 
                    true
                ), 
                self::$classname
            );
            die ($sql);
        }
        

        public function findOneById($id){
            $sql = "SELECT *          
                    FROM users 
                    WHERE id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function loginUser($id){
            $sql = "SELECT id, name, firstName, email, role, avatar          
                    FROM users 
                    WHERE id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function mailExist($email){
            
            $sql = "SELECT *          
                    FROM users 
                    WHERE email = :email";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["email" => $email], 
                    false
                ), 
                self::$classname
            );
            // Session::addMessage()
      
        }
        public function userExist($email){
            
            $sql = "SELECT *          
                    FROM users 
                    WHERE email = :email";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["email" => $email], 
                    false
                ), 
                self::$classname
            );
           
        }
       /* public function createUser($params){
            $sql =" INSERT INTO users (name, email, password) 
                VALUES (:name, :email, :password)";
            return self::getOneOrNullResult(
                self::create($sql,
                [":name"=> $name,
                ":email"=> $email,
                ":password"=> $password]),
                self::$classname
            );
        }*/

        public function createUser($name, $email, $password){
            $sql ="INSERT INTO users (name, firstName, email, password, role) 
                VALUES (:name, '', :email, :password, '[]')";
                self::create($sql, 
                    ["name" => $name,
                    "email" => $email,
                    "password" => $password],
                    true
            ); 
        }
      
    }