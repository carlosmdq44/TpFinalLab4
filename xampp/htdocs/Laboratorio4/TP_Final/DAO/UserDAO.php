<?php

    namespace DAO;
    
    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;

    class UserDAO implements IUserDAO {
        private $userList = array();
        private $fileName;

        public function __construct() {
            $this->fileName = dirname(__DIR__)."/Data/Users.json";  
        }

        private function retriveData() {
            $this->userList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                $jsonDecode = ($jsonContent) ? json_decode($jsonContent , true) : array();
                foreach($jsonDecode as $user){
                    $newUser = new User();
                    $newUser->setEmail($user['email']);
                    $newUser->setPassword($user['password']);
                    array_push($this->userList , $newUser);
                }
            }
        }

        private function saveData() {
            $jsonEncode = array();

            foreach($this->userList as $user) {
                $valuesUser = array();

                $valuesUser['email'] = $user->getEmail();
                $valuesUser['password'] = $user->getPassword();

                array_push($jsonEncode , $valuesUser);
            }
            $jsonContent = json_encode($jsonEncode , JSON_PRETTY_PRINT);
            file_put_contents($this->fileName ,$jsonContent);
        }
        
        public function Add(User $newUser) {
            $this->retriveData();
            array_push($this->userList, $newUser);
            $this->saveData();
            
        }

        public function Get($email) {
            $this->retriveData();
            return $this->userList[$email];
        }

        public function getAll() {
            $this->retriveData();
            return $this->userList;            
        }
    
    }
?>