<?php

namespace SaaSFormation\Vendor\HTTP;

use Psr\Http\Message\ResponseInterface;
use React\Http\Message\Response;
use StraTDeS\VO\Single\Id;

abstract class AbstractResponder implements ResponderInterface
{
    protected abstract function defaultFormat(): string;

    protected abstract function transformer(): BodyTransformerInterface;

    protected function defaultHeaders(): array
    {
        return [
            "Content-Type" => $this->defaultFormat()
        ];
    }

    public function respondOk(?Body $body = null): ResponseInterface
    {

        return $this->respond(self::OK, $body);
    }

    public function respondAccepted(?Body $body = null): ResponseInterface
    {

        return $this->respond(self::ACCEPTED, $body);
    }

    public function respondCreated(?Body $body = null): ResponseInterface
    {

        return $this->respond(self::CREATED, $body);
    }

    public function respondUpdated(?Body $body = null): ResponseInterface
    {

        return $this->respond(self::NO_CONTENT, $body);
    }

    public function respondBadRequest(?Body $body = null): ResponseInterface
    {

        return $this->respond(self::BAD_REQUEST, $body);
    }

    public function respondUnauthorized(?Body $body = null): ResponseInterface
    {

        return $this->respond(self::UNAUTHORIZED, $body);
    }

    public function respondForbidden(?Body $body = null): ResponseInterface
    {

        return $this->respond(self::FORBIDDEN, $body);
    }

    public function respondError(?Body $body = null): ResponseInterface
    {
        return $this->respond(self::INTERNAL_SERVER_ERROR, $body);
    }

    public function respondAsyncCommand(Id $commandId): ResponseInterface
    {
        return $this->respondAccepted(new Body([
            "relationships" => [
                "command" => [
                    "status" => "/commands/" . $commandId->getHumanReadableId() . "/status"
                ]
            ]
        ]));
    }

    private function respond(int $statusCode, ?Body $body = null): ResponseInterface
    {
        return new Response($statusCode, $this->defaultHeaders(), $this->transformer()->transform($body));
    }
}
