<?php

namespace SaaSFormation\Vendor\HTTP\Tests\Unit;

use SaaSFormation\Vendor\HTTP\Body;
use SaaSFormation\Vendor\HTTP\JSONResponder;
use PHPUnit\Framework\TestCase;
use SaaSFormation\Vendor\HTTP\ResponderInterface;
use StraTDeS\VO\Single\UUIDV1;

class JSONResponderTest extends TestCase
{
    private JSONResponder $responder;

    public function setUp(): void
    {
        $this->responder = new JSONResponder();
    }

    public function testRespondOkReturnsAValidResponse()
    {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedBodyArray = [
            'data' => [
                'foo' => 'bar'
            ]
        ];
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondOk($body);

        // Assert
        $this->assertEquals(ResponderInterface::OK, $response->getStatusCode());
        $this->assertEquals($expectedBodyArray, json_decode($response->getBody(), true));
    }

    public function testRespondOkReturnsAValidEmptyResponse()
    {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondOk();

        // Assert
        $this->assertEquals(ResponderInterface::OK, $response->getStatusCode());
        $this->assertEquals($jsonResponse, json_decode($response->getBody(), true));
    }

    public function testRespondAcceptedReturnsAValidResponse()
    {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedBodyArray = [
            'data' => [
                'foo' => 'bar'
            ]
        ];
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondAccepted($body);

        // Assert
        $this->assertEquals(ResponderInterface::ACCEPTED, $response->getStatusCode());
        $this->assertEquals($expectedBodyArray, json_decode($response->getBody(), true));
    }

    public function testRespondAcceptedReturnsAValidEmptyResponse()
    {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondAccepted();

        // Assert
        $this->assertEquals(ResponderInterface::ACCEPTED, $response->getStatusCode());
        $this->assertEquals($jsonResponse, json_decode($response->getBody(), true));
    }

    public function testRespondCreatedReturnsAValidResponse()
    {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedBodyArray = [
            'data' => [
                'foo' => 'bar'
            ]
        ];
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondCreated($body);

        // Assert
        $this->assertEquals(ResponderInterface::CREATED, $response->getStatusCode());
        $this->assertEquals($expectedBodyArray, json_decode($response->getBody(), true));
    }

    public function testRespondCreatedReturnsAValidEmptyResponse()
    {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondCreated();

        // Assert
        $this->assertEquals(ResponderInterface::CREATED, $response->getStatusCode());
        $this->assertEquals($jsonResponse, json_decode($response->getBody(), true));
    }

    public function testRespondUpdatedReturnsAValidResponse()
    {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedBodyArray = [
            'data' => [
                'foo' => 'bar'
            ]
        ];
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondUpdated($body);

        // Assert
        $this->assertEquals(ResponderInterface::NO_CONTENT, $response->getStatusCode());
        $this->assertEquals($expectedBodyArray, json_decode($response->getBody(), true));
    }

    public function testRespondUpdatedReturnsAValidEmptyResponse()
    {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondUpdated();

        // Assert
        $this->assertEquals(ResponderInterface::NO_CONTENT, $response->getStatusCode());
        $this->assertEquals($jsonResponse, json_decode($response->getBody(), true));
    }

    public function testRespondBadRequestReturnsAValidResponse()
    {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedBodyArray = [
            'data' => [
                'foo' => 'bar'
            ]
        ];
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondBadRequest($body);

        // Assert
        $this->assertEquals(ResponderInterface::BAD_REQUEST, $response->getStatusCode());
        $this->assertEquals($expectedBodyArray, json_decode($response->getBody(), true));
    }

    public function testRespondBadRequestReturnsAValidEmptyResponse()
    {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondBadRequest();

        // Assert
        $this->assertEquals(ResponderInterface::BAD_REQUEST, $response->getStatusCode());
        $this->assertEquals($jsonResponse, json_decode($response->getBody(), true));
    }

    public function testRespondUnauthorizedReturnsAValidResponse()
    {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedBodyArray = [
            'data' => [
                'foo' => 'bar'
            ]
        ];
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondUnauthorized($body);

        // Assert
        $this->assertEquals(ResponderInterface::UNAUTHORIZED, $response->getStatusCode());
        $this->assertEquals($expectedBodyArray, json_decode($response->getBody(), true));
    }

    public function testRespondUnauthorizedReturnsAValidEmptyResponse()
    {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondUnauthorized();

        // Assert
        $this->assertEquals(ResponderInterface::UNAUTHORIZED, $response->getStatusCode());
        $this->assertEquals($jsonResponse, json_decode($response->getBody(), true));
    }

    public function testRespondForbiddenReturnsAValidResponse()
    {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedBodyArray = [
            'data' => [
                'foo' => 'bar'
            ]
        ];
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondForbidden($body);

        // Assert
        $this->assertEquals(ResponderInterface::FORBIDDEN, $response->getStatusCode());
        $this->assertEquals($expectedBodyArray, json_decode($response->getBody(), true));
    }

    public function testRespondForbiddenReturnsAValidEmptyResponse()
    {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondForbidden();

        // Assert
        $this->assertEquals(ResponderInterface::FORBIDDEN, $response->getStatusCode());
        $this->assertEquals($jsonResponse, json_decode($response->getBody(), true));
    }

    public function testRespondErrorReturnsAValidResponse()
    {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedBodyArray = [
            'data' => [
                'foo' => 'bar'
            ]
        ];
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondError($body);

        // Assert
        $this->assertEquals(ResponderInterface::INTERNAL_SERVER_ERROR, $response->getStatusCode());
        $this->assertEquals($expectedBodyArray, json_decode($response->getBody(), true));
    }

    public function testRespondErrorReturnsAValidEmptyResponse()
    {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondError();

        // Assert
        $this->assertEquals(ResponderInterface::INTERNAL_SERVER_ERROR, $response->getStatusCode());
        $this->assertEquals($jsonResponse, json_decode($response->getBody(), true));
    }

    public function testRespondAsyncCommandReturnsAValidResponse()
    {
        // Arrange
        $commandId = UUIDV1::generate();
        $expectedJSONArray = [
            "data" => [
                "relationships" => [
                    "command" => [
                        "status" => "/commands/" . $commandId->getHumanReadableId() . "/status"
                    ]
                ]
            ]
        ];

        // Act
        $response = $this->responder->respondAsyncCommand($commandId);

        // Assert
        $this->assertEquals(ResponderInterface::ACCEPTED, $response->getStatusCode());
        $this->assertEquals($expectedJSONArray, json_decode($response->getBody(), true));
    }
}
