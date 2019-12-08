<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use Database\Entities\Vacancy;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class VacancyCreateHandler extends VacancyHandler
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws \Exception
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $body = $request->getParsedBody();

        $vacancy = Vacancy::create(
            $body['company_id'],
            $body['user_id'],
            $body['name'],
            $body['description'],
            $this->vacanciesGateway
        );

        return new JsonResponse($vacancy->toArray(), 201);
    }
}
