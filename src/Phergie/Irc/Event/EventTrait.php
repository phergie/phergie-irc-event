<?php
/**
 * Phergie (http://phergie.org)
 *
 * @link https://github.com/phergie/phergie-irc-event for the canonical source repository
 * @copyright Copyright (c) 2008-2013 Phergie Development Team (http://phergie.org)
 * @license http://phergie.org/license New BSD License
 * @package Phergie\Event
 */

namespace Phergie\Event;

/**
 * Event Trait
 *
 * @category Phergie
 * @package Phergie\Event
 */
trait EventTrait
{
    /**
     * Message coming from the parser
     *
     * @var string
     */
    protected $message;

    /**
     * Connection instance
     *
     * @var \Phergie\ConnectionInterface
     */
    protected $connection;

    /**
     * Parameters coming from the parser
     *
     * @var array
     */
    protected $params;

    /**
     * Command coming from the parser
     *
     * @var string
     */
    protected $command;

    /**
     * Accessor method to retrieve the message
     *
     * @return string text of the message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Accessor method to set the message
     *
     * @param string $message text of the message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Accessor method to retrieve the connection
     *
     * @return \Phergie\ConnectionInterface
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Accessor method to set the connection
     *
     * @param \Phergie\ConnectionInterface $connection
     */
    public function setConnection(\Phergie\ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Accessor method to receive the params
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Accessor method to set the params
     *
     * @param array array of parameters
     */
    public function setParams(array $params)
    {
        $this->params = $params;
    }

    /**
     * Accessor method to retrieve the command
     *
     * @return string the command from the parser
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Accessor method to set the command
     *
     * @param string $command the command from the parser
     */
    public function setCommand($command)
    {
        $this->command = $command;
    }
}
