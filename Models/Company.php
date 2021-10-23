<?php
        namespace Models;

        class Company{

                private $companyId;
                private $cuit;
                private $companyName;
                private $companyCity;
                private $companyDescription;
                private $companyEmail;
                private $companyPhoneNumber;

                public function getCompanyId() 
                {
                return $this->companyId;
                }

                public function setCompanyId($companyId)
                {
                $this->companyId = $companyId;
                return $this;
                }

                public function getCompanyCuit() { return $this->cuit; }

                public function setCompanyCuit($cuit) { $this->cuit = $cuit; }

                public function getCompanyName()
                {
                return $this->companyName;
                }

                public function setCompanyName($companyName)
                {
                        $this->companyName = $companyName;
                        return $this;
                }

                public function getCompanyCity()
                {
                return $this->city;
                }

                public function setCompanyCity($city)
                {
                $this->city = $city;

                return $this;
                }

                public function getCompanyDescription()
                {
                return $this->description;
                }

                public function setCompanyDescription($description)
                {
                $this->description = $description;

                return $this;
                }

                public function getCompanyEmail()
                {
                return $this->email;
                }

                public function setCompanyEmail($email)
                {
                $this->email = $email;

                return $this;
                }

                public function getCompanyPhoneNumber()
                {
                return $this->phoneNumber;
                }

                public function setCompanyPhoneNumber($phoneNumber)
                {
                $this->phoneNumber = $phoneNumber;

                return $this;
                }
        }

?>