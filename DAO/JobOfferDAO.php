<?php namespace DAO;
    
    use \Exception as Exception;
    use DAO\IJobOfferDAO as IJobOfferDAO;
    use Models\JobOffer as JobOffer;
    use DAO\Connection as Connection;

    class JobOfferDAO implements IJobOfferDAO {

        private $connection;
        private $tableName = "joboffer";
        private $tableJob = "job";
        private $tableCompany = "company";

        private $jobOfferList = array();

      
        /****************************************** BBDD ******************************************/

        public function AddPDO(JobOffer $jobOffer) {
            try {
                $query = "INSERT INTO ".$this->tableName." (jobOfferId,title,publishedDate, finishDate, task, skills, salary, jobPositionId, companyId) VALUES (:jobOfferId,:title,:publishedDate, :finishDate, :task, :skills, :salary, :jobPositionId, :companyId);";
                $parameters['jobOfferId'] = $jobOffer->getJobOfferId();
                $parameters['title'] = $jobOffer->getTitle();
                $parameters['publishedDate'] = $jobOffer->getPublishedDate();
                $parameters['finishDate'] = $jobOffer->getFinishDate();
                $parameters['task'] = $jobOffer->getTask();
                $parameters['skills'] = $jobOffer->getSkills();
                $parameters['salary'] = $jobOffer->getSalary();
                $parameters['jobPositionId'] = $jobOffer->getJobPosition();
                $parameters['companyId'] = $jobOffer->getCompanyId();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        public function GetAllPDO() {
            try {
                $jobOfferList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row) {                
                    $newJobOffer = new JobOffer();
                    $newJobOffer->setJobOfferId($row['jobOfferId']);
                    $newJobOffer->setTitle($row['title']);
                    $newJobOffer->setPublishedDate($row['publishedDate']);
                    $newJobOffer->setFinishDate($row['finishDate']);
                    $newJobOffer->setTask($row['task']);
                    $newJobOffer->setSkills($row['skills']);
                    $newJobOffer->setSalary($row['salary']);
                    $newJobOffer->setJobPosition($row['jobPositionId']);
                    $newJobOffer->setCompanyId($row['companyId']);
                    array_push($this->jobOfferList , $newJobOffer);
                }
                return $jobOfferList;
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        public function GetJobOfferStudent($careerId) {
            try {
                $jobOfferList = array();

                $query = "SELECT jo.title, jo.salary, j.description, c.companyName FROM ". $this->tableName. " jo INNER JOIN ". $this->tableJob. " j on j.jobPositionId = jo.jobPositionId INNER JOIN ". $this->tableCompany. " c on c.companyId = jo.companyId WHERE (j.careerId =:careerId)";

                $parameters['careerId'] = $careerId;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $row) {                
                    $jobOff['title'] = $row["title"];
                    $jobOff['salary'] = $row["salary"];
                    $jobOff['description'] = $row["description"];
                    $jobOff['companyName'] = $row["companyName"];
                    array_push($jobOfferList, $jobOff);
                }
                return $jobOfferList;
            } catch(\PDOException $ex) {
                throw $ex;
            }
        }

        /***************************************************************************************************************/

        public function UpdateById($jobOfferId, $title, $publishedDate, $finishDate, $task, $skills, $salary, $jobPosition) {
            try {
                $query = "UPDATE ".$this->tableName." SET jobOfferId=:jobOfferId, title=:title, publishedDate=:publishedDate,  finishDate=:finishDate, task=:task, skills=:skills, jobPosition=:jobPosition WHERE jobOfferId=:jobOfferId;";

                $parameters["jobOfferId"] = $jobOfferId;
                $parameters["title"] = $title;
                $parameters["publishedDate"] = $publishedDate;
                $parameters["finishDate"] = $finishDate;
                $parameters["task"] = $task;
                $parameters["skills"] = $skills;
                $parameters["salary"] = $salary;
                $parameters["jobPosition"] = $jobPosition;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        public function DeleteById($jobOfferId) {

            $sql = "DELETE FROM job_offer WHERE jobOfferId=:jobOfferId";
            $parameters['jobOfferId'] = $jobOfferId;
            try {
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            } catch (\PDOException $ex) {
                throw $ex;
            }
        }

        public function GetAll() {
            $this->GetAllPDO();
            return $this->jobOfferList;            
        }
    }

?>