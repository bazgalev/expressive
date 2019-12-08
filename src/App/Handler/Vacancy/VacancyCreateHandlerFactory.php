<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use Database\Gateways\VacanciesGateway;
use Psr\Container\ContainerInterface;

class VacancyCreateHandlerFactory
{
    public function __invoke(ContainerInterface $container) : VacancyCreateHandler
    {
        $gateway = $container->get(VacanciesGateway::class);
        return new VacancyCreateHandler($gateway);
    }
}
