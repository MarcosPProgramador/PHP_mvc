<?php
    class signUpModel extends connectDatabaseModel
    {   
        public function __construct() {
            parent::__construct();
        }
        public function setCondicion($datas)
        {   
        

            $firstname = $datas[0];
            $lastname = $datas[1];
            $email = $datas[2];
            $password = $datas[3];
            $phone = $datas[4];

            $baseSign = new baseSignModel($email, $password,$firstname, $lastname, $phone);
            
            $cond = $baseSign->isEmpty()            
            && $baseSign->isRgEx() 
            && $baseSign->isCount();

            if ($cond && $this->existEmail($email)) 
                return true;
                return false;
       
            
        }
        public function existEmail($email)
        {
            $query = "SELECT email FROM clients where email = ?";
            $queryPrepare = $this->connectDB->prepare($query);
            $queryPrepare->execute([$email]);
            
            $fetch = $queryPrepare->fetch(PDO::FETCH_ASSOC);
            if ($fetch['email']) 
                return false;
                return true;
            
        }
        public function insertIntoDatabase($datas)
        {
            $query = "  INSERT 
                        INTO `clients`
                        values (null, ?, ?, ?, ?, ?)
            ";

            $queryPrepare = $this->connectDB->prepare($query);
            $queryPrepare->execute($datas);
        }
        public function getDataForm(){
            if ($_GET['action'] ?? null) {
                $firstname = $_GET['firstname'];
                $lastname = $_GET['lastname'];
                $email = $_GET['email'];
                $password = $_GET['password'];
                $phone = $_GET['phone'];

                $arrDatas = [$firstname, $lastname, $email, $password, $phone];
                if ($this->setCondicion($arrDatas)) 
                    $this->insertIntoDatabase($arrDatas);
                
            }

        }
    }
    
