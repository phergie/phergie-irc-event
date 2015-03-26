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
 * Interface for an event sent by a server.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
interface ServerEventInterface extends EventInterface
{
    /**
     * Returns the server name.
     *
     * @return string
     */
    public function getServername();

    /**
     * Sets the server name.
     *
     * @param string $servername
     */
    public function setServername($servername);

    /**
     * Returns the descriptive code for the command.
     *
     * @return string
     */
    public function getCode();

    /**
     * Sets the descriptive code for the command.
     *
     * @param string $code
     */
    public function setCode($code);
}
