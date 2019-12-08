<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use Database\Gateways\VacanciesGateway;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class VacancyIndexHandler implements RequestHandlerInterface
{
    protected $vacanciesGateway;

    public function __construct(VacanciesGateway $vacanciesGateway)
    {
        $this->vacanciesGateway = $vacanciesGateway;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse($this->vacanciesGateway->getAll());

    }
}
