<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    use App\Session;
    
    class SecurityManager extends AbstractManager
    {
        private static $classname = "Model\Entity\User";

        public function __construct(){
            self::connect(self::$classname);
        }

     
    }