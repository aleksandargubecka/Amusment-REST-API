<?php

/**
 * Class Application_Model_Users
 */
class Application_Model_Users
{
    /**
     * Field ID is main identifier
     * @var
     */
    protected $_id;

    /**
     * User's email
     * @var
     */
    protected $_email;

    /**
     * User's password
     * @var
     */
    protected $_password;

    /**
     * User's first name
     * @var
     */
    protected $_name;

    /**
     * User's last name
     * @var
     */
    protected $_lastname;

    /**
     * User role
     * @var
     */
    protected $_role;

    /**
     * Is user active
     * @var
     */
    protected $_active;

    /**
     * Created time
     * @var
     */
    protected $_created_at;
    
    /**
     * Last updated time
     * @var
     */
    protected $_updated_at;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->_lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->_lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->_role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->_role = $role;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->_active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->_active = $active;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->_created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->_created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->_updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->_updated_at = $updated_at;
    }

}

