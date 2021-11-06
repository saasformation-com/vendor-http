<?php

namespace SaaSFormation\Vendor\HTTP;

use Psr\Http\Message\ResponseInterface;
use StraTDeS\VO\Single\Id;

interface ResponderInterface
{
    public const OK = 200;
    public const CREATED = 201;
    public const ACCEPTED = 202;
    public const NO_CONTENT = 204;
    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const FORBIDDEN = 403;
    public const INTERNAL_SERVER_ERROR = 500;

    public function respondOk(?Body $body = null): ResponseInterface;

    public function respondUnauthorized(?Body $body = null): ResponseInterface;

    public function respondError(?Body $body = null): ResponseInterface;

    public function respondBadRequest(?Body $body = null): ResponseInterface;

    public function respondCreated(?Body $body = null): ResponseInterface;

    public function respondUpdated(?Body $body = null): ResponseInterface;

    public function respondAccepted(?Body $body = null): ResponseInterface;

    public function respondForbidden(?Body $body = null): ResponseInterface;

    public function respondAsyncCommand(Id $commandId): ResponseInterface;
}
