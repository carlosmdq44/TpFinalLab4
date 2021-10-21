<?php

    namespace Controllers;
    use Models\User as User;

    class HomeController {

        public function Index($message = "") {
            require_once(VIEWS_PATH."index.php");
        }

        public function IndexAdmin($message = "") {
            require_once(VIEWS_PATH."vistaAdmin.php");
        }

        public function IndexCompany($message = "") {
            require_once(VIEWS_PATH."vistaCompany.php");
        }

        public function Login ($username, $password, $btnLogin) {
            $adminLogin = "user@myapp.com";
            $userPasswordLogin ="123456";
            $message = "";
                        
            if($username == $adminLogin ) {
                if($password == $userPasswordLogin ) { 
                    $user = new User();
                    $user->setEmail($adminLogin);
                    $user->setPassword($userPasswordLogin);
                                    
                    $_SESSION['index']= $user->getEmail();
                    require_once(VIEWS_PATH."vistaAdmin.php");
                } else {
                    $message = "This Password is Incorrect ";
                    $this->Index($message);
                }
            } else {
                $message = "The Email is invalid";
                $this->Index($message);
            }
        }

        public function Logout() {
            session_destroy();
            $this->Index();
        }

        public function Logout2() {
            session_destroy();
            $this->IndexAdmin();
        }

        public function Logout3() {
            session_destroy();
            $this->IndexCompany();
        }

    }
    
?>