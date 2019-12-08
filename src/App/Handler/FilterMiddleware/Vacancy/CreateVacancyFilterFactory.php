<?php

declare(strict_types=1);

namespace App\Handler\FilterMiddleware\Vacancy;

use App\Filters\Vacancy\VacancyCreateFilter;
use Psr\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;

class CreateVacancyFilterFactory
{
    public function __invoke(ContainerInterface $container): CreateFilterMiddleware
    {
        $adapter = $container->get(Adapter::class);
        return new CreateFilterMiddleware(new VacancyCreateFilter($adapter));
    }
}
