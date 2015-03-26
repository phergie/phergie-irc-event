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
use Phergie\Irc\Event\CtcpEvent;
use Phergie\Irc\Event\Event;
use Phergie\Irc\Event\EventConverter;
use Phergie\Irc\Event\UserEvent;

/**
 * Tests for \Phergie\Irc\Event\EventConverter.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class EventConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instance of the class under test
     *
     * @var \Phergie\Irc\Event\EventConverter
     */
    protected $converter;

    /**
     * Connection data
     *
     * @var array
     */
    protected $connection = array(
        'serverHostname' => 'serverHostname',
        'serverPort' => 6668,
        'nickname' => 'nickname',
        'username' => 'username',
        'hostname' => 'hostname',
        'servername' => 'servername',
        'realname' => 'realname',
    );

    /**
     * Event data
     *
     * @var array
     */
    protected $event = array(
        'message' => ":WiZ!jto@tolsun.oulu.fi PART #playzone :I lost\r\n",
        'params' => array(
            'channels' => '#playzone',
            'message' => 'I lost',
            'all' => '#playzone :I lost',
        ),
        'command' => 'PART',
    );

    /**
     * User data
     *
     * @var array
     */
    protected $user = array(
        'prefix' => 'prefix',
        'nick' => 'nick',
        'username' => 'username',
        'host' => 'host',
        'targets' => array('target1', 'target2'),
    );

    /**
     * CTCP data
     *
     * @var array
     */
    protected $ctcp = array(
        'command' => 'command',
        'params' => array('param1', 'param2'),
    );

    /**
     * Instantiates the class under test.
     */
    protected function setUp()
    {
        $this->converter = new EventConverter;
    }

    /**
     * Tests convert() with an Event instance.
     */
    public function testConvertWithEvent()
    {
        $event = new Event;
        $this->initializeEvent($event);
        $expected = array_merge($this->event, array(
            'connection' => $this->connection,
        ));
        $this->assertSame($expected, $this->converter->convert($event));
    }

    /**
     * Tests convert() with a UserEvent instance.
     */
    public function testConvertWithUserEvent()
    {
        $event = new UserEvent;
        $this->initializeUserEvent($event);
        $expected = array_merge($this->event, array(
            'connection' => $this->connection,
            'user' => $this->user,
        ));
        $this->assertSame($expected, $this->converter->convert($event));
    }

    /**
     * Tests convert() with a CtcpEvent instance.
     */
    public function testConvertWithCtcpEvent()
    {
        $event = new CtcpEvent;
        $this->initializeCtcpEvent($event);
        $expected = array_merge($this->event, array(
            'connection' => $this->connection,
            'user' => $this->user,
            'ctcp' => $this->ctcp,
        ));
        $this->assertSame($expected, $this->converter->convert($event));
    }

    /**
     * Primes an Event object with data.
     *
     * @param \Phergie\Irc\Event\Event $event
     */
    protected function initializeEvent(Event $event)
    {
        $connection = Phake::mock('\Phergie\Irc\ConnectionInterface');
        Phake::when($connection)->getServerHostname()->thenReturn($this->connection['serverHostname']);
        Phake::when($connection)->getServerPort()->thenReturn($this->connection['serverPort']);
        Phake::when($connection)->getNickname()->thenReturn($this->connection['nickname']);
        Phake::when($connection)->getUsername()->thenReturn($this->connection['username']);
        Phake::when($connection)->getHostname()->thenReturn($this->connection['hostname']);
        Phake::when($connection)->getServername()->thenReturn($this->connection['servername']);
        Phake::when($connection)->getRealname()->thenReturn($this->connection['realname']);

        $event->setConnection($connection);
        $event->setCommand($this->event['command']);
        $event->setParams($this->event['params']);
        $event->setMessage($this->event['message']);
    }

    /**
     * Primes a UserEvent object with data.
     *
     * @param \Phergie\Irc\Event\UserEvent $event
     */
    protected function initializeUserEvent(UserEvent $event)
    {
        $this->initializeEvent($event);

        $event->setPrefix($this->user['prefix']);
        $event->setNick($this->user['nick']);
        $event->setUsername($this->user['username']);
        $event->setHost($this->user['host']);
        $event->setTargets($this->user['targets']);
    }

    /**
     * Primes a CtcpEvent object with data.
     *
     * @param \Phergie\Irc\Event\CtcpEvent $event
     */
    protected function initializeCtcpEvent(CtcpEvent $event)
    {
        $this->initializeUserEvent($event);

        $event->setCtcpCommand($this->ctcp['command']);
        $event->setCtcpParams($this->ctcp['params']);
    }
}
