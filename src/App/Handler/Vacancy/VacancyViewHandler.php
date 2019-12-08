<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\TableIdentifier;
use Zend\Diactoros\Response\JsonResponse;

class VacancyViewHandler extends VacancyHandler
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $vacancy = $this->vacanciesGateway->getInfo((int)$request->getAttribute('id'));

        return new JsonResponse($vacancy);
    }
}
