<?php
    namespace Controllers;

    use DAO\CompanyDAO as CompanyDAO;
    use Models\Company as Company;

    class CompanyController
    {
        private $companyDAO;

        public function __construct() {
            $this->companyDAO = new CompanyDAO();
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH."add-company.php");
        }

        public function ShowListView() {
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."company-list.php");
        }

        public function ShowListView2($companyId) {
            $arrayCompany = $this->companyDAO->GetAll();
            $loggedCompany = NULL;
            foreach ($arrayCompany as $key => $value) {
                if($companyId == $value->getCompanyId()){
                    $loggedCompany = $value;
                }
            }
            if($loggedCompany != NULL) {
                $_SESSION['loggedCompany'] = $loggedCompany;
                require_once(VIEWS_PATH."company-list2.php");
            } 
        }


        public function ShowListViewAdmin() {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-list-admin.php");
        }

        public function ShowListViewStudent() {
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."student-company.php");
        }

        public function ShowModifyView() {
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."modify-company.php");
        }

        public function redirectionCompany() {
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."vistaCompany.php");
        }

        public function Add($companyName,$cuit, $companyCity, $companyDescription, $companyEmail, $companyPhoneNumber, $button) {
            $company = new Company();
            $company->setCompanyName($companyName);
            $company->setCompanyCuit($cuit);
            $company->setCompanyCity($companyCity);
            $company->setCompanyDescription($companyDescription);
            $company->setCompanyEmail($companyEmail);
            $company->setCompanyPhoneNumber($companyPhoneNumber);

            $this->companyDAO->Add($company);
            $this->ShowAddView();
        }

        public function RemoveCompany($companyId) {
            $this->companyDAO->Remove($companyId);
    		$this->ShowListViewAdmin();
        }

        public function ModifyCompany($companyId, $companyName, $companyCity, $companyDescription, $companyEmail, $companyPhoneNumber, $button) {
            $arrayCompany = $this->companyDAO->GetAll();
            $loggedCompany = NULL;
            foreach ($arrayCompany as $key => $value) {
                if($value->getCompanyId()){
                    $loggedCompany = $value;
                }
            }
            if($loggedCompany != NULL) {
                if(($this->companyDAO->GetByCompanyId($companyId))){
                    $modify = new Company();
                    $modify->setCompanyName($companyName);
                    $modify->setCompanyCity($companyCity);
                    $modify->setCompanyDescription($companyDescription);
                    $modify->setCompanyEmail($companyEmail);
                    $modify->setCompanyPhoneNumber($companyPhoneNumber);
        
                } 
            }
            $this->companyDAO->Update($modify);
            $this->ShowListViewAdmin();
        }

        /*
        public function ModifyCompany($companyName, $companyCity, $companyDescription, $companyEmail, $companyPhoneNumber, $button)
        {
            if(($this->companyDAO->GetByCompanyName($companyName))){
                $modify = new Company();
                $modify->setCompanyName($companyName);
                $modify->setCompanyCity($companyCity);
                $modify->setCompanyDescription($companyDescription);
                $modify->setCompanyEmail($companyEmail);
                $modify->setCompanyPhoneNumber($companyPhoneNumber);
    
                $this->companyDAO->update($modify);
            } 
            $this->ShowListViewAdmin();
        }*/
    }
?>