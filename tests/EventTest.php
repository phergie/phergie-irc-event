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

use Phergie\Irc\Event\Event;

/**
 * Tests for \Phergie\Irc\Event\Event.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class EventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instance of the class under test
     *
     * @var \Phergie\Irc\Event\Event
     */
    protected $event;

    /**
     * Instantiates the class under test.
     */
    protected function setUp()
    {
        $this->event = new Event;
    }

    /**
     * Tests getMessage().
     */
    public function testGetMessage()
    {
        $this->assertNull($this->event->getMessage());
    }

    /**
     * Tests setMessage().
     */
    public function testSetMessage()
    {
        $message = 'event';
        $this->event->setMessage($message);
        $this->assertSame($message, $this->event->getMessage());
    }

    /**
     * Tests getConnection().
     */
    public function testGetConnection()
    {
        $this->assertNull($this->event->getConnection());
    }

    /**
     * Tests setConnection().
     */
    public function testSetConnection()
    {
        $connection = $this->getMock('\Phergie\Irc\ConnectionInterface', array(), array(), '', false);
        $this->event->setConnection($connection);
        $this->assertSame($connection, $this->event->getConnection());
    }

    /**
     * Tests getParams().
     */
    public function testGetParams()
    {
        $this->assertSame(array(), $this->event->getParams());
    }

    /**
     * Tests setParams().
     */
    public function testSetParams()
    {
        $params = array('foo' => 'bar');
        $this->event->setParams($params);
        $this->assertSame($params, $this->event->getParams());
    }

    /**
     * Tests getCommand().
     */
    public function testGetCommand()
    {
        $this->assertNull($this->event->getCommand());
    }

    /**
     * Tests setCommand().
     */
    public function testSetCommand()
    {
        $command = 'COMMAND';
        $this->event->setCommand($command);
        $this->assertSame($command, $this->event->getCommand());
    }
}
