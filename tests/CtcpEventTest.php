<?php
/**
 * Phergie (http://phergie.org)
 *
 * @link https://github.com/phergie/phergie-irc-event for the canonical source repository
 * @copyright Copyright (c) 2008-2014 Phergie Development Team (http://phergie.org)
 * @license http://phergie.org/license Simplified BSD License
 * @package Phergie\Irc\Event
 */

namespace Phergie\Irc\Tests\Event;

use Phergie\Irc\Event\CtcpEvent;

/**
 * Tests for \Phergie\Irc\Event\CtcpEvent.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class CtcpEventTest extends UserEventTest
{
    /**
     * Instance of the class under test
     *
     * @var \Phergie\Irc\Event\CtcpEvent
     */
    protected $event;

    /**
     * Instantiates the class under test.
     */
    protected function setUp()
    {
        $this->event = new CtcpEvent;
    }

    /**
     * Tests getCtcpParams().
     */
    public function testGetCtcpParams()
    {
        $this->assertSame(array(), $this->event->getCtcpParams());
    }

    /**
     * Tests setCtcpParams().
     */
    public function testSetCtcpParams()
    {
        $params = array('foo' => 'bar');
        $this->event->setCtcpParams($params);
        $this->assertSame($params, $this->event->getCtcpParams());
    }

    /**
     * Tests getCtcpCommand().
     */
    public function testGetCtcpCommand()
    {
        $this->assertNull($this->event->getCtcpCommand());
    }

    /**
     * Tests setCtcpCommand().
     */
    public function testSetCtcpCommand()
    {
        $command = 'COMMAND';
        $this->event->setCtcpCommand($command);
        $this->assertSame($command, $this->event->getCtcpCommand());
    }
}
