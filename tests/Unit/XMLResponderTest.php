<?php

namespace SaaSFormation\Vendor\HTTP\Tests\Unit;

use PHPUnit\Framework\TestCase;
use SaaSFormation\Vendor\HTTP\Body;
use SaaSFormation\Vendor\HTTP\ResponderInterface;
use SaaSFormation\Vendor\HTTP\XMLResponder;
use StraTDeS\VO\Single\UUIDV1;

class XMLResponderTest extends TestCase
{
    private XMLResponder $responder;

    public function setUp(): void
    {
        $this->responder = new XMLResponder();
    }

    public function testRespondOkReturnsAValidResponse() {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><data><foo>bar</foo></data>";
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondOk($body);

        // Assert
        $this->assertEquals(ResponderInterface::OK, $response->getStatusCode());
        $this->assertEquals($expectedXML, str_replace(["\n", "\r"], "", (string)$response->getBody()));
    }

    public function testRespondOkReturnsAValidEmptyResponse() {
        // Arrange
        $expectedXML = "";

        // Act
        $response = $this->responder->respondOk();

        // Assert
        $this->assertEquals(ResponderInterface::OK, $response->getStatusCode());
        $this->assertEquals($expectedXML, str_replace(["\n", "\r"], "", (string)$response->getBody()));
    }

    public function testRespondAcceptedReturnsAValidResponse() {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><data><foo>bar</foo></data>";
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondAccepted($body);

        // Assert
        $this->assertEquals(ResponderInterface::ACCEPTED, $response->getStatusCode());
        $this->assertEquals($expectedXML, str_replace(["\n", "\r"], "", (string)$response->getBody()));
    }

    public function testRespondAcceptedReturnsAValidEmptyResponse() {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondAccepted();

        // Assert
        $this->assertEquals(ResponderInterface::ACCEPTED, $response->getStatusCode());
        $this->assertEquals($jsonResponse, $response->getBody());
    }

    public function testRespondCreatedReturnsAValidResponse() {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><data><foo>bar</foo></data>";
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondCreated($body);

        // Assert
        $this->assertEquals(ResponderInterface::CREATED, $response->getStatusCode());
        $this->assertEquals($expectedXML, str_replace(["\n", "\r"], "", (string)$response->getBody()));
    }

    public function testRespondCreatedReturnsAValidEmptyResponse() {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondCreated();

        // Assert
        $this->assertEquals(ResponderInterface::CREATED, $response->getStatusCode());
        $this->assertEquals($jsonResponse, $response->getBody());
    }

    public function testRespondUpdatedReturnsAValidResponse() {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><data><foo>bar</foo></data>";
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondUpdated($body);

        // Assert
        $this->assertEquals(ResponderInterface::NO_CONTENT, $response->getStatusCode());
        $this->assertEquals($expectedXML, str_replace(["\n", "\r"], "", (string)$response->getBody()));
    }

    public function testRespondUpdatedReturnsAValidEmptyResponse() {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondUpdated();

        // Assert
        $this->assertEquals(ResponderInterface::NO_CONTENT, $response->getStatusCode());
        $this->assertEquals($jsonResponse, $response->getBody());
    }

    public function testRespondBadRequestReturnsAValidResponse() {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><data><foo>bar</foo></data>";
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondBadRequest($body);

        // Assert
        $this->assertEquals(ResponderInterface::BAD_REQUEST, $response->getStatusCode());
        $this->assertEquals($expectedXML, str_replace(["\n", "\r"], "", (string)$response->getBody()));
    }

    public function testRespondBadRequestReturnsAValidEmptyResponse() {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondBadRequest();

        // Assert
        $this->assertEquals(ResponderInterface::BAD_REQUEST, $response->getStatusCode());
        $this->assertEquals($jsonResponse, $response->getBody());
    }

    public function testRespondUnauthorizedReturnsAValidResponse() {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><data><foo>bar</foo></data>";
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondUnauthorized($body);

        // Assert
        $this->assertEquals(ResponderInterface::UNAUTHORIZED, $response->getStatusCode());
        $this->assertEquals($expectedXML, str_replace(["\n", "\r"], "", (string)$response->getBody()));
    }

    public function testRespondUnauthorizedReturnsAValidEmptyResponse() {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondUnauthorized();

        // Assert
        $this->assertEquals(ResponderInterface::UNAUTHORIZED, $response->getStatusCode());
        $this->assertEquals($jsonResponse, $response->getBody());
    }

    public function testRespondForbiddenReturnsAValidResponse() {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><data><foo>bar</foo></data>";
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondForbidden($body);

        // Assert
        $this->assertEquals(ResponderInterface::FORBIDDEN, $response->getStatusCode());
        $this->assertEquals($expectedXML, str_replace(["\n", "\r"], "", (string)$response->getBody()));
    }

    public function testRespondForbiddenReturnsAValidEmptyResponse() {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondForbidden();

        // Assert
        $this->assertEquals(ResponderInterface::FORBIDDEN, $response->getStatusCode());
        $this->assertEquals($jsonResponse, $response->getBody());
    }

    public function testRespondErrorReturnsAValidResponse() {
        // Arrange
        $bodyArray = [
            'foo' => 'bar'
        ];
        $expectedXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><data><foo>bar</foo></data>";
        $body = new Body($bodyArray);

        // Act
        $response = $this->responder->respondError($body);

        // Assert
        $this->assertEquals(ResponderInterface::INTERNAL_SERVER_ERROR, $response->getStatusCode());
        $this->assertEquals($expectedXML, str_replace(["\n", "\r"], "", (string)$response->getBody()));
    }

    public function testRespondErrorReturnsAValidEmptyResponse() {
        // Arrange
        $jsonResponse = "";

        // Act
        $response = $this->responder->respondError();

        // Assert
        $this->assertEquals(ResponderInterface::INTERNAL_SERVER_ERROR, $response->getStatusCode());
        $this->assertEquals($jsonResponse, $response->getBody());
    }

    public function testRespondAsyncCommandReturnsAValidResponse() {
        // Arrange
        $commandId = UUIDV1::generate();
        $expectedXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><data><relationships><command><status>/commands/" . $commandId->getHumanReadableId() . "/status</status></command></relationships></data>";

        // Act
        $response = $this->responder->respondAsyncCommand($commandId);

        // Assert
        $this->assertEquals(ResponderInterface::ACCEPTED, $response->getStatusCode());
        $this->assertEquals($expectedXML, str_replace(["\n", "\r"], "", (string)$response->getBody()));
    }
}
