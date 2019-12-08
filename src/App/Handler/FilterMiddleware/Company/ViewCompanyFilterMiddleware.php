<?php

declare(strict_types=1);

namespace App\Handler\FilterMiddleware\Company;

use App\Handler\FilterMiddleware\FilterMiddleware;
use Psr\Http\Message\ServerRequestInterface;

class ViewCompanyFilterMiddleware extends FilterMiddleware
{
    public function setData(ServerRequestInterface $request): void
    {
        $this->filter->setData(['id' => $request->getAttribute('id')]);
    }
}
