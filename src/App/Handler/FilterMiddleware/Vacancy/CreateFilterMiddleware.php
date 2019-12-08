<?php

declare(strict_types=1);

namespace App\Handler\FilterMiddleware\Vacancy;

use App\Handler\FilterMiddleware\FilterMiddleware;
use Psr\Http\Message\ServerRequestInterface;

class CreateFilterMiddleware extends FilterMiddleware
{
    function setData(ServerRequestInterface $request): void
    {
        $this->filter->setData($request->getParsedBody());
    }
}
