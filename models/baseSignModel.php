<?php 

class baseSignModel
{   
   

    public function __construct(
        $email, 
        $password, 
        $firstname = null,
        $lastname = null, 
        $phone = null
    ) {

        $this->email = $email;
        $this->password = $password;

        if ($firstname) {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->phone = $phone;
        }

    }
    public function isCount()
    {
        $email = $this->email;
        $password = $this->password;


        $condEmail = strlen($email) > 10 && strlen($email) < 40;
        $condPass = strlen($password) > 8 && strlen($password) < 50;

        if ($condEmail && $condPass) 
            return true;
    }
    public function isEmpty()
    {   

        $email = strip_tags($this->email);
        $password = strip_tags($this->password);  

        if (!empty($email) && !empty($password)) 
            return true;
    }
    public function isRgEx()
    {   
        $email = $this->email;
        $password = $this->password;

        $rgEmail = "/^[a-zA-Z0-9._-]+@+[a-zA-Z0-9._-]+[.]+([a-zA-Z]{2,4})$/";
        $rgPass = "/[a-zA-Z0-9]/";

        if (preg_match($rgEmail, $email) && preg_match($rgPass, $password)) 
            return true;

    }
}
