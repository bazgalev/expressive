<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use App\Filters\Vacancy\VacancyCreateFilter;
use Database\Entities\Vacancy;
use Database\Gateways\VacanciesGateway;
use HttpRequestException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Db\Exception\RuntimeException;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Validator\Db\RecordExists;
use Zend\Validator\StringLength;

class VacancyCreateHandler implements RequestHandlerInterface
{

    protected $vacanciesGateway;

    public function __construct(VacanciesGateway $vacanciesGateway)
    {
        $this->vacanciesGateway = $vacanciesGateway;
    }

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
