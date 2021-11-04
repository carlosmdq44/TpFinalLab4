<?php namespace Models;

    class JobOffer {

        private $jobOfferId;
        private $title;
        private $publishedDate;
        private $finishDate;
        private $task;
        private $skills;
        private $salary;
        private $jobPositionId; //relation one to one
        private $companyId;
        
        public function getJobOfferId() { return $this->jobOfferId; }
        public function getTitle() { return $this->title; }
        public function getPublishedDate() { return $this->publishedDate; }
        public function getFinishDate() { return $this->finishDate; }
        public function getTask() { return $this->task; }
        public function getSkills() { return $this->skills; }
        public function getSalary() { return $this->salary; }
        public function getJobPosition() { return $this->jobPositionId; }
        public function getCompanyId() { return $this->companyId; }

        public function setJobOfferId($jobOfferId) { $this->jobOfferId = $jobOfferId; }
        public function setTitle($title) { $this->title = $title; }
        public function setPublishedDate($publishedDate) { $this->publishedDate = $publishedDate; }
        public function setFinishDate($finishDate) { $this->finishDate = $finishDate; }
        public function setTask($task) { $this->task = $task; }
        public function setSkills($skills) { $this->skills = $skills; }
        public function setSalary($salary) { $this->salary = $salary; }
        public function setJobPosition($jobPositionId) { $this->jobPositionId = $jobPositionId; }
        public function setCompanyId($companyId) { $this->companyId = $companyId; }

    }

?>