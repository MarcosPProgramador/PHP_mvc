<?php 

class baseSignModel
{   
   
    public $signUp; 
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
            $this->signUp = true;
        }

    }
    public function isCount()
    {
        $email = $this->email;
        $password = $this->password;
        
        
        
        
        if ($this->signUp) {
            $firstname = $this->firstname;
            $lastname = $this->lastname;
            $phone = $this->phone;
            
            $condEmail = strlen($email) > 10 && strlen($email) < 40;
            $condPass = strlen($password) > 8 && strlen($password) < 50;
            $condfirstname = strlen($firstname) > 10 && strlen($firstname) < 30;
            $condLastname = strlen($lastname) > 10 && strlen($lastname) < 30;
            $condPhone = strlen($phone) > 8 && strlen($phone) < 20;

            $cond = $condEmail 
            && $condPass 
            && $condfirstname 
            && $condLastname 
            && $condPhone;
            
            if ($cond) 
                return true;   
        }else{
            $condEmail = strlen($email) > 10 && strlen($email) < 40;
            $condPass = strlen($password) > 8 && strlen($password) < 50;

            if ($condEmail && $condPass) 
                return true;    

        }
    }
    public function isEmpty()
    {   

        $email = strip_tags($this->email);
        $password = strip_tags($this->password);  
        
        if ($this->signUp) {
            $firstname = strip_tags($this->firstname);
            $lastname = strip_tags($this->lastname);
            $phone = strip_tags($this->phone);

            $cond = !empty($email) 
            && !empty($password)
            && !empty($firstname)
            && !empty($lastname)
            && !empty($phone);
            
            if ($cond) 
                return true;

        } else {
            if (!empty($email) && !empty($password)) 
                return true;
            
        }
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
