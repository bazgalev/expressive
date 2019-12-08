<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\Helper\BodyParams\BodyParamsMiddleware;
use Zend\Expressive\MiddlewareFactory;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/:id', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container): void {

    $app->get('/vacancies', \App\Handler\Vacancy\VacancyIndexHandler::class, 'vacancies.index');


    $app->get('/vacancy/{id}', [
        \App\Handler\FilterMiddleware\Vacancy\ExistVacancyFilterMiddleware::class,
        \App\Handler\Vacancy\VacancyViewHandler::class
    ], 'vacancy.view');

    $app->post('/vacancy', [
        \App\Handler\FilterMiddleware\Vacancy\CreateFilterMiddleware::class,
        \App\Handler\Vacancy\VacancyCreateHandler::class
    ], 'vacancies.create');

    $app->delete('/vacancy/{id}', [
        \App\Handler\FilterMiddleware\Vacancy\ExistVacancyFilterMiddleware::class,
        \App\Handler\Vacancy\VacancyDeleteHandler::class
    ], 'vacancies.delete');

    $app->put('/vacancy/{id}', [
        \App\Handler\FilterMiddleware\Vacancy\UpdateVacancyFilterMiddleware::class,
        \App\Handler\Vacancy\VacancyUpdateHandler::class
    ], 'vacancies.put');


    $app->patch('/vacancy/{id}', [
        \App\Handler\FilterMiddleware\Vacancy\UpdateVacancyFilterMiddleware::class,
        \App\Handler\Vacancy\VacancyUpdateHandler::class
    ], 'vacancies.patch');


    $app->get('/company/{id}', [
        \App\Handler\FilterMiddleware\Company\ViewCompanyFilterMiddleware::class,
        App\Handler\Company\CompanyViewHandler::class
    ], 'company.view');

    $app->get('/', App\Handler\HomePageHandler::class, 'home');
    $app->get('/api/ping', App\Handler\PingHandler::class, 'api.ping');
};
