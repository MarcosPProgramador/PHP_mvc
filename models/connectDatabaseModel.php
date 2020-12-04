<?php 
abstract class connectDatabaseModel
{
    const USER = 'root';
    const PASSWORD = '';
    const HOST = "mysql:host=localhost;dbname=module_01";
    public $connectDB;
    public function __construct(){
        try {
            $connectDB = new PDO(
                self::HOST, 
                self::USER, 
                self::PASSWORD, 
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            $connectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $this->connectDB = $connectDB;
      
        } catch (\Throwable $th) {
            die("[Error]: 204 {$th->getMessage()}");
        }
    }

}
