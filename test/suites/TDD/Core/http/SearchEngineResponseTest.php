<?php
/**
 * @license see LICENSE
 */

namespace Serps\Test\Core\Http\Proxy;

use Serps\Core\Http\SearchEngineResponse;
use Serps\Core\UrlArchive;

/**
 * @covers Serps\Core\Http\SearchEngineResponse
 */
class SearchEngineResponseTest extends \PHPUnit\Framework\TestCase
{


    protected function getResponse()
    {
        return new SearchEngineResponse(
            ['foo' => 'bar', 'bar' => 'baz'],
            200,
            '<html></html>',
            true,
            UrlArchive::fromString('http://foo.bar'),
            UrlArchive::fromString('http://foo.baz'),
            null
        );
    }

    public function testGetHeader()
    {
        $response = $this->getResponse();
        $this->assertEquals('bar', $response->getHeader('foo'));
        $this->assertEquals('baz', $response->getHeader('bar'));
        $this->assertNull($response->getHeader('fake'));
    }


    public function testHasHeader()
    {
        $response = $this->getResponse();
        $this->assertTrue($response->hasHeader('foo'));
        $this->assertTrue($response->hasHeader('bar'));
        $this->assertFalse($response->hasHeader('fake'));
    }

    public function testGetHeaders()
    {
        $response = $this->getResponse();
        $this->assertEquals(['foo' => 'bar', 'bar' => 'baz'], $response->getHeaders());
    }

    public function testGetHttpResponseStatus()
    {
        $response = $this->getResponse();
        $this->assertEquals(200, $response->getHttpResponseStatus());
    }

    public function testIsPageEvaluated()
    {
        $response = $this->getResponse();
        $this->assertEquals(true, $response->isPageEvaluated());
    }

    public function testGetPageContent()
    {
        $response = $this->getResponse();
        $this->assertEquals('<html></html>', $response->getPageContent());
    }

    public function testGetInitialUrl()
    {
        $response = $this->getResponse();
        $this->assertEquals('http://foo.bar', (string)$response->getInitialUrl());
    }

    public function testGetEffectiveUrl()
    {
        $response = $this->getResponse();
        $this->assertEquals('http://foo.baz', (string)$response->getEffectiveUrl());
    }

    public function testGetProxy()
    {
        $response = $this->getResponse();
        $this->assertNull($response->getProxy());
    }
}
