<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;

    class UserDAO implements IUserDAO {
        private $connection;
        private $userList = array();
        private $tableName = "user";

        /****************************************** BBDD ******************************************/

        public function AddPDO(User $user) {
            try {

                $query = "INSERT INTO ". $this->tableName ." (email, password) VALUES (:email, :password);";
                $parameters['email'] = $user->getEmail();
                $parameters['password'] = $user->getPassword();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch(Exception $ex) {
                throw $ex;
            }
        }
        
        public function GetAllPDO() {
            try {
                $userList = array();
                $query = "SELECT * FROM " . $this->tableName;
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($query);
                foreach($resultSet as $row) {
                    $user = new User();
                    $user->setEmail($row['email']);
                    $user->setPassword($row['password']);
                    array_push($userList, $user);
                }
                return $userList;
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        /***************************************************************************************************************/

        public function UpdateByEmail($email, $password) {
            try {
                $query = "UPDATE ".$this->tableName." SET email=:email, password=:password WHERE email=:email;";

                $parameters['email'] = $email;
                $parameters['password'] = $password;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        public function DeleteByEmail($email) {

            $sql = "DELETE FROM user WHERE email=:email";
            $parameters['email'] = $email;
            try {
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            } catch (\PDOException $ex) {
                throw $ex;
            }
        }

        public function Add(User $user) {
            $this->RetrieveData();
            array_push($this->userList, $user);
            $this->SaveData();
        }

    }

?>