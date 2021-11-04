<?php namespace Controllers;

    use DAO\AppoitmentDAO as AppoitmentDAO;
    use Models\Company as Company;
    use Models\Appoitment as Appoitment;
    use Models\JobOffer as JobOffer;
    use Models\Job as Job;

    use DAO\JobOfferDAO as JobOfferDAO;
    use DAO\JobDAO as JobDAO;
    use DAO\CompanyDAO as CompanyDAO;
    use DAO\UserDAO as UserDAO;


    class CompanyController {
        private $appoitmentDAO;
        private $JobOfferDAO;
        private $JobPositionDAO;
        private $CompanyDAO;
        private $UserDAO;


        public function __construct() {
            
            $this->jobOfferDAO = new JobOfferDAO();
            $this->JobDAO = new JobDAO();
            $this->CompanyDAO = new CompanyDAO();
            $this->UserDAO = new UserDAO ();
            $this->appoitmentDAO = new AppoitmentDAO();
        }


        public function ShowAddView() {
            
            $jobPositionList = $this->JobDAO->GetAllPDO();
            if($jobPositionList == null){
                $jobPositionList = $this->JobPositionDAO->getAllApi();
            }
            $companyList = $this->CompanyDAO->GetAllPDO();
            require_once(VIEWS_PATH."add-appoitment.php");
        }


        public function ShowListView() {
            
            $appoitmentList = $this->appoitmentDAO->GetAllPDO();
            require_once(VIEWS_PATH."appoitment-list.php");
        }

        public function Add($companyName, $jobPositionId, $publishedDate, $salary, $skills)
        {
            $jobOffer = new JobOffer();
            $company = new Company();
            $company = $this->CompanyDAO->GetByName($companyName);
            $jobOffer->setCompanyId($company[0]->getCompanyId());
            $jobOffer->setJobPositionId($jobPositionId);
            $jobOffer->getPublishedDate($publishedDate);
            $jobOffer->setSalary($salary);
            $jobOffer->setSkills($skills);
            $this->jobOfferDAO->AddPDO($jobOffer);
            $this->ShowAddView();
        }
/*
        public function Add($studentId, $jobOfferId, $cv, $message, $button) {
            $appoitment = new Appoitment();
            $appoitment->setStudentId($studentId);
            $appoitment->setJobOfferId($jobOfferId);
            $appoitment->setCv($cv);
            $appoitment->setMessage($message);

            $this->appoitmentDAO->AddPDO($appoitment);
            $this->ShowAddView();
        }
*//*
        public function ModifyCompany($studentId, $jobOfferId, $cv, $message, $name, $button) {
            $this->companyDAO->UpdateById($studentId, $jobOfferId, $cv, $dateDesignation, $reference);
            $this->ShowListView();
        }

        public function DeleteCompany($studentId) {
            $this->companyDAO->DeleteById($studentId);
    		$this->ShowListView();
        }
*/
    }
    
?>