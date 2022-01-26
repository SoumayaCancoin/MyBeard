<?php
    namespace Controller;  
    use App\Session;
    use App\Router;
    use helpers\Redirect;
    use Model\Manager\UsersManager;
  

    class LoginController extends Router {
        public function login() {

            if (Session::hasUser()){
                header('Location: ./index.php');
            }           
            $this->view('notes/login.php', [
                "pageTitle" => "MyBeard - Se connecter",
            ]);
        }

        public function disconnect() {
            if (!Session::hasUser()){
                header('Location: ./index.php');
            }else{
                Session::removeUser();
                header('Location: ./index.php');
            }
        }

        public function loginOk() {

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // if form submitted with post method -validate request,manage post request differently, 
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                //Gets external variables and  filters them
                $data = [                    
                    'email'=>trim( $_POST['email']),
                    'password' => trim($_POST['password']),                  
                ];           
                // verification email input 
                if(empty($data['email']) || empty($data['password'])){
                    Session::addMessage("error", "veuillez remplir les champs");
                    header("Location: ./login.php");
                    exit();
                }
                $userManager = new UsersManager;
                //Check for user/email
                $profilUser = $userManager->userExist($data['email']);
                if($profilUser){
                    if (password_verify($data['password'], $profilUser->getPassword())) {
                        $profilUser = $userManager->loginUser($profilUser->getId());
                        Session::addUser($profilUser);
                        header('Location: ./index.php');
                    } else {
                        echo 'Le mot de passe est invalide.';
                    }
                    // header('Location: notes/userPage.php');
                }else{
                    //user register faild
                    if($userManager->mailExist($data['email'])){
                        Session::addMessage("error", "votre mot de passe est incorrect");
            
                    }else{
                        Session::addMessage("error", "votre mot de passe et votre mail n'existe pas");
                        header('Location: ./login.php');
                    }
                }
            }
        }               
    }