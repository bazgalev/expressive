<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use App\Filters\Vacancy\VacancyUpdateFilter;
use Database\Entities\Vacancy;
use Database\Gateways\VacanciesGateway;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Diactoros\Response\JsonResponse;

class VacancyUpdateHandler extends VacancyHandler
{

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws Exception
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');
        $body = $request->getParsedBody();

        /** @var ResultSet $rowSet */
        $rowSet = $this->vacanciesGateway->select(['id = ?' => $id]);

        /** @var Vacancy $user */
        $user = $rowSet->current();
        $user = $user->update($body, $this->vacanciesGateway);


        return new JsonResponse($user->toArray(), 201);
    }
}
