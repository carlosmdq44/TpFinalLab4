<?php

    namespace Models;

    class Person {

        private $firstname;
        private $lastname;
        private $dni;
        private $gender;
        private $birthDate;
        private $email;
        private $phone;

        public function getFirstname() {
            return $this->firstname;
        }

        public function setFirstname($firstname) {
            $this->firstname = $firstname;
            return $this;
        }

        public function getLastname() {
            return $this->lastname;
        }

        public function setLastname($lastname) {
            $this->lastname = $lastname;
            return $this;
        }

        public function getDni() {
            return $this->dni;
        }

        public function setDni($dni) {
            $this->dni = $dni;
            return $this;
        }

        public function getBirthDate() {
            return $this->birthDate;
        }

        public function setBirthDate($birthDate) {
            $this->birthDate = $birthDate;
            return $this;
        }

        public function getGender() {
            return $this->gender;
        }

        public function setGender($gender) {
            $this->gender = $gender;
            return $this;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
            return $this;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function setPhone($phone) {
            $this->phone = $phone;
            return $this;
        }

    }
?>