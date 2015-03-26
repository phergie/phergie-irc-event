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
     * @param string $host
     */
    public function setHost($host);

    /**
     * Sets targets parsed from the message, typically user nicks or channel
     * names.
     *
     * @param array $targets
     */
    public function setTargets(array $targets);

    /**
     * Returns targets parsed from the message, typically user nicks or channel
     * names.
     *
     * @return array
     */
    public function getTargets();

    /**
     * Returns the source of this event.
     *
     * If the event occurred within a channel, this will be the channel name.
     * If it was sent directly to the bot, this will be the nickname of the
     * originating user.
     *
     * @return string User nick or channel name
     */
    public function getSource();
}
