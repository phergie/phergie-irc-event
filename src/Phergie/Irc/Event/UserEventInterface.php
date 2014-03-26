<?php
/**
 * Phergie (http://phergie.org)
 *
 * @link https://github.com/phergie/phergie-irc-event for the canonical source repository
 * @copyright Copyright (c) 2008-2013 Phergie Development Team (http://phergie.org)
 * @license http://phergie.org/license New BSD License
 * @package Phergie\Irc\Event
 */

namespace Phergie\Irc\Event;

/**
 * Interface for an event sent by a user.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
interface UserEventInterface extends EventInterface
{
    /**
     * Gets the prefix identifying the sender of the event.
     *
     * @return string
     */
    public function getPrefix();

    /**
     * Sets the prefix identifying the sender of the event.
     *
     * @param string $prefix
     */
    public function setPrefix($prefix);

    /**
     * Returns the nick portion of the prefix identifying the sender of the event.
     *
     * @return string
     */
    public function getNick();

    /**
     * Sets the nick portion of the prefix identifying the sender of the event.
     *
     * @param string $nick
     */
    public function setNick($nick);

    /**
     * Returns the username portion of the prefix identifying the sender of the event.
     *
     * @return string
     */
    public function getUsername();

    /**
     * Sets the username portion of the prefix identifying the sender of the event.
     *
     * @param string $username
     */
    public function setUsername($username);

    /**
     * Returns the host portion of the prefix identifying the sender of the event.
     *
     * @return string
     */
    public function getHost();

    /**
     * Sets the host portion of the prefix identifying the sender of the event.
     *
     * @param string host
     */
    public function setHost($host);
}
