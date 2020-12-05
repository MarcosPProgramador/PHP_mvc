<?php
    class signUpModel
    {   
        public function __construct() {
            $this->getDataForm();
        }
        public function setCondicion($datas)
        {   
        

            $firstname = $datas[0];
            $lastname = $datas[1];
            $email = $datas[2];
            $password = $datas[3];
            $phone = $datas[4];

            $baseSign = new baseSignModel($email, $password,$firstname, $lastname, $phone);
            
            $cond = $baseSign->isRgEx() 
            && $baseSign->isEmpty()
            && $baseSign->isCount();

            // echo '<div class="fixed">';
            //     echo '<pre>';
            //         print_r($_SESSION);
            //     echo '<pre/>';
            // echo '</div>';
            if ($cond) 
                return true;
                // return false;
       
            
        }
        public function getDataForm(){
            if ($_GET['action']) {
                $firstname = $_GET['firstname'];
                $lastname = $_GET['lastname'];
                $email = $_GET['email'];
                $password = $_GET['password'];
                $phone = $_GET['phone'];

                $this->setCondicion([$firstname, $lastname, $email, $password, $phone]);
            }

        }
        public function test(){
            echo '<div class="fixed">';
                echo '<pre>';
                    print_r($_SESSION);
                echo '<pre/>';
            echo '</div>';
    
        }
    }
    
