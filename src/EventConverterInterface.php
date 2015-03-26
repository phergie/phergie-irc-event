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
 * Interface for a class that converts data for a single event object to an
 * array for purposes of serialization.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
interface EventConverterInterface
{
    /**
     * Converts an event object into an array.
     *
     * @param \Phergie\Irc\Event\EventInterface $event
     * @return array
     */
    public function convert(EventInterface $event);
}
