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
 * Converts data for a single event output by a parser implementing the
 * \Phergie\Irc\ParserInterface interface into an event object.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class ParserConverter
{
    /**
     * Converts event data into an object.
     *
     * @param array $data Event data output by the parser
     * @return \Phergie\Irc\Event\EventInterface
     */
    public function convert(array $data)
    {
        if (empty($data['code'])) {
            $event = new UserEvent;
            $event->setPrefix($data['prefix']);
            $event->setNick($data['nick']);
            $event->setUsername($data['username']);
            $event->setHost($data['host']);
        } else {
            $event = new ServerEvent;
            $event->setServername($data['servername']);
            $event->setCode($data['code']);
        }
        $event->setMessage($data['message']);
        $event->setParams($data['params']);
        $event->setCommand($data['command']);
        if (!empty($data['targets'])) {
           $event->setTargets($data['targets']);
        }
        return $event;
    }
}
