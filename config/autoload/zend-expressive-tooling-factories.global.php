<?php
/**
 * This file generated by Zend\Expressive\Tooling\Factory\ConfigInjector.
 *
 * Modifications should be kept at a minimum, and restricted to adding or
 * removing factory definitions; other dependency types may be overwritten
 * when regenerating this file via zend-expressive-tooling commands.
 */


declare(strict_types=1);

return [
    'dependencies' => [
        'factories' => [
            App\Handler\Company\CompanyViewHandler::class => App\Handler\Company\CompanyViewHandlerFactory::class,
            App\Handler\FilterMiddleware\Company\ViewCompanyFilterMiddleware::class => App\Handler\FilterMiddleware\Company\ViewCompanyFilterMiddlewareFactory::class,
            \App\Handler\FilterMiddleware\Vacancy\CreateFilterMiddleware::class => App\Handler\FilterMiddleware\Vacancy\CreateVacancyFilterFactory::class,
            App\Handler\FilterMiddleware\Vacancy\ExistVacancyFilterMiddleware::class => App\Handler\FilterMiddleware\Vacancy\ExistVacancyFilterMiddlewareFactory::class,
            App\Handler\FilterMiddleware\Vacancy\UpdateVacancyFilterMiddleware::class => App\Handler\FilterMiddleware\Vacancy\UpdateVacancyFilterMiddlewareFactory::class,
            App\Handler\FilterMiddleware\Company\ViewCompanyFilterMiddleware::class => App\Handler\FilterMiddleware\Company\ViewCompanyFilterMiddlewareFactory::class,
            App\Handler\Vacancy\VacancyCreateHandler::class => App\Handler\Vacancy\VacancyCreateHandlerFactory::class,
            App\Handler\Vacancy\VacancyDeleteHandler::class => App\Handler\Vacancy\VacancyDeleteHandlerFactory::class,
            App\Handler\Vacancy\VacancyIndexHandler::class => App\Handler\Vacancy\VacancyIndexHandlerFactory::class,
            App\Handler\Vacancy\VacancyUpdateHandler::class => App\Handler\Vacancy\VacancyUpdateHandlerFactory::class,
            App\Handler\Vacancy\VacancyViewHandler::class => App\Handler\Vacancy\VacancyViewHandlerFactory::class,
        ],
    ],
];
