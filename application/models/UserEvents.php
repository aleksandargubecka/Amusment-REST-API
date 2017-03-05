<?php

/**
 * Class Application_Model_UserEvents
 *
 * This is relation table between Users table and Events
 */
class Application_Model_UserEvents
{
    /**
     * Field ID is main identifier
     * @var
     */
    protected $_id;

    /**
     * user_id field saves foreign key of user identifier
     * @var
     */
    protected $_user_id;

    /**
     * event_id field saves foreign key of event identifier
     * @var
     */
    protected $_event_id;

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
    public function getUserId()
    {
        return $this->_user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->_user_id = $user_id;
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

}

