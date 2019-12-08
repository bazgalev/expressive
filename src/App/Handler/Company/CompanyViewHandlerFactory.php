<?php

declare(strict_types=1);

namespace App\Handler\Company;

use Database\Gateways\CompaniesGateway;
use Psr\Container\ContainerInterface;

class CompanyViewHandlerFactory
{
    public function __invoke(ContainerInterface $container): CompanyViewHandler
    {
        return new CompanyViewHandler($container->get(CompaniesGateway::class));
    }
}
