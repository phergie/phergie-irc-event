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
 * Tests for \Phergie\Irc\Event\UserEvent.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class UserEventTest extends EventTest
{
    /**
     * Instance of the class under test
     *
     * @var \Phergie\Irc\Event\UserEvent
     */
    protected $event;

    /**
     * Instantiates the class under test.
     */
    protected function setUp()
    {
        $this->event = new UserEvent;
    }

    /**
     * Tests getPrefix().
     */
    public function testGetPrefix()
    {
        $this->assertNull($this->event->getPrefix());
    }

    /**
     * Tests setPrefix().
     */
    public function testSetPrefix()
    {
        $prefix = 'prefix';
        $this->event->setPrefix($prefix);
        $this->assertSame($prefix, $this->event->getPrefix());
    }

    /**
     * Tests getNick().
     */
    public function testGetNick()
    {
        $this->assertNull($this->event->getNick());
    }

    /**
     * Tests setNick().
     */
    public function testSetNick()
    {
        $nick = 'nick';
        $this->event->setNick($nick);
        $this->assertSame($nick, $this->event->getNick());
    }

    /**
     * Tests getUsername().
     */
    public function testGetUsername()
    {
        $this->assertNull($this->event->getUsername());
    }

    /**
     * Tests setUsername().
     */
    public function testSetUsername()
    {
        $username = 'username';
        $this->event->setUsername($username);
        $this->assertSame($username, $this->event->getUsername());
    }

    /**
     * Tests getHost().
     */
    public function testGetHost()
    {
        $this->assertNull($this->event->getHost());
    }

    /**
     * Tests setHost().
     */
    public function testSetHost()
    {
        $host = 'host';
        $this->event->setHost($host);
        $this->assertSame($host, $this->event->getHost());
    }

    /**
     * Tests getTargets().
     */
    public function testGetTargets()
    {
        $this->assertSame(array(), $this->event->getTargets());
    }

    /**
     * Tests setTargets().
     */
    public function testSetTargets()
    {
        $targets = array('foo', 'bar');
        $this->event->setTargets($targets);
        $this->assertSame($targets, $this->event->getTargets());
    }
}
