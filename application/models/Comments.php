<?php

/**
 * Class Application_Model_Comments
 */
class Application_Model_Comments
{
    /**
     * Field ID is main identifier
     * @var
     */
    protected $_id;

    /**
     * Comment's title
     * @var
     */
    protected $_title;

    /**
     * Actual comment is saved in description field
     * @var
     */
    protected $_description;

    /**
     * For what event is this comment made
     * @var
     */
    protected $_event_id;

    /**
     * Is comment approved
     * @var
     */
    protected $_active;

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
    public function getEventId()
    {
        return $this->_event_id;
    }

    /**
     * @param mixed $event_id
     */
    public function setEventId($event_id)
    {
        $this->_event_id = $event_id;
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

}

