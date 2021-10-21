<?php

    namespace DAO;
    
    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;

    class StudentDAO implements IStudentDAO {
        private $studentList = array();
        private $fileName;

        public function __construct() {
            $this->fileName = dirname(__DIR__)."/Data/Students.json";  
        }

        private function retriveData() {
            $this->studentList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                $jsonDecode = ($jsonContent) ? json_decode($jsonContent , true) : array();
                foreach($jsonDecode as $student){
                    $newStudent = new Student();
                    $newStudent->setStudentId($student['studentId']);
                    $newStudent->setCareerId($student['careerId']);
                    $newStudent->setFirstname($student['firstname']);
                    $newStudent->setLastname($student['lastname']);
                    $newStudent->setDni($student['dni']);
                    $newStudent->setGender($student['gender']);
                    $newStudent->setBirthDate($student['birthDate']);
                    $newStudent->setEmail($student['email']);
                    $newStudent->setPhone($student['phone']);
                    $newStudent->setActive($student['active']);

                    array_push($this->studentList , $newStudent);
                }
            }
        }

        private function saveData() {
            $jsonEncode = array();

            foreach($this->studentList as $student) {
                $valuesStudent = array();

                $valuesStudent['studentId'] = $student->getStudentId();
                $valuesStudent['careerId'] = $student->getCareerId();
                $valuesStudent['firstname'] = $student->getFirstname();
                $valuesStudent['lastname'] = $student->getLastname();
                $valuesStudent['dni'] = $student->getDni();
                $valuesStudent['gender'] = $student->getGender();
                $valuesStudent['birthDate'] = $student->getBirthDate();
                $valuesStudent['email'] = $student->getEmail();
                $valuesStudent['phone'] = $student->getPhone();
                $valuesStudent['active'] = $student->getActive();

                array_push($jsonEncode , $valuesStudent);
            }
            $jsonContent = json_encode($jsonEncode , JSON_PRETTY_PRINT);
            file_put_contents($this->fileName ,$jsonContent);
        }
        
        public function Add(Student $newStudent) {
            $this->retriveData();
            array_push($this->studentList, $newStudent);
            $this->saveData();
            
        }

        public function Remove($id) {
            $this->retriveData();
            unset($this->studentList[$id]);
        }

        public function Get($id) {
            $this->retriveData();
            return $this->studentList[$id];
        }

        public function getAll() {
            $this->retriveData();
            return $this->studentList;            
        }

        public function update($newStudent) {
            $this->retriveData();
            $studentList[$newStudent->getStudentId()] = $newStudent;
            $this->saveData();
        }

        private function GetNextId() {
            $studentId = 0;
            foreach($this->studentList as $student) {
                $studentId = ($student->getStudentId() > $studentId) ? $student->getStudentId() : $studentId;
            }
            return $studentId + 1;
        }

    }
?>