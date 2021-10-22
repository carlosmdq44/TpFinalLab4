<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."home.php");
        }

        public function IndexAdmin($message = "") {
            require_once(VIEWS_PATH."vistaAdmin.php");
        }

        public function IndexCompany($message = "") {
            require_once(VIEWS_PATH."vistaCompany.php");
        }

        public function IndexUser($message = "") {
            require_once(VIEWS_PATH."vistaUser.php");
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

        public function Logout4() {
            session_destroy();
            $this->IndexUser();
        }
    }
?>