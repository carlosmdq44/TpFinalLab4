<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentsController
    {
        private $studentDAO;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $studentList = $this->studentDAO->GetAll();

            require_once(VIEWS_PATH."student-list.php");
        }

        public function Add($firstName, $lastName, $dni, $birthDate, $gender, $email, $phone, $active)
        {
            $student = new Student();
            $student->setFirstname($firstName);
            $student->setLastname($lastName);
            $student->setDni($dni);
            $student->setBirthDate($birthDate);
            $student->setGender($gender);
            $student->setEmail($email);
            $student->setPhone($phone);
            $student->setActive($active);

            $this->studentDAO->Add($student);

            $this->ShowAddView();
        }
    }
?>