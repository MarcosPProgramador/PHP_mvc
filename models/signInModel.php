<?php
    class signInModel extends connectDatabaseModel {
        public $datas;
        public function __construct() {
            parent::__construct();
            $queryDB = $this->getDataFromDatabase();
            $queryDB->execute($this->getDataform());

            $datas = $queryDB->fetch(PDO::FETCH_ASSOC);
            $this->datas = $datas;

            if ($this->getDataform() && $this->setCondicion($this->getDataform()))
                $this->allowAccess();
            
        }
        private function allowAccess()
        {   
            if ($this->datas) {
                echo '<div class="fixed">';
                    print_r($this->datas);
                echo '</div>';
            }
        }
  
        private function setCondicion($datas)
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
        private function getDataform()
        {   

            if (isset($_GET['action'])) {
                $email = $_GET['email'];
                $password = $_GET['password'];
                
                
            }
   
            return [$email, $password];
        }

        private function getDataFromDatabase()
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