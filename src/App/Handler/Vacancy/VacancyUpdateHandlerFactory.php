<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use Database\Gateways\VacanciesGateway;
use Psr\Container\ContainerInterface;

class VacancyUpdateHandlerFactory
{
    public function __invoke(ContainerInterface $container): VacancyUpdateHandler
    {
        $gateway = $container->get(VacanciesGateway::class);
        return new VacancyUpdateHandler($gateway);
    }
}
