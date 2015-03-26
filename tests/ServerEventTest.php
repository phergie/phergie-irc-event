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

use Phergie\Irc\Event\ServerEvent;

/**
 * Tests for \Phergie\Irc\Event\ServerEvent.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class ServerEventTest extends EventTest
{
    /**
     * Instance of the class under test
     *
     * @var \Phergie\Irc\Event\ServerEvent
     */
    protected $event;

    /**
     * Instantiates the class under test.
     */
    protected function setUp()
    {
        $this->event = new ServerEvent;
    }

    /**
     * Tests getServername().
     */
    public function testGetServername()
    {
        $this->assertNull($this->event->getServername());
    }

    /**
     * Tests setServername().
     */
    public function testSetServername()
    {
        $servername = 'servername';
        $this->event->setServername($servername);
        $this->assertSame($servername, $this->event->getServername());
    }

    /**
     * Tests getCode().
     */
    public function testGetCode()
    {
        $this->assertNull($this->event->getCode());
    }

    /**
     * Tests setCode().
     */
    public function testSetCode()
    {
        $code = 'code';
        $this->event->setCode($code);
        $this->assertSame($code, $this->event->getCode());
    }
}
