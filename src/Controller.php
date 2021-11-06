<?php

namespace SaaSFormation\Vendor\HTTP;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use SaaSFormation\Vendor\CommandBus\CommandBusManager;

abstract class Controller
{
    private AbstractResponder $responder;
    private CommandBusManager $commandBus;
    private ?ServerRequestInterface $request = null;

    public function __construct(AbstractResponder $responder, CommandBusManager $commandBus)
    {
        $this->responder = $responder;
        $this->commandBus = $commandBus;
    }

    public function route(): ResponseInterface
    {
        try {
            return $this->execute();
        } catch (\Throwable $e) {
            $body = new Body([
                'error' => [
                    'code' => ResponderInterface::INTERNAL_SERVER_ERROR,
                    'message' => $e->getMessage()
                ]
            ]);

            return $this->responder()->respondError($body);
        }
    }

    public function setRequest(ServerRequestInterface $request): void
    {
        $this->request = $request;
    }

    protected function responder(): ResponderInterface
    {
        return $this->responder;
    }

    protected function request(): ?ServerRequestInterface
    {
        return $this->request;
    }

    protected function parsedBody(): ParsedBody
    {
        $this->checkRequestIsSet();
        return new ParsedBody($this->request()->getBody());
    }

    protected function parsedUrlParams(): ParsedUrlParams
    {
        $this->checkRequestIsSet();
        return new ParsedUrlParams($this->request()->getUri());
    }

    protected function commandBus(): CommandBusManager
    {
        return $this->commandBus;
    }

    protected abstract function execute(): ResponseInterface;

    private function checkRequestIsSet(): void
    {
        if (!$this->request()) {
            throw new ControllerRequestNotSetException(
                "You must call setRequest before using some methods of the controller"
            );
        }
    }
}
