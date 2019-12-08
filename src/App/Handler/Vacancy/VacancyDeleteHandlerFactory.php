<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use Database\Gateways\VacanciesGateway;
use Psr\Container\ContainerInterface;

class VacancyDeleteHandlerFactory
{
    public function __invoke(ContainerInterface $container): VacancyDeleteHandler
    {
        $gateway = $container->get(VacanciesGateway::class);
        return new VacancyDeleteHandler($gateway);
    }
}
