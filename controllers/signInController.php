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
    public function allowAccess()
    {    
        if ($this->datas) {
            
            $_SESSION['logged'] = true;

            foreach ($this->datas as $key => $value)
                $_SESSION[$key] = $value; 

            try {
                header("Location: logged");
            } catch (\Throwable $th) {
                exit();
            }
            
        }
    }
}