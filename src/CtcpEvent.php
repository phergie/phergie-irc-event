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
 * Class for a CTCP event sent by a user.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class CtcpEvent extends UserEvent implements CtcpEventInterface
{
    /**
     * CTCP command parameters parsed from the message
     *
     * @var array
     */
    protected $ctcpParams = array();

    /**
     * CTCP command parsed from the message
     *
     * @var string
     */
    protected $ctcpCommand;

    /**
     * Sets the CTCP command parameters parsed from the message.
     *
     * @param array $params Enumerated array of parameter values
     */
    public function setCtcpParams(array $params)
    {
        $this->ctcpParams = $params;
    }

    /**
     * Returns the CTCP command parameters parsed from the message.
     *
     * @return array Enumerated array of parameter values
     */
    public function getCtcpParams()
    {
        return $this->ctcpParams;
    }

    /**
     * Sets the CTCP command parsed from the message.
     *
     * @param string $command
     */
    public function setCtcpCommand($command)
    {
        $this->ctcpCommand = $command;
    }

    /**
     * Returns the CTCP command parsed from the message.
     *
     * @return string
     */
    public function getCtcpCommand()
    {
        return $this->ctcpCommand;
    }

}
