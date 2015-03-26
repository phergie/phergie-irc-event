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
 * Class for an event sent by a user.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class UserEvent extends Event implements UserEventInterface
{
    /**
     * Prefix identifying the sender of the command
     *
     * @var string
     */
    protected $prefix;

    /**
     * Nick portion of the prefix
     *
     * @var string
     */
    protected $nick;

    /**
     * Username portion of the prefix
     *
     * @var string
     */
    protected $username;

    /**
     * Host portion of the prefix
     *
     * @var string
     */
    protected $host;

    /**
     * Targets parsed from the message, typically user nicks or channel names
     *
     * @var array
     */
    protected $targets = array();

    /**
     * Gets the prefix identifying the sender of the event.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Sets the prefix identifying the sender of the event.
     *
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * Returns the nick portion of the prefix identifying the sender of the event.
     *
     * @return string
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Sets the nick portion of the prefix identifying the sender of the event.
     *
     * @param string $nick
     */
    public function setNick($nick)
    {
        $this->nick = $nick;
    }

    /**
     * Returns the username portion of the prefix identifying the sender of the event.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets the username portion of the prefix identifying the sender of the event.
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Returns the host portion of the prefix identifying the sender of the event.
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Sets the host portion of the prefix identifying the sender of the event.
     *
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * Returns targets parsed from the message.
     *
     * @return array
     */
    public function getTargets()
    {
        return $this->targets;
    }

    /**
     * Sets targets parsed from the message.
     *
     * @param array targets
     */
    public function setTargets(array $targets)
    {
        $this->targets = $targets;
    }

    /**
     * Returns the source of this event.
     *
     * @return string User nick or channel name
     */
    public function getSource()
    {
        $targets = $this->getTargets();
        if (in_array($this->getConnection()->getNickname(), $targets)) {
            return $this->getNick();
        }
        return reset($targets);
    }
}
