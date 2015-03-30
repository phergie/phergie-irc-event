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
 * Converts data for a single event output by a parser implementing the
 * \Phergie\Irc\ParserInterface interface into an event object.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class ParserConverter implements ParserConverterInterface
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
            if (empty($data['ctcp'])) {
                $event = new UserEvent;
            } else {
                $event = new CtcpEvent;
                $event->setCtcpCommand($data['ctcp']['command']);
                if (!empty($data['ctcp']['params'])) {
                    $event->setCtcpParams($data['ctcp']['params']);
                }
            }
            if (!empty($data['prefix'])) {
                $event->setPrefix($data['prefix']);
            }
            if (!empty($data['nick'])) {
                $event->setNick($data['nick']);
            }
            if (!empty($data['user'])) {
                $event->setUsername($data['user']);
            }
            if (!empty($data['host'])) {
                $event->setHost($data['host']);
            }
            if (!empty($data['targets'])) {
               $event->setTargets($data['targets']);
            }
        } else {
            $event = new ServerEvent;
            $event->setServername($data['servername']);
            $event->setCode($data['code']);
        }
        $event->setMessage($data['message']);
        if (isset($data['params'])) {
            if (isset($data['params']['all'])) {
                unset($data['params']['all']);
            }
            $event->setParams($data['params']);
        }
        $event->setCommand($data['command']);
        return $event;
    }
}
