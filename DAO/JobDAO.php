<?php
    namespace DAO;

    use Models\Job as Job;

    class JobDAO implements IJobDAO
    {
        private $jobList = array();

    /*    public function GetAll()
        {
            $this->RetrieveData();

            return $this->jobList;
        }
*/
        public function Add(Job $job)
        {
            $this->RetrieveData();
            
            array_push($this->jobList, $job);

            $this->SaveData();
        }

        private function RetrieveData()
        {
            $this->jobList = array();

            if(file_exists('Data/JobPosition.json'))
            {
                $jsonContent = file_get_contents('Data/JobPosition.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $job = new Job();
                    $job->setJobPositionId($valuesArray['jobPositionId']);
                    $job->setCareerId($valuesArray['careerId']);
                    $job->setDescription($valuesArray['description']);
                    
                    array_push($this->jobList, $job);
                }
            }
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->jobList as $job)
            {
                $valuesArray["jobPositionId"] = $job->setJobPositionId();
                $valuesArray["careerId"] = $job->setCareerId();
                $valuesArray["description"] = $job->setDescription();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/JobPosition.json', $jsonContent);
        }

        private function RetrieveDataApi ()
        {
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

        public function GetAllApi ()
        {
            $jsonApi = $this->RetrieveDataApi();
            $userList = array();

            foreach($jsonApi as $value){
                $job = new Job ();
                $job->setJobPositionId($value['jobPositionId']);
                $job->setCareerId($value['careerId']);
                $job->setDescription($value['description']);

                array_push($jobList,$job);
            }
            return $jobList;
        }

        public function GetAll(){

            $this->consumeFromApi();
            return $this->jobList;

        }

        private function consumeFromApi(){
         
            $this->jobList = array();

            $options = array(
                'http' => array(
                'method'=>"GET",
                'header'=>"x-api-key: " . API_KEY)
            );

            $context = stream_context_create($options);

            $response = file_get_contents(API_URL .'JobPosition', false, $context);

            $arrayToDecode = json_decode($response, true);
          
          foreach($arrayToDecode as $valuesArray){
            $job = new Job ();
                $job->setJobPositionId($valuesArray['jobPositionId']);
                $job->setCareerId($valuesArray['careerId']);
                $job->setDescription($valuesArray['description']);

            array_push($this->jobList, $job);

          }

        }
    }
?>