<?php
/**
 * Phergie (http://phergie.org)
 *
 * @link https://github.com/phergie/phergie-irc-event for the canonical source repository
 * @copyright Copyright (c) 2008-2014 Phergie Development Team (http://phergie.org)
 * @license http://phergie.org/license Simplified BSD License
 * @package Phergie\Irc\Event
 */

namespace Phergie\Irc\Event;

/**
 * Base class for events.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class Event implements EventInterface
{
    /**
     * Original unparsed message
     *
     * @var string
     */
    protected $message;

    /**
     * Metadata for the connection over which the event was received
     *
     * @var \Phergie\Irc\ConnectionInterface
     */
    protected $connection;

    /**
     * Command parameters parsed from the message
     *
     * @var array
     */
    protected $params = array();

    /**
     * Command parsed from the message
     *
     * @var string
     */
    protected $command;

    /**
     * Sets the original unparsed message.
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Returns the original unparsed message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets metadata for the connection over which the message was received.
     *
     * @param \Phergie\Irc\ConnectionInterface $connection
     */
    public function setConnection(\Phergie\Irc\ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Returns metadata for the connection over which the message was received.
     *
     * @return \Phergie\Irc\ConnectionInterface
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Sets the command parameters parsed from the message.
     *
     * @param array $params Enumerated array of parameter values
     */
    public function setParams(array $params)
    {
        $this->params = $params;
    }

    /**
     * Returns the command parameters parsed from the message.
     *
     * @return array Enumerated array of parameter values
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Sets the command parsed from the message.
     *
     * @param string $command
     */
    public function setCommand($command)
    {
        $this->command = $command;
    }

    /**
     * Returns the command parsed from the message.
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }
}
