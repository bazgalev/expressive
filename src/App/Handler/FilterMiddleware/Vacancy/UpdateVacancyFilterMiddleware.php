<?php

declare(strict_types=1);

namespace App\Handler\FilterMiddleware\Vacancy;

use App\Handler\FilterMiddleware\FilterMiddleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UpdateVacancyFilterMiddleware extends FilterMiddleware
{
    function setData(ServerRequestInterface $request): void
    {
        $data = $request->getParsedBody();
        $data['id'] = $request->getAttribute('id');

        $this->filter->setData($data);
    }
}
