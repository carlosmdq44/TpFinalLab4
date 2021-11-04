<?php namespace DAO;

    use Models\Student as Student;

    interface IStudentDAO {

        function GetAllApi ();
        function GetApiByEmail ($email);
    }
?>