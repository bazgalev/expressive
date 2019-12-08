<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use Database\Gateways\VacanciesGateway;
use Psr\Container\ContainerInterface;

class VacancyViewHandlerFactory
{
    public function __invoke(ContainerInterface $container) : VacancyViewHandler
    {
        return new VacancyViewHandler($container->get(VacanciesGateway::class));
    }
}
