<?php

    namespace DAO;
    use Models\Student as Student;

    interface IStudentDAO {
        public function Add(Student $newStudent);
        public function GetAll();
        public function Get($id);
        public function Remove($id);
        public function Update($newStudent);
    }
    
?>