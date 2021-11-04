<?php namespace Models;

    class Appoitment {

        private $studentId;
        private $jobOfferId;
        private $cv;
        private $message;

        public function getStudentId() { return $this->studentId; }
        public function getJobOfferId() { return $this->jobOfferId; }
        public function getCv() { return $this->cv; }
        public function getMessage() { return $this->message; }

        public function setStudentId($studentId) { $this->studentId = $studentId; }
        public function setJobOfferId($jobOfferId) { $this->jobOfferId = $jobOfferId; }
        public function setCv($cv) { $this->cv = $cv; }
        public function setMessage($message) { $this->message = $message; }

    }

?>