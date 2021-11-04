<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IJobDAO as IJobDAO;
    use Models\Job as Job;

    class JobDAO implements IJobDAO {
        private $connection;
        private $jobList = array();
        private $tableName = "job";

        
        /****************************************** API ******************************************/

        private function consumeFromApi() {
            $this->jobList = array();
            $options = array(
                'http' => array(
                'method'=>"GET",
                'header'=>"x-api-key: " . API_KEY)
            );
            $context = stream_context_create($options);
            $response = file_get_contents(API_URL .'JobPosition', false, $context);
            $arrayToDecode = json_decode($response, true);
            foreach($arrayToDecode as $valuesArray) {
                $job = new Job ();
                $job->setJobPositionId($valuesArray['jobPositionId']);
                $job->setCareerId($valuesArray['careerId']);
                $job->setDescription($valuesArray['description']);
                array_push($this->jobList, $job);
            }
        }


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

        public function AddPDO(Job $job) {
            try {

                $query = "INSERT INTO ". $this->tableName ." (jobPositionId,careerId,description) VALUES (:jobPositionId, :careerId, :description);";
                $parameters['jobPositionId'] = $job->getJobPositionId();
                $parameters['careerId'] = $job->getCareerId();
                $parameters['description'] = $job->getDescription();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch(Exception $ex) {
                throw $ex;
            }
        }
        
        public function GetAllPDO() {
            try {
                $jobList = array();
                $query = "SELECT * FROM " . $this->tableName;
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($query);
                foreach($resultSet as $row) {
                    $job = new Job();
                    $job->setJobPositionId($row['jobPositionId']);
                    $job->setCareerId($row['careerId']);
                    $job->setDescription($row['description']);
                    array_push($jobList, $job);
                }
                return $jobList;
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        /***************************************************************************************************************/

        public function UpdateById($jobPositionId, $careerId, $description) {
            try {
                $query = "UPDATE ".$this->tableName." SET jobPositionId=:jobPositionId, careerId=:careerId, description=:description WHERE jobPositionId=:jobPositionId;";

                $parameters['jobPositionId'] = $jobPositionId;
                $parameters['careerId'] = $careerId;
                $parameters['description'] = $description;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        public function DeleteById($jobPositionId) {

            $sql = "DELETE FROM job WHERE jobPositionId=:jobPositionId";
            $parameters['jobPositionId'] = $jobPositionId;
            try {
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            } catch (\PDOException $ex) {
                throw $ex;
            }
        }

        public function Add(Job $job) {
            $this->RetrieveData();
            $job->setJobPositionId($this->getJobPositionLastId());
            $job->setCareerId($this->getCareerLastId());
            array_push($this->jobList, $job);
            $this->SaveData();
        }


        public function GetAllApi () {
            $jsonApi = $this->RetrieveDataApi();
            $userList = array();
            foreach($jsonApi as $value) {
                $job = new Job ();
                $job->setJobPositionId($value['jobPositionId']);
                $job->setCareerId($value['careerId']);
                $job->setDescription($value['description']);
                array_push($jobList,$job);
            }
            return $jobList;
        }


        public function GetAll() {
            $this->consumeFromApi();
            return $this->jobList;
        }

        public function Get($id) {
            $this->RetrieveDataApi();
            return $this->careerList[$id];
        }
        


    }

?>