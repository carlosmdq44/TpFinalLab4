<?php
    namespace Controllers;

    use DAO\JobOfferDAO as JobOfferDAO;
    use DAO\JobDAO as JobDAO;
    use DAO\StudentDAO as StudentDAO;

    use DAO\CompanyDAO as CompanyDAO;
    use DAO\UserDAO as UserDAO;
    use Models\Job as Job;
    use Models\JobOffer as JobOffer;
    use Models\Company as Company;
    use Models\Student as Student;

    class JobOfferController
    {
        private $JobOfferDAO;
        private $JobDAO;
        private $CompanyDAO;
        private $StudentDAO;

        public function __construct() {
            $this->JobOfferDAO = new JobOfferDAO();
            $this->JobDAO = new JobDAO();
            $this->CompanyDAO = new CompanyDAO();
            $this->StudentDAO = new StudentDAO ();
        }

        public function ShowAddView() {
            $jobList = $this->JobDAO->GetAll();
            if($jobList == null){
                $jobList = $this->JobDAO->getAllApi();
            }
            $companyList = $this->CompanyDAO->GetAll();
            require_once(VIEWS_PATH."add-jobOffer.php");
        }
        
        public function ShowProfileView() {
            $jobOfferList = $this->JobOfferDAO->GetAll();
            require_once(VIEWS_PATH."jobOffer-list.php");
        }

        public function ShowListView() {
            $student = $this->StudentDAO->GetApiByEmail($_SESSION['loggedStudent']->getEmail());
            $jobOfferList = $this->JobOfferDAO->GetJobOfferStudent($student->getCareerId());
            require_once(VIEWS_PATH."jobOffer-student-list.php");
        }

        public function ShowListStudent() {
            $student = $this->UserDAO->GetApiByEmail($_SESSION['loggedStudent']->getEmail());
            $jobOfferList = $this->JobOfferDAO->GetJobOfferStudent($student->getCareerId());
            require_once(VIEWS_PATH."jobOffer-listStudent.php");
        }
 
        public function Add($companyName, $title, $publishedDate, $finishDate, $task, $skills, $salary, $jobPositionId,$companyId, $button) {
            $jobOffer = new JobOffer();
            $company = new Company();
            $company = $this->CompanyDAO->GetByName($companyName);
            $jobOffer->setTitle($title);
            $jobOffer->setPublishedDate($publishedDate);
            $jobOffer->setFinishDate($finishDate);
            $jobOffer->setTask($task);
            $jobOffer->setSkills($skills);
            $jobOffer->setSalary($salary);
            $jobOffer->setJobPosition($jobPositionId);
            $jobOffer->setCompanyId($company[0]->getCompanyId());
            //$jobOffer->setCompanyId($companyId);

            $this->JobOfferDAO->AddPDO($jobOffer);
            $this->ShowAddView();
        }

        public function ShowModifyView($jobOfferId) {
            $arrayJobOffer = $this->JobOfferDAO->GetAll();
            $loggedJobOffer = NULL;
            foreach ($arrayJobOffer as $key => $value) {
                if($jobOfferId == $value->getJobOfferId()) {
                    $loggedJobOffer = $value;
                }
            }
            if($loggedJobOffer != NULL) {
                $_SESSION['loggedJobOffer'] = $loggedJobOffer;
                require_once(VIEWS_PATH."modify-jobOffer.php");
            }
        }

        public function ModifyJobOffer($jobOfferId, $title, $publishedDate, $finishDate, $task, $skills, $salary, $jobPositionId,$companyId, $button) {
            $this->JobOfferDAO->UpdateById($jobOfferId, $title, $publishedDate, $finishDate, $task, $skills, $salary, $jobPositionId,$companyId);
            $this->ShowProfileView();
        }

        public function DeleteJobOffer($jobOfferId) {
            $this->JobOfferDAO->DeleteById($jobOfferId);
    		$this->ShowProfileView();
        }
        
    }
?>