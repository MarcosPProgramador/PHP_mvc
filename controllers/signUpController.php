<?php
    class signUpController
    {
        public function __construct() {
            $signUp = new signUpModel();
            $signUp->getDataForm();
        }
    }
    