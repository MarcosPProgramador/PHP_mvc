<?php 

class signInController {
    public $datas;
    public function __construct() {
        $signCls = new signInModel();
        $queryDB = $signCls->getDataFromDatabase();
            
        if ($signCls->getDataform() && $signCls->setCondicion($signCls->getDataform())){

            $queryDB->execute($signCls->getDataform());

            $datas = $queryDB->fetch(PDO::FETCH_ASSOC);
            $this->datas = $datas;
            $this->allowAccess();
            
        }
    }
    public function test(){
        echo '<div class="fixed">';
            echo '<pre>';
                print_r($_SESSION);
            echo '<pre/>';
        echo '</div>';

    }
    public function allowAccess()
    {    
        foreach ($this->datas as $key => $value)
            $_SESSION[$key] = $value; 
        
    }
}