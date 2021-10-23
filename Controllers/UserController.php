<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController {
        private $userDAO;

        public function __construct() {
            $this->userDAO = new UserDAO();
        }

        
        public function ShowAddView() {
            require_once(VIEWS_PATH."user-add.php");
        }

        public function ShowProfileUserListView() {
            $userList = $this->userDAO->GetAll();
            require_once(VIEWS_PATH."user-list.php");
        }

        public function ShowProfileUserView() {
            require_once(VIEWS_PATH."vistaUserAdmin.php");
        }
        
        public function ShowProfileView() {
            require_once(VIEWS_PATH."vistaStudent.php");
        }

        public function ShowProfileView2() {
            require_once(VIEWS_PATH."students-list.php");
        }

        public function ShowPersonalInformation() {
            $arrayUsers = $this->userDAO->GetAllApi();
            $loggedUser = NULL;
            foreach ($arrayUsers as $key => $value) {
                if($value->getEmail()){
                    $loggedUser = $value;
                }
            }
            if($loggedUser != NULL && $loggedUser->getActive() == true) {
                if($loggedUser->getProfile() == 'Student') {
                    $_SESSION['loggedUser'] = $loggedUser;
                    require_once(VIEWS_PATH."userProfile.php");
                } 
            }
        }


        public function Login($user, $btnLogin) {
            $arrayUsers =  $this->userDAO->GetAll();
            $arrayStudents = $this->userDAO->GetAllApi();
            $loggedUser = NULL;

            foreach ($arrayUsers as $key => $value) {
                if($user == $value->getEmail()){
                    $loggedUser = $value;
                }
            }
            foreach ($arrayStudents as $key => $value) {
                if($user == $value->getEmail()){
                    $loggedUser = $value;
                }
            }
            if($loggedUser != NULL && $loggedUser->getActive() == true){
                if($loggedUser->getProfile() == 'Student') {
                    $_SESSION['loggedUser'] = $loggedUser;
                    $this->ShowProfileView();
                } else {
                    $_SESSION['loggedUser'] = $loggedUser;
                    require_once(VIEWS_PATH."vistaAdmin.php");
                }
            } else {
                require_once(VIEWS_PATH."index.php");
            }
        }

        public function Logout () {
			session_destroy();
			require_once(VIEWS_PATH."index.php");
        }

        public function Add($firstName, $lastName, $dni, $fileNumber, $gender, $birthDate, $email, $phoneNumber, $profile, $button) {
            $user = new User();
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setDni($dni);
            $user->setFileNumber($fileNumber);
            $user->setGender($gender);
            $user->setBirthDate($birthDate);
            $user->setEmail($email);
            $user->setPhoneNumber($phoneNumber);
            $user->setActive('active');
            $user->setProfile($profile);

            $this->userDAO->Add($user);
            $this->ShowAddView();
        }

        public function RemoveUser($userId) {
            $this->userDAO->Remove($userId);
    		$this->ShowProfileUserListView();
        }
    }
?>