<?php
    class signInModel extends connectDatabaseModel {
        public function __construct() {
            parent::__construct();
        
        }
  
  
        public function setCondicion($datas)
        {   
        

            $email = $datas[0];
            $password = $datas[1];

            $baseSign = new baseSignModel($email, $password);
            
            $cond = $baseSign->isRgEx() 
            && $baseSign->isEmpty()
            && $baseSign->isCount();

            if ($cond) 
                return true;
                return false;
       
            
        }
        public function getDataform()
        {   

            if (isset($_GET['action'])) {
                $email = $_GET['email'];
                $password = $_GET['password'];
                
                return [$email, $password];
                    
                
            }
            return false;
        }

        public function getDataFromDatabase()
        {   
            $query = "  SELECT 
                        * 
                        FROM clients
                        WHERE email = ? 
                        AND 
                        password = ?
            ";
    
            return $this->connectDB->prepare($query);
        }
    }