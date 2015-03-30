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

use Phergie\Irc\Event\ParserConverter;
use Phergie\Irc\Event\UserEvent;

/**
 * Tests for \Phergie\Irc\Event\ParserConverter.
 *
 * @category Phergie
 * @package Phergie\Irc\Event
 */
class ParserConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instance of the class under test
     *
     * @var \Phergie\Irc\Event\ParserConverter
     */
    protected $converter;

    /**
     * Data for a user event
     *
     * @var array
     */
    protected $userEvent = array(
        'prefix' => ':WiZ!jto@tolsun.oulu.fi',
        'nick' => 'WiZ',
        'user' => 'jto',
        'host' => 'tolsun.oulu.fi',
        'command' => 'PART',
        'params' => array(
            'channels' => '#playzone',
            'message' => 'I lost',
            'all' => '#playzone :I lost',
        ),
        'targets' => array('#playzone'),
        'message' => ":WiZ!jto@tolsun.oulu.fi PART #playzone :I lost\r\n",
    );

    /**
     * Instantiates the class under test.
     */
    protected function setUp()
    {
        $this->converter = new ParserConverter;
    }

    /**
     * Checks that the class implements the ParserConverterInterface interface.
     */
    public function testClassImplementsParserConverterInterface()
    {
        $this->assertInstanceOf(
            '\Phergie\Irc\Event\ParserConverterInterface',
            $this->converter
        );
    }

    /**
     * Checks that user event data has been converted.
     *
     * @param array $data
     * @param \Phergie\Irc\Event\UserEvent $event
     */
    protected function checkUserEventData(array $data, UserEvent $event)
    {
        $this->assertSame($data['prefix'], $event->getPrefix());
        $this->assertSame($data['nick'], $event->getNick());
        $this->assertSame($data['user'], $event->getUsername());
        $this->assertSame($data['host'], $event->getHost());
        $this->assertSame($data['message'], $event->getMessage());
        $this->assertSame($data['command'], $event->getCommand());
        $this->assertSame($data['targets'], $event->getTargets());
    }

    /**
     * Tests convert() with a user event with targets.
     */
    public function testConvertWithUserEvent()
    {
        $data = $this->userEvent;
        $params = $data['params'];
        unset($params['all']);
        $event = $this->converter->convert($data);
        $this->assertInstanceOf('\Phergie\Irc\Event\UserEvent', $event);
        $this->checkUserEventData($data, $event);
        $this->assertSame($params, $event->getParams());
    }

    /**
     * Tests convert() with a user event with no params.
     */
    public function testConvertWithUserEventWithoutParams()
    {
        $data = $this->userEvent;
        unset($data['params']);
        $event = $this->converter->convert($data);
        $this->assertSame(array(), $event->getParams());
    }

    /**
     * Tests convert() with a user event without prefix data.
     */
    public function testConvertWithUserEventWithoutPrefix()
    {
        $data = $this->userEvent;
        unset($data['prefix'], $data['user'], $data['nick'], $data['host']);
        $params = $data['params'];
        unset($params['all']);
        $event = $this->converter->convert($data);
        $this->assertInstanceOf('\Phergie\Irc\Event\UserEvent', $event);
        $data['prefix'] = $data['user'] = $data['nick'] = $data['host'] = null;
        $this->checkUserEventData($data, $event);
        $this->assertSame($params, $event->getParams());
    }

    /**
     * Tests convert() with a user event without targets.
     */
    public function testConvertWithUserEventWithoutTargets()
    {
        $data = $this->userEvent;
        unset($data['targets']);
        $event = $this->converter->convert($data);
        $this->assertSame(array(), $event->getTargets());
    }

    /**
     * Tests convert() with a server event.
     */
    public function testConvertWithServerEvent()
    {
        $data = array(
            'prefix' => ':pratchett.freenode.net',
            'servername' => 'pratchett.freenode.net',
            'command' => '004',
            'params' => array(
                1 => 'Phergie3',
                2 => 'pratchett.freenode.net',
                3 => 'ircd-seven-1.1.3',
                4 => 'DOQRSZaghilopswz',
                5 => 'CFILMPQbcefgijklmnopqrstvz',
                6 => 'bkloveqjfI',
                'all' => 'Phergie3 pratchett.freenode.net ircd-seven-1.1.3 DOQRSZaghilopswz CFILMPQbcefgijklmnopqrstvz bkloveqjfI',
            ),
            'code' => 'Unknown reply',
            'message' => ":pratchett.freenode.net 004 Phergie3 pratchett.freenode.net ircd-seven-1.1.3 DOQRSZaghilopswz CFILMPQbcefgijklmnopqrstvz bkloveqjfI\r\n",
        );
        $params = $data['params'];
        unset($params['all']);
        $event = $this->converter->convert($data);
        $this->assertSame($data['servername'], $event->getServername());
        $this->assertSame($data['code'], $event->getCode());
        $this->assertSame($data['message'], $event->getMessage());
        $this->assertSame($data['command'], $event->getCommand());
        $this->assertSame($params, $event->getParams());
    }

    /**
     * Tests convert() with a CTCP event with parameters.
     */
    public function testConvertWithCtcpEventWithParams()
    {
        $data = array_merge($this->userEvent, array(
            'ctcp' => array(
                'command' => 'ACTION',
                'params' => array(
                    'all' => 'test',
                ),
            ),
        ));
        $params = $data['params'];
        unset($params['all']);
        $event = $this->converter->convert($data);
        $this->assertInstanceOf('\Phergie\Irc\Event\CtcpEvent', $event);
        $this->checkUserEventData($data, $event);
        $this->assertSame($data['ctcp']['command'], $event->getCtcpCommand());
        $this->assertSame($data['ctcp']['params'], $event->getCtcpParams());
        $this->assertSame($params, $event->getParams());
    }

    /**
     * Tests convert() with a CTCP event without parameters.
     */
    public function testConvertWithCtcpEventWithoutParams()
    {
        $data = array_merge($this->userEvent, array(
            'command' => 'PRIVMSG',
            'params' => array(
                'receivers' => 'victim',
                'text' => "\001VERSION\001",
                'all' => "victim :\001VERSION\001",
            ),
            'targets' => array('victim'),
            'ctcp' => array(
                'command' => 'VERSION',
            ),
        ));
        $params = $data['params'];
        unset($params['all']);
        $event = $this->converter->convert($data);
        $this->assertInstanceOf('\Phergie\Irc\Event\CtcpEvent', $event);
        $this->checkUserEventData($data, $event);
        $this->assertSame($data['ctcp']['command'], $event->getCtcpCommand());
        $ctcpParams = $event->getCtcpParams();
        $this->assertInternalType('array', $ctcpParams);
        $this->assertEmpty($ctcpParams);
        $this->assertSame($params, $event->getParams());
    }
}
