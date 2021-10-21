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
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ShowListView()
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-list.php");
        }

        public function redirectionCompany() {
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."vistaCompany.php");
        }

        public function redirectionUser() {
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."vistaUser.php");
        }


        public function Add($companyName, $companyCity, $companyDescription, $companyEmail, $companyPhoneNumber, $button)
        {
            $company = new Company();
            $company->setCompanyName($companyName);
            $company->setCompanyCity($companyCity);
            $company->setCompanyDescription($companyDescription);
            $company->setCompanyEmail($companyEmail);
            $company->setCompanyPhoneNumber($companyPhoneNumber);

            $this->companyDAO->Add($company);

            $this->ShowAddView();
        }

        public function DeleteCompany($idCompany) {
            $company = $this->companyDAO->GetByCompanyId($idCompany);
            $this->companyDAO->Remove($idCompany);
            $this->ShowListView();
        }
        
    }
?>