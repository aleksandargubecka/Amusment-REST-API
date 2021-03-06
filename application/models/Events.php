<?php

/**
 * Class Application_Model_Events
 */
class Application_Model_Events
{
    /**
     * Field ID is main identifier
     * @var
     */
    protected $_id;
    
    /**
     * Event's title
     * @var
     */
    protected $_title;
    
    /**
     * Event's description
     * @var
     */
    protected $_description;
    
    /**
     * Type of the event
     * @var
     */
    protected $_type;
    
    /**
     * Is event published or draft
     * @var
     */
    protected $_active;
    
    /**
     * Start time
     * @var
     */
    protected $_starts_at;

    /**
     * End time
     * @var
     */
    protected $_ends_at;
    
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
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->_type = $type;
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
    public function getStartsAt()
    {
        return $this->_starts_at;
    }

    /**
     * @param mixed $starts_at
     */
    public function setStartsAt($starts_at)
    {
        $this->_starts_at = $starts_at;
    }

    /**
     * @return mixed
     */
    public function getEndsAt()
    {
        return $this->_ends_at;
    }

    /**
     * @param mixed $ends_at
     */
    public function setEndsAt($ends_at)
    {
        $this->_ends_at = $ends_at;
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

