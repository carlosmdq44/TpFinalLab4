<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;
    use DAO\Connection as Connection;

    class StudentDAO implements IStudentDAO {
        private $connection;
        private $studentList = array();
        private $tableName = "student";

        /****************************************** API ******************************************/

        private function RetrieveDataApi () {
            try {
                $ch = curl_init();
                if ($ch === false) {
                    throw new Exception('failed to initialize');
                }
                curl_setopt($ch, CURLOPT_URL, 'https://utn-students-api.herokuapp.com/api/Student');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-api-key:4f3bceed-50ba-4461-a910-518598664c08'));
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            
                $content = curl_exec($ch);
                $toJson = json_decode($content, true);
            
                if ($content === false) {
                    throw new Exception(curl_error($ch), curl_errno($ch));
                }
                $httpReturnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            
            } catch(Exception $e) {         
                trigger_error(sprintf(
                    'Curl failed with error #%d: %s',
                    $e->getCode(), $e->getMessage()),
                    E_USER_ERROR);
            }
            return $toJson;
        }

        /****************************************** BBDD ******************************************/
        
        private function mapear($studentList){

            $studentList=is_array($studentList)?$studentList:[];

            $studentArray =array_map(function($pos){
                $newStudent = new Student($pos['careerId'],$pos['firstName'],$pos['lastName'],$pos['dni'],$pos['fileNumber'],$pos['gender'],
                                        $pos['birthDate'],$pos['email'],$pos['phoneNumber']);//crear student
                $newStudent->setstudentId($pos['studentId']);

                return $newStudent;
            }, $studentList);
            return count($studentArray)>1? $studentArray:$studentArray['0'];
        }

        public function AddPDO(Student $student) {
            try {
                $query = "INSERT INTO " . $this->tableName . "(studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, active, profile) VALUES (:studentId, :careerId, :firstName, :lastName, :dni, :fileNumber, :gender, :birthDate, :email, :phoneNumber, :active, :profile);";
                $parameters['studentId'] = $student->getStudentId();
                $parameters['careerId'] = $student->getCareerId();
                $parameters['firstName'] = $student->getFirstName();
                $parameters['lastName'] = $student->getLastName();
                $parameters['dni'] = $student->getDni();
                $parameters['fileNumber'] = $student->getFileNumber();
                $parameters['gender'] = $student->getGender();
                $parameters['birthDate'] = $student->getBirthDate();
                $parameters['email'] = $student->getEmail();
                $parameters['phoneNumber'] = $student->getPhoneNumber();
                $parameters['active'] = $student->getActive();
                $parameters['profile'] = $student->getProfile();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        public function GetAllPDO() {
            try {
                $studentList = array();
                $query = "SELECT * FROM " . $this->tableName;
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($query);
                foreach($resultSet as $row) {
                    $student = new Student();
                    $student->setStudentId($row['studentId']);
                    $student->setCareerId($row['careerId']);
                    $student->setFirstName($row['firstName']);
                    $student->setLastName($row['lastName']);
                    $student->setDni($row['dni']);
                    $student->setFileNumber($row['fileNumber']);
                    $student->setGender($row['gender']);
                    $student->setBirthDate($row['birthDate']);
                    $student->setEmail($row['email']);
                    $student->setPhoneNumber($row['phoneNumber']);
                    $student->setActive($row['active']);
                    $student->setProfile($row['profile']);
                    array_push($studentList, $student);
                }
                return $studentList;
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        /***************************************************************************************************************/

        public function UpdateById($studentId, $careerId, $firstName, $lastName, $dni, $fileNumber, $gender, $birthDate, $email, $phoneNumber, $active, $profile) {
            try {
                $query = "UPDATE ".$this->tableName." SET studentId=:studentId, careerId=:careerId, firstName=:firstName , lastName=:lastName, dni=:dni, fileNumber=:fileNumber,
                gender=:gender, birthDate=:birthDate, email=:email, phoneNumber=:phoneNumber, active=:active, profile=:profile WHERE jobPositionId=:jobPositionId;";

                $parameters['studentId'] = $studentId;
                $parameters['careerId'] = $careerId;
                $parameters['firstName'] = $firstName;
                $parameters['lastName'] = $lastName;
                $parameters['dni'] = $dni;
                $parameters['fileNumber'] = $fileNumber;
                $parameters['gender'] = $gender;
                $parameters['birthDate'] = $birthDate;
                $parameters['email'] = $email;
                $parameters['phoneNumber'] = $phoneNumber;
                $parameters['active'] = $active;
                $parameters['profile'] = $profile;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        public function DeleteById($studentId) {

            $sql = "DELETE FROM student WHERE studentId=:studentId";
            $parameters['studentId'] = $studentId;
            try {
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            } catch (\PDOException $ex) {
                throw $ex;
            }
        }

        public function GetAllApi() {
            $jsonApi = $this->RetrieveDataApi();
            $studentList = array();

            foreach($jsonApi as $value) {
                $student = new Student();
                $student->setStudentId($value['studentId']);
                $student->setCareerId($value['careerId']);
                $student->setFirstName($value['firstName']);
                $student->setLastName($value['lastName']);
                $student->setDni($value['dni']);
                $student->setFileNumber($value['fileNumber']);
                $student->setGender($value['gender']);
                $student->setBirthDate($value['birthDate']);
                $student->setEmail($value['email']);
                $student->setPhoneNumber($value['phoneNumber']);
                $student->setActive($value['active']);
                $student->setProfile('Student');

                array_push($studentList,$student);
            }
            return $studentList;
        }

        public function GetApiByEmail ($email){
            $studentList = $this->GetAllApi();
            $student = null;

            foreach($studentList as $value){
                if ($value->getEmail() == $email){
                    $student = $value;
                }
            }
            return $student;
        }
    }

?>