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

class VacancyUpdateHandler implements RequestHandlerInterface
{
    protected $gateway;

    public function __construct(VacanciesGateway $gateway)
    {
        $this->gateway = $gateway;
    }

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
        $rowSet = $this->gateway->select(['id = ?' => $id]);

        /** @var Vacancy $user */
        $user = $rowSet->current();
        $user = $user->update($body, $this->gateway);


        return new JsonResponse($user->toArray(), 201);
    }
}
