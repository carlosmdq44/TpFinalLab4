<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController {
        
        private $UserDAO;

        public function __construct() {
            $this->UserDAO = new UserDAO();
        }
        
        public function ShowAddView() {
            require_once(VIEWS_PATH."add-user.php");
        }
        
        public function ShowProfileView() {
            $userList = $this->UserDAO->GetAllPDO();
            require_once(VIEWS_PATH."user-list.php");
        }

        public function ShowProfileUserView() {
            require_once(VIEWS_PATH."vistaUserAdmin.php");
        }

        public function ShowProfileUserModify() {
            require_once(VIEWS_PATH."modify-user.php");
        }

        public function ShowModifyView($email) {
            $arrayUser = $this->UserDAO->GetAllPDO();
            $loggedUser = NULL;
            foreach ($arrayUser as $key => $value) {
                if($email == $value->getEmail()) {
                    $loggedUser = $value;
                }
            }
            if($loggedUser != NULL) {
                $_SESSION['loggedUser'] = $loggedUser;
                require_once(VIEWS_PATH."modify-user.php");
            }
        }

        public function Add($email, $password, $button) {
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $this->UserDAO->AddPDO($user);
            $this->ShowAddView();
        }

        public function ModifyUser($email, $password, $button) {
            $this->UserDAO->UpdateByEmail($email, $password);
            $this->ShowProfileView();
        }

        public function DeleteUser($email) {
            $this->UserDAO->DeleteByEmail($email);
    		$this->ShowProfileView();
        }

    }
?>