<?php
    namespace Controllers;

    class StudentsHomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."student-add.php");
        }        
    }
?>