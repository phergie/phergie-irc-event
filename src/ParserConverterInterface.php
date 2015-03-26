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
 * Interface for a class that converts data for a single event output by a
 * parser implementing the \Phergie\Irc\ParserInterface interface into an event
 * object.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
interface ParserConverterInterface
{
    /**
     * Converts event data into an object.
     *
     * @param array $data Event data output by the parser
     * @return \Phergie\Irc\Event\EventInterface
     */
    public function convert(array $data);
}
