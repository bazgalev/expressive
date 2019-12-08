<?php

declare(strict_types=1);

namespace App\Handler\FilterMiddleware\Vacancy;

use App\Filters\Vacancy\VacancyUpdateFilter;
use Psr\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;

class UpdateVacancyFilterMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): UpdateVacancyFilterMiddleware
    {
        $adapter = $container->get(Adapter::class);
        return new UpdateVacancyFilterMiddleware(new VacancyUpdateFilter($adapter));
    }
}
