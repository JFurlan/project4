<?php 

// namespace JF\Project4\Model;

class Admin {

    protected $_login;
    protected $_password;


    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }


    /**
     * Getters
     */

     public function getLogin()
     {
         return $this->_login;
     }

     public function getPassword()
     {
         return $this->_password;
     }

     
     /**
     * Setters
     */

    public function setLogin($login)
    {
        if(is_string($login))
        {
            $this->_login = $login;
        }
     }

     public function setPassword($password)
    {
        if(is_string($password))
        {
            $this->_password = $password;
        }
     }

}