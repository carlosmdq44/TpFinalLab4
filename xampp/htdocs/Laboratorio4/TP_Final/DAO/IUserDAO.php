<?php

    namespace DAO;
    use Models\User as User;

    interface IUserDAO {
        public function Add(User $newUser);
        public function GetAll();
        public function Get($email);
    }
    
?>