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
 * Converts data for a single event object to an array for purposes of
 * serialization.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class EventConverter implements EventConverterInterface
{
    /**
     * Converts an event object into an array.
     *
     * @param \Phergie\Irc\Event\EventInterface $event
     * @return array
     */
    public function convert(EventInterface $event)
    {
        $connection = $event->getConnection();

        $array = array(
            'message' => $event->getMessage(),
            'params' => $event->getParams(),
            'command' => $event->getCommand(),
            'connection' => array(
                'serverHostname' => $connection->getServerHostname(),
                'serverPort' => $connection->getServerPort(),
                'nickname' => $connection->getNickname(),
                'username' => $connection->getUsername(),
                'hostname' => $connection->getHostname(),
                'servername' => $connection->getServername(),
                'realname' => $connection->getRealname(),
            ),
        );

        if ($event instanceof UserEventInterface) {
            $array['user'] = array(
                'prefix' => $event->getPrefix(),
                'nick' => $event->getNick(),
                'username' => $event->getUsername(),
                'host' => $event->getHost(),
                'targets' => $event->getTargets(),
            );
        }

        if ($event instanceof CtcpEventInterface) {
            $array['ctcp'] = array(
                'command' => $event->getCtcpCommand(),
                'params' => $event->getCtcpParams(),
            );
        }

        return $array;
    }
}

