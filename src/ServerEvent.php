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
 * Class for an event sent by a server.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class ServerEvent extends Event implements ServerEventInterface
{
    /**
     * Name of the server
     *
     * @var string
     */
    protected $servername;

    /**
     * Descriptive code for the command, which is represented by an integer
     *
     * @var string
     */
    protected $code;

    /**
     * Returns the server name.
     *
     * @return string
     */
    public function getServername()
    {
        return $this->servername;
    }

    /**
     * Sets the server name.
     *
     * @param string $servername
     */
    public function setServername($servername)
    {
        $this->servername = $servername;
    }

    /**
     * Returns the descriptive code for the command.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets the descriptive code for the command.
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
}
