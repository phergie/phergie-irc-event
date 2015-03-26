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
 * Interface for a base event class.
 */
interface EventInterface
{
    /**
     * Sets the original unparsed message.
     *
     * @param string $message
     */
    public function setMessage($message);

    /**
     * Returns the original unparsed message.
     *
     * @return string
     */
    public function getMessage();

    /**
     * Sets metadata for the connection over which the message was received.
     *
     * @param \Phergie\Irc\ConnectionInterface $connection
     */
    public function setConnection(\Phergie\Irc\ConnectionInterface $connection);

    /**
     * Returns metadata for the connection over which the message was received.
     *
     * @return \Phergie\Irc\ConnectionInterface
     */
    public function getConnection();

    /**
     * Sets the command parameters parsed from the message.
     *
     * @param array $params Enumerated array of parameter values
     */
    public function setParams(array $params);

    /**
     * Returns the command parameters parsed from the message.
     *
     * @return array Enumerated array of parameter values
     */
    public function getParams();

    /**
     * Sets the command parsed from the message.
     *
     * @param string $command
     */
    public function setCommand($command);

    /**
     * Returns the command parsed from the message.
     *
     * @return string
     */
    public function getCommand();
}
