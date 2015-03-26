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
 * Interface for a CTCP event sent by a user.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
interface CtcpEventInterface extends UserEventInterface
{
    /**
     * Sets the CTCP command parameters parsed from the message.
     *
     * @param array $params Enumerated array of parameter values
     */
    public function setCtcpParams(array $params);

    /**
     * Returns the CTCP command parameters parsed from the message.
     *
     * @return array Enumerated array of parameter values
     */
    public function getCtcpParams();

    /**
     * Sets the CTCP command parsed from the message.
     *
     * @param string $command
     */
    public function setCtcpCommand($command);

    /**
     * Returns the CTCP command parsed from the message.
     *
     * @return string
     */
    public function getCtcpCommand();
}
