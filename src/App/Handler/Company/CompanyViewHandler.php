<?php

declare(strict_types=1);

namespace App\Handler\Company;

use Database\Gateways\CompaniesGateway;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class CompanyViewHandler implements RequestHandlerInterface
{
    protected $gateway;

    public function __construct(CompaniesGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $company = $this->gateway->getById((int)$request->getAttribute('id'));

        return new JsonResponse($company->toArray());
    }
}
