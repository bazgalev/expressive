<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class VacancyDeleteHandler extends VacancyHandler
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws Exception
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = (int)$request->getAttribute('id');

        $this->vacanciesGateway->delete(['id = ?' => $id]);

        return new JsonResponse($id, 204);
    }
}
