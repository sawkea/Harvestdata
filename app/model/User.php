<?php

namespace App\model;

class User {
    private $_id;
    private $_name;
    private $_firstname;
    private $_email;
    private $_pass;
    private $_valid;

    // Construction de l'objet User
    // construction de l'objet avec paramètres $data au format tableau
    public function __construct(array $data)
    {
        // appel de la fonction hydrate 
        $this->hydrate($data);
    }

    // Fonction hydrate qui va remplir l'objet
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set_'.$key;
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }    
        }
    } 

    

    /**
     * Get the value of _id
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     * @return  self
     */ 
    private function set_id(int $_id)
    {
        $this->_id = $_id;
    }

    /**
     * Get the value of _name
     */ 
    public function get_name()
    {
        return $this->_name;
    }

    /**
     * Set the value of _name
     *
     * @return  self
     */ 
    private function set_name(string $_name)
    {
        $name = htmlspecialchars(filter_var($_name, FILTER_SANITIZE_STRING));
        $name = (strlen($name) <= 60) ? $name : false;
        if($name !== false) {
            $this->_name = $name;            
        }
    }

    /**
     * Get the value of _firstname
     */ 
    public function get_firstname()
    {
        return $this->_firstname;
    }

    /**
     * Set the value of _firstname
     *
     * @return  self
     */ 
    private function set_firstname($_firstname)
    {
        $this->_firstname = $_firstname;

        return $this;
    }

    /**
     * Get the value of _email
     */ 
    public function get_email()
    {
        return $this->_email;
    }

    /**
     * Set the value of _email
     *
     * @return  self
     */ 
    private function set_email(string $_email)
    {
        $email = htmlspecialchars(filter_var($_email, FILTER_SANITIZE_EMAIL));
        $email = (!filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) <= 320) ? false : $email;
        if($email !== false) {
            $this->_email = $email;
        }
    }

    /**
     * Get the value of _pass
     */ 
    public function get_pass()
    {
        return $this->_pass;
    }

    /**
     * Set the value of _pass
     *
     * @return  self
     */ 
    private function set_pass(string $_pass)
    {
        $pass = htmlspecialchars(filter_var($_pass, FILTER_SANITIZE_STRING));
        $this->_pass = password_hash($pass, PASSWORD_DEFAULT);
    }

    /**
     * Get the value of _valid
     */ 
    public function get_valid()
    {
        return $this->_valid;
    }

    /**
     * Set the value of _valid
     *
     * @return  self
     */ 
    private function set_valid(bool $_valid)
    {
        $this->_valid = $_valid;
    }
}

    
