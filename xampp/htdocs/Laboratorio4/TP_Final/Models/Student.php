<?php

    namespace Models;

    class Student extends Person {

        private $studentId;
        private $careerId;
        private $active;

        public function getStudentId() {
            return $this->studentId;
        }

        public function setStudentId($studentId) {
            $this->studentId = $studentId;
            return $this;
        }

        public function getCareerId() {
            return $this->careerId;
        }

        public function setCareerId($careerId) {
            $this->careerId = $careerId;
            return $this;
        }

        public function getActive() {
            return $this->active;
        }

        public function setActive($active) {
            $this->active = $active;
            return $this;
        }
 
    }   
?>

