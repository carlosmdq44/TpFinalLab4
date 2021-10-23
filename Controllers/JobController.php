<?php
    namespace Controllers;

    use DAO\JobDAO as JobDAO;
    use Models\Job as Job;

    class JobController
    {
        private $jobDAO;

        public function __construct() {
            $this->jobDAO = new JobDAO();
        }
        
        public function ShowAddView() {
            require_once(VIEWS_PATH."job-add.php");
        }

        public function ShowProfileView() {
            $jobList = $this->jobDAO->GetAll();
            require_once(VIEWS_PATH."vistaJobs.php");
        }

        public function ShowProfileView2() {
            require_once(VIEWS_PATH."students-list.php");
        }

        public function ShowProfileView3() {
            
            require_once(VIEWS_PATH."vistaPostulaciones.php");
        }

        public function ShowProfileViewAdmin() {
            $jobList = $this->jobDAO->GetAll();
            require_once(VIEWS_PATH."vistaJobAdmin.php");
        }

        public function Logout () {
			session_destroy();
			require_once(VIEWS_PATH."index.php");
        }

        public function Add($description) {
            $job = new Job();
            $job->setDescription($description);
            
            $this->jobDAO->Add($job);
            $this->ShowAddView();
        }

    }
?>