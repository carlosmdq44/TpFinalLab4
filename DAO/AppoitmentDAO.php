<?php namespace DAO;
    
    use \Exception as Exception;
    use DAO\IAppoitmentDAO as IAppoitmentDAO;
    use Models\Appoitment as Appoitment;

    class AppoitmentDAO implements IAppoitmentDAO {
        private $appoitmentList = array();
        private $connection;
        private $tableName = "appoitment";

      
        /****************************************** BBDD ******************************************/

        public function AddPDO(Appoitment $appoitment) {
            try {
                $query = "INSERT INTO ".$this->tableName." (studentId,jobOfferId, cv, message) 
                    VALUES (:studentId, :jobOfferId, :cv, :message);";
                    $parameters['studentId'] = $appoitment->getStudentId();
                    $parameters['jobOfferId'] = $appoitment->getJobOfferId();
                    $parameters['cv'] = $appoitment->getCv();
                    $parameters['message'] = $appoitment->getMessage();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        public function GetAllPDO() {
            try {
                $appoitmentList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row) {                
                    $newAp = new Appoitment();
                    $newAp->setStudentId($row['studentId']);
                    $newAp->setJobOfferId($row['jobOfferId']);
                    $newAp->setCv($row['cv']);
                    $newAp->setMessage($row['message']);
                    array_push($this->appoitmentList , $newAp);
                }
                return $appoitmentList;
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        /***************************************************************************************************************/

        public function UpdateById($studentId, $jobOfferId, $cv, $message, $name) {
            try {
                $query = "UPDATE ".$this->tableName." SET studentId=:studentId, jobOfferId=:jobOfferId, cv=:cv,  message=:message, name=:name WHERE studentId=:studentId;";

                $parameters["studentId"] = $studentId;
                $parameters["jobOfferId"] = $jobOfferId;
                $parameters["cv"] = $cv;
                $parameters["message"] = $message;
                $parameters["name"] = $name;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        public function DeleteById($studentId) {

            $sql = "DELETE FROM appoitment WHERE studentId=:studentId";
            $parameters['studentId'] = $studentId;
            try {
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            } catch (\PDOException $ex) {
                throw $ex;
            }
        }
        
        public function GetAll() {
            $this->GetAllPDO();
            return $this->companyList;            
        }

    }
?>