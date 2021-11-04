<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use DAO\JobDAO as JobDAO;
    use Models\Student as Student;
    use Models\Job as Job;

    class StudentController {
        private $studentDAO;
        private $jobDAO;

        public function __construct() {
            $this->studentDAO = new StudentDAO();
            $this->jobDAO = new JobDAO();
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH."add-student.php");
        }

        public function ShowProfileStudentListView() {
            $studentListapi = $this->studentDAO->GetAllApi();
            $studentListpdo = $this->studentDAO->GetAllPDO();
            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowProfileCvView() {
            $studentListapi = $this->studentDAO->GetAllApi();
            $studentListpdo = $this->studentDAO->GetAllPDO();
            require_once(VIEWS_PATH."cv.php");
        }

        public function ShowProfileStudentView() {
            require_once(VIEWS_PATH."vistaStudentAdmin.php");
        }

        public function ShowProfileUserView() {
            require_once(VIEWS_PATH."vistaUserAdmin.php");
        }
        
        public function ShowProfileView() {
            require_once(VIEWS_PATH."vistaStudent.php");
        }

        public function ShowProfileView2() {
            require_once(VIEWS_PATH."students-list.php");
        }


        public function ShowJobPostulate($jobPositionId) {
            //$arrayJob = $this->jobDAO->GetAll();
            $arrayJobpdo = $this->jobDAO->GetAllPDO();
            $arrayStudentApi = $this->studentDAO->GetAllApi();
            $arrayStudentPdo = $this->studentDAO->GetAllPDO();
            $loggedStudent = NULL;
            //$loggedJob = NULL;
            foreach ($arrayJobpdo as $key => $value) {
                if($jobPositionId == $value->getJobPositionId()) {
                    $loggedStudent = $value;
                }
            }
            foreach ($arrayStudentPdo as $key => $value) {
                $loggedStudent = $value;
            }
            foreach ($arrayStudentApi as $key => $value) {
                $loggedStudent = $value;
            }
            
            foreach ($arrayJobpdo as $key => $value) {
                if($jobPositionId == $value->getJobPositionId()) {
                    $loggedJob = $value;
                }
            }
            
            if($loggedJob != NULL && $loggedStudent != NULL) {
                $_SESSION['loggedStudent'] = $loggedStudent;
                $_SESSION['loggedJob'] = $loggedJob;
                require_once(VIEWS_PATH."studentProfile.php");
            }
        }

        /***
         *  MUESTRA LA INFORMACION PERSONAL DEL ESTUDIANTE
         */

        public function ShowPersonalInformation() {
            $arrayStudent = $this->studentDAO->GetAllApi();
            $arrayStudentpdo = $this->studentDAO->GetAllPDO();
            $loggedStudent = NULL;
            foreach ($arrayStudent as $key => $value) {
                if($value->getEmail()){
                    $loggedStudent = $value;
                }
            }/*
            foreach ($arrayStudentpdo as $key => $value) {
                if($value->getEmail()){
                    $loggedStudent = $value;
                }
            }*/
            if($loggedStudent != NULL && $loggedStudent->getActive() == true) {
                if($loggedStudent->getProfile() == 'Student') {
                    $_SESSION['loggedStudent'] = $loggedStudent;
                    require_once(VIEWS_PATH."studentProfile.php");
                } 
            }
        }

        public function SearchFilter($lastname) {
            $studentListapi = $this->studentDAO->GetAllApi();
            $studentFilter = array();
            foreach ($studentListapi as $student) {
                if($lastname !== ""){
                    if (strpos($student->getLastName(), $lastname) !== false) {
                        array_push($studentFilter, $student);
                    }
                    $studentListapi = $studentFilter;
                }
            }
            if(empty($studentListapi)) {
                echo("
                    <script>
                        alert('No hay empresas con el nombre ingresado');
                    </script>
                ");
            }
            require_once(VIEWS_PATH."student-list.php");
        }
        

        /***
         *  LOGUEO
         */

        private function validateSession($array, $email, $password) {
            $student = NULL;
            foreach($array as $key=>$value) {
                if($email == $value->getEmail() && $password == $value->getPassword()) {
                    $student = $value;
                }
            }
            return $student;
        }

        public function Login($student, $btnLogin) {
            $arrayStudentApi = $this->studentDAO->GetAllApi();
            $arrayStudentPdo = $this->studentDAO->GetAllPDO();
            $loggedStudent = NULL;

            
            foreach ($arrayStudentPdo as $key => $value) {
                if($student == $value->getEmail()){
                    $loggedStudent = $value;
                }
            }

            foreach ($arrayStudentApi as $key => $value) {
                if($student == $value->getEmail()){
                    $loggedStudent = $value;
                }
            }

            if($loggedStudent != NULL && $loggedStudent->getActive() == true){
                if($loggedStudent->getProfile() == 'Student') {
                    $_SESSION['loggedStudent'] = $loggedStudent;
                    $this->ShowProfileView();
                } else {
                    $_SESSION['loggedStudent'] = $loggedStudent;
                    require_once(VIEWS_PATH."vistaAdmin.php");
                }
            } else {
                echo "<script> if(alert('The user is incorrect')); </script>";
                require_once(VIEWS_PATH."index.php");
            }
        }

        public function Logout () {
			session_destroy();
			require_once(VIEWS_PATH."index.php");
        }

        /***
         *  AGREGA EL USUARIO
         */

        public function Add($careerId, $firstName, $lastName, $dni, $fileNumber, $gender, $birthDate, $email, $phoneNumber, $button) {
            $student = new Student();
            $student->setCareerId($careerId);
            $student->setFirstName($firstName);
            $student->setLastName($lastName);
            $student->setDni($dni);
            $student->setFileNumber($fileNumber);
            $student->setGender($gender);
            $student->setBirthDate($birthDate);
            $student->setEmail($email);
            $student->setPhoneNumber($phoneNumber);
            $student->setActive('active');
            $student->setProfile('Student');
            //$student->setProfile($profile);

            $this->studentDAO->AddPDO($student);
            $this->ShowAddView();
        }

    }
?>