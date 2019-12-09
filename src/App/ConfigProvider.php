<?php

declare(strict_types=1);

namespace App;
/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies(): array
    {
        return [
            'invokables' => [
            ],
            'factories' => [
                Handler\Company\CompanyViewHandler::class => Handler\Company\CompanyViewHandlerFactory::class,
                Handler\FilterMiddleware\Company\ViewCompanyFilterMiddleware::class => Handler\FilterMiddleware\Company\ViewCompanyFilterMiddlewareFactory::class,
                Handler\FilterMiddleware\Vacancy\CreateFilterMiddleware::class => Handler\FilterMiddleware\Vacancy\CreateVacancyFilterFactory::class,
                Handler\FilterMiddleware\Vacancy\ExistVacancyFilterMiddleware::class => Handler\FilterMiddleware\Vacancy\ExistVacancyFilterMiddlewareFactory::class,
                Handler\FilterMiddleware\Vacancy\UpdateVacancyFilterMiddleware::class => Handler\FilterMiddleware\Vacancy\UpdateVacancyFilterMiddlewareFactory::class,
                Handler\FilterMiddleware\Company\ViewCompanyFilterMiddleware::class => Handler\FilterMiddleware\Company\ViewCompanyFilterMiddlewareFactory::class,
                Handler\Vacancy\VacancyCreateHandler::class => Handler\Vacancy\VacancyCreateHandlerFactory::class,
                Handler\Vacancy\VacancyDeleteHandler::class => Handler\Vacancy\VacancyDeleteHandlerFactory::class,
                Handler\Vacancy\VacancyIndexHandler::class => Handler\Vacancy\VacancyIndexHandlerFactory::class,
                Handler\Vacancy\VacancyUpdateHandler::class => Handler\Vacancy\VacancyUpdateHandlerFactory::class,
                Handler\Vacancy\VacancyViewHandler::class => Handler\Vacancy\VacancyViewHandlerFactory::class,
            ],
        ];
    }
}
