<?php

declare(strict_types=1);

namespace App\Handler\FilterMiddleware\Company;

use App\Filters\Company\CompanyViewFilter;
use Psr\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;

class ViewCompanyFilterMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): ViewCompanyFilterMiddleware
    {
        return new ViewCompanyFilterMiddleware(new CompanyViewFilter($container->get(Adapter::class)));
    }
}
