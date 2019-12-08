<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class VacancyViewHandler extends VacancyHandler
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $vacancy = $this->vacanciesGateway->getInfo((int)$request->getAttribute('id'));

        return new JsonResponse($vacancy);
    }
}
