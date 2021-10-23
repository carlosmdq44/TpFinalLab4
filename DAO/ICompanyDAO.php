<?php

    namespace DAO;
    use Models\Company as Company;

    interface ICompanyDAO {
        public function Add(Company $newCompany);
        public function GetAll();
        public function Get($id);
        public function Remove($id);
        public function Update(Company $newCompany);
        public function GetByCompanyId($idCompany);
    }
    
?>