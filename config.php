<?php 

    date_default_timezone_set('America/Sao_paulo');
    define('PATH', 'http://localhost/projetos/linguagens/PHP_mvc/');
    session_start();

    spl_autoload_register(function ($class){
        $paths = [
            "./controllers/$class.php",
            "./models/$class.php"
        ];
        foreach ($paths as $key => $value) 
            if (file_exists($value)) include_once $value;
    }
);