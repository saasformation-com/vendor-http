<?php

namespace SaaSFormation\Vendor\HTTP\Tests\Unit;

use PHPUnit\Framework\TestCase;
use React\Http\Io\BufferedBody;
use React\Http\Message\ServerRequest;
use RingCentral\Psr7\BufferStream;
use RingCentral\Psr7\Uri;
use SaaSFormation\Vendor\CommandBus\CommandBusManager;
use SaaSFormation\Vendor\HTTP\JSONResponder;
use SaaSFormation\Vendor\HTTP\ParsedBody;
use SaaSFormation\Vendor\HTTP\ParsedUrlParams;
use SaaSFormation\Vendor\HTTP\ResponderInterface;

class ControllerTest extends TestCase
{
    public function testGeneralErrorWithAcceptJSONReturnsAValidJSONResponse() {
        // Arrange
        $request = (new ServerRequest('POST', 'localhost', ['Accept', 'application/json']));
        $commandBus = $this->createMock(CommandBusManager::class);
        $responder = new JSONResponder();
        $controller = new GeneralErrorFakeController(
            $responder, $commandBus
        );
        $controller->setRequest($request);

        // Act
        $response = $controller->route($request);

        // Assert
        $this->assertEquals([
            'data' => [
                'error' => [
                    'code' => ResponderInterface::INTERNAL_SERVER_ERROR,
                    'message' => 'Test'
                ]
            ]
        ], json_decode($response->getBody(), true));
    }

    public function testCommandBusMethodReturnsTheCommandBusPassedOnConstruction()
    {
        // Arrange
        $request = (new ServerRequest('POST', 'localhost', ['Accept', 'application/json']));
        $expectedCommandBus = $this->createMock(CommandBusManager::class);
        $responder = new JSONResponder();
        $controller = new GeneralErrorFakeController(
            $responder, $expectedCommandBus
        );
        $controller->setRequest($request);

        // Act
        $commandBus = $controller->commandBus();

        // Assert
        $this->assertEquals($expectedCommandBus, $commandBus);
    }

    public function testParsedBodyMethodReturnsAValidParsedBody()
    {
        // Arrange
        $body = json_encode(['data' => ['foo' => 'bar']]);
        $request = (new ServerRequest('POST', 'localhost', ['Accept', 'application/json'], $body));
        $commandBus = $this->createMock(CommandBusManager::class);
        $responder = new JSONResponder();
        $controller = new GeneralErrorFakeController(
            $responder, $commandBus
        );
        $controller->setRequest($request);
        $expectedParsedBody = new ParsedBody(new BufferedBody($body));

        // Act
        $parsedBody = $controller->parsedBody();

        // Assert
        $this->assertEquals($expectedParsedBody, $parsedBody);
    }

    public function testParsedUrlParamsMethodReturnsAValidParsedUrlParams()
    {
        // Arrange
        $urlString = 'localhost';
        $request = (new ServerRequest('POST', $urlString, ['Accept', 'application/json']));
        $commandBus = $this->createMock(CommandBusManager::class);
        $responder = new JSONResponder();
        $controller = new GeneralErrorFakeController(
            $responder, $commandBus
        );
        $controller->setRequest($request);
        $url = new Uri($urlString);
        $expectedParsedUrlParams = new ParsedUrlParams($url);

        // Act
        $parsedUrlParams = $controller->parsedUrlParams();

        // Assert
        $this->assertEquals($expectedParsedUrlParams, $parsedUrlParams);
    }
}
