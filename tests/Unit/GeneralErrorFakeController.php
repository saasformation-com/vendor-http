<?php

namespace SaaSFormation\Vendor\HTTP\Tests\Unit;

use Psr\Http\Message\ResponseInterface;
use SaaSFormation\Vendor\CommandBus\CommandBusManager;
use SaaSFormation\Vendor\HTTP\Controller;
use SaaSFormation\Vendor\HTTP\ParsedBody;
use SaaSFormation\Vendor\HTTP\ParsedUrlParams;

class GeneralErrorFakeController extends Controller
{
    protected function execute(): ResponseInterface
    {
        throw new \Exception("Test");
    }

    public function parsedBody(): ParsedBody
    {
        return parent::parsedBody();
    }

    public function parsedUrlParams(): ParsedUrlParams
    {
        return parent::parsedUrlParams();
    }

    public function commandBus(): CommandBusManager
    {
        return parent::commandBus();
    }
}
