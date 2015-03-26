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

use Phake;
use Phergie\Irc\Event\UserEvent;

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

    /**
     * Data provider for testGetSource().
     *
     * @return array
     */
    public function dataProviderGetSource()
    {
        $data = array();
        $data[] = array('#channel', '#channel');
        $data[] = array('bot', 'user');
        return $data;
    }

    /**
     * Tests getSource().
     *
     * @param string $target
     * @param string $source
     * @dataProvider dataProviderGetSource
     */
    public function testGetSource($target, $source)
    {
        $connection = Phake::mock('\Phergie\Irc\ConnectionInterface');
        Phake::when($connection)->getNickname()->thenReturn('bot');

        $this->event->setNick('user');
        $this->event->setConnection($connection);

        $this->event->setTargets(array($target));
        $this->assertSame($source, $this->event->getSource());
    }
}
