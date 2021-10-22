<?php
    namespace Controllers;

    use DAO\CompanyDAO as CompanyDAO;
    use Models\Company as Company;

    class CompanyController
    {
        private $companyDAO;

        public function __construct()
        {
            $this->companyDAO = new CompanyDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."add-company.php");
        }

        public function ShowListView()
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-list.php");
        }

        public function ShowListViewAdmin()
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-list-admin.php");
        }

        public function ShowListViewStudent()
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."student-company.php");
        }

        public function ShowModifyView()
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."modify-company.php");
        }

        public function redirectionCompany() {
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."vistaCompany.php");
        }

        public function Add($companyName, $companyCity, $companyDescription, $companyEmail, $companyPhoneNumber, $button) {
            $company = new Company();
            $company->setCompanyName($companyName);
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


        public function ModifyCompany($companyId, $companyName, $companyCity, $companyDescription, $companyEmail, $companyPhoneNumber, $button)
        {
            if($this->companyDAO->GetByCompanyId($companyId) != null){
                $companyModify = new Company();
                $companyModify->setCompanyName($companyName);
                $companyModify->setCompanyCity($companyCity);
                $companyModify->setCompanyDescription($companyDescription);
                $companyModify->setCompanyEmail($companyEmail);
                $companyModify->setCompanyPhoneNumber($companyPhoneNumber);
    
                $this->companyDAO->update($companyModify);
            } else {
                echo "<script> if(alert('No existe la empresa a modificar')); </script>";
            }
            $this->ShowListViewAdmin();
        }
    }
?>