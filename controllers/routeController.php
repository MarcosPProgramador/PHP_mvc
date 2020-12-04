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

        private function setStyle(){
            $path = "views/public/styles{$this->treatURL()}.css";
            $pathEr = "views/public/styles/Error.css";
            if (file_exists($path)) 
                return PATH.$path;
                return PATH.$pathEr;
        }
        
        private function setConfig($str, $template = ''){
            $this->str = $str;
            switch ($this->treatURL()) {
                case '/signin':
                    $this->getTemplate($template, 'Sign');
                    return $this->getConfig('signIn.html', 'welcome');
                case '/signup':
                    $this->getTemplate($template, 'Sign');      
                    return $this->getConfig('signUp.html', 'welcome');
                default:
                    return $this->getConfig('error.html', 'Não encontrado', 'error.png');
            }
        }


    }
    