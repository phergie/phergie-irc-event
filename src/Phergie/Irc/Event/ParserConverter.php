<?php
/**
 * Phergie (http://phergie.org)
 *
 * @link http://github.com/phergie/phergie-irc-bot-react for the canonical source repository
 * @copyright Copyright (c) 2008-2013 Phergie Development Team (http://phergie.org)
 * @license http://phergie.org/license New BSD License
 * @package Phergie\Event
 */

namespace Phergie\Irc\Event;

/**
 * ParserConverter converts the output from the parser into a proper object
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class ParserConverter
{
    /**
     * Method to convert parser results into an Event or TargetedEvent object
     *
     * @param array $parserOutput output from the parser
     * @return \Phergie\Irc\EventInterface a populated instance of EventInterface
     */
    public function convert(array $parserOutput)
    {
        if (!empty($parserOutput['targets'])) {
           $event = new TargetedEvent();
           $event->setTargets($parserOutput['targets']);
        } else {
            $event = new Event();
        }
        $event->setMessage($parserOutput['message']);
        $event->setParams($parserOutput['params']);
        $event->setCommand($parserOutput['command']);
        return $event;
    }
}
        
