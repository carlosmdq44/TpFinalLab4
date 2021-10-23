<?php

    namespace DAO;
    
    use DAO\ICompanyDAO as ICompanyDAO;
    use Models\Company as Company;

    class CompanyDAO implements ICompanyDAO {
        private $companyList = array();
        private $fileName;

        public function __construct() {
            $this->fileName = dirname(__DIR__)."/Data/Company.json";  
        }

        private function retriveData() {
            $this->companyList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                $jsonDecode = ($jsonContent) ? json_decode($jsonContent , true) : array();
                foreach($jsonDecode as $company){
                    $newCompany = new Company();
                    $newCompany->setCompanyId($company['companyId']);
                    $newCompany->setCompanyCuit($company['cuit']);
                    $newCompany->setCompanyName($company['companyName']);
                    $newCompany->setCompanyCity($company['companyCity']);
                    $newCompany->setCompanyDescription($company['companyDescription']);
                    $newCompany->setCompanyEmail($company['companyEmail']);
                    $newCompany->setCompanyPhoneNumber($company['companyPhoneNumber']);
                    array_push($this->companyList , $newCompany);
                }
            }
        }

        private function saveData() {
            $jsonEncode = array();

            foreach($this->companyList as $company) {
                $valuesCompany = array();

                $valuesCompany['companyId'] = $company->getCompanyId();
                $valuesCompany['cuit'] = $company->getCompanyCuit();
                $valuesCompany['companyName'] = $company->getCompanyName();
                $valuesCompany['companyCity'] = $company->getCompanyCity();
                $valuesCompany['companyDescription'] = $company->getCompanyDescription();
                $valuesCompany['companyEmail'] = $company->getCompanyEmail();
                $valuesCompany['companyPhoneNumber'] = $company->getCompanyPhoneNumber();

                array_push($jsonEncode , $valuesCompany);
            }
            $jsonContent = json_encode($jsonEncode , JSON_PRETTY_PRINT);
            file_put_contents($this->fileName ,$jsonContent);
        }

        /********************************************************************************************/
        
        public function Add(Company $newCompany) {
            $this->retriveData();
            $newCompany->setCompanyId($this->getCompanyLastId());
            array_push($this->companyList, $newCompany);
            $this->saveData();
        }

        public function Remove($companyId) {
            $this->retriveData();
            $this->companyList = array_filter($this->companyList, function($company) use($companyId){
                return $company->getCompanyId() != $companyId;
            });
            $this->saveData();
        }

        public function Get($id) {
            $this->retriveData();
            return $this->companyList[$id];
        }

        public function getAll() {
            $this->retriveData();
            return $this->companyList;            
        }

        public function Update($newCompany) {
            $this->retriveData();
            foreach ($this->companyList as $company) {
                if ($company->getIdCompany() == $newCompany->getCompanyId()){
                    $key = array_search($company, $this->companyList);
                    $this->companyList[$key] = $newCompany;
    
                }
            }
            $this->saveData();
        }
        
        public function GetByCompanyName($copanyName) {
            $this->retriveData();
            foreach($this->companyList as $company){
                if(strcmp($company->getCompanyName(), $copanyName) == 0){
                    $companyCheck = $company;
                } else {
                    $companyCheck = null;
                }
            }
            return $companyCheck;
        }
        

        public function GetByCompanyId($idCompany) {
            $this->retriveData();
            foreach($this->companyList as $company){
                if($company->getCompanyId() == $idCompany){
                    $companyCheck = $company;
                } else {
                    $companyCheck = null;
                }
            }
            return $companyCheck;
        }

        private function getCompanyLastId() {
            $id = 0;
            foreach($this->companyList as $company) {
                $id = ($company->getCompanyId() > $id) ? $company->getCompanyId() : $id;
            }
            return $id + 1;
        }
    

    }
?>