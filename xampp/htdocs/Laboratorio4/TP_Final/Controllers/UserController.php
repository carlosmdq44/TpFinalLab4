<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController
    {
        private $UserDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."user-add.php");
        }

        public function ShowListView()
        {
            $userList = $this->userDAO->GetAll();

            require_once(VIEWS_PATH."user-list.php");
        }

        public function Add($email, $password, $btn)
        {
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);

            $this->userDAO->Add($user);

            $this->ShowAddView();
        }
    }
?>