<?php

declare(strict_types=1);

namespace App\Handler\FilterMiddleware\Vacancy;

use App\Filters\Vacancy\VacancyExistFilter;
use Psr\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;

class ExistVacancyFilterMiddlewareFactory
{
    /**
     * @param ContainerInterface $container
     * @return ExistVacancyFilterMiddleware
     */
    public function __invoke(ContainerInterface $container): ExistVacancyFilterMiddleware
    {
        $adapter = $container->get(Adapter::class);
        return new ExistVacancyFilterMiddleware(new VacancyExistFilter($adapter));
    }
}
