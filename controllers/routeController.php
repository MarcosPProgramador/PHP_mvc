<?php
    class routeController
    {
        public $str;
        public function __construct() {
            include './views/public/template.php';
        }
       
        private function treatURL(){
            $resourse = $_GET['url'] ?? 'signUp';
            $resourse = strtolower($resourse);
            return "/$resourse";
        }
        private function getConfig($file, $title = 'welcome', $icon = 'desktop.png') {
            $path = "./views/public/layouts/$file";
            

            switch ($this->str) {
                case 'layout':
                    if (file_exists($path)) include_once $path; 
                    break;
                case 'title':
                    return $title;
                case 'icon':
                    return PATH."views/public/assets/icon/$icon";
                
            }
        }
            
            
        private function getTemplate($template, $ext = ''){
            $path = "./views/public/templates/{$template}{$ext}.html";
            
            if (file_exists($path)) 
                include_once $path;
            
        }

        private function setLink($file = false){

            if ($file) {
                $path = "views/public/styles{$this->treatURL()}.css";
                $pathEr = "views/public/styles/error.css";
            }
            else { 
                $path = "views/public/js{$this->treatURL()}.js";
                $pathEr = "views/public/js/error.js";
            }
            
            if (file_exists($path)) 
                return PATH.$path;
                return PATH.$pathEr;
        }
        public function pageNoAccess($template, $arr)
        {
            if (isset($_SESSION['logged'])) {
                $this->getTemplate($template);      
                return $this->getConfig($arr[0], $arr[1], $arr[2]);
            }
            return $this->getConfig('error.php', 'Você não tem acesso', 'error.png');
        }
        private function setConfig($str, $template = ''){
            $this->str = $str;
            switch ($this->treatURL()) {
                case '/signin':
                    $this->getTemplate($template, 'Sign');
                    return $this->getConfig('signIn.php', 'welcome');
                case '/signup':
                    $this->getTemplate($template, 'Sign');      
                    return $this->getConfig('signUp.php', 'welcome');
                case '/logged':
                    $arr = ['logged.php', 'Você está logado!', 'login.png'];
                    return $this->pageNoAccess($template, $arr);
                default:
                    return $this->getConfig('error.php', 'Not found', 'error.png');
            }
        }


    }
    