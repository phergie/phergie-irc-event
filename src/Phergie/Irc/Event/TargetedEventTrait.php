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
 * TargetedEvent Trait
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
trait TargetedEventTrait
{
    /**
     * Array of targets
     *
     * @var array $targets an array of targets
     */
    protected $targets;

    /**
     * Accessor method to retrieve targets
     *
     * @return array array of targets
     */
    public function getTargets()
    {
        return $this->targets;
    }

    /**
     * Accessor method to set the targets
     *
     * @param array array of targets
     */
    public function setTargets(array $targets)
    {
        $this->targets = $targets;
    }
}
