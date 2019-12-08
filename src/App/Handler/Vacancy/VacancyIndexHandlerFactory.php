<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use Database\Gateways\VacanciesGateway;
use Psr\Container\ContainerInterface;

class VacancyIndexHandlerFactory
{
    public function __invoke(ContainerInterface $container): VacancyIndexHandler
    {
        $gateway = $container->get(VacanciesGateway::class);
        return new VacancyIndexHandler($gateway);
    }
}
