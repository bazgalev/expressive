<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 21:14
 */

namespace App\Handler\FilterMiddleware;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\InputFilter\InputFilter;

abstract class FilterMiddleware implements MiddlewareInterface
{
    protected $filter;

    public function __construct(InputFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     * @throws Exception
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        static::setData($request);

        if (!$this->filter->isValid()) {
            throw new Exception(json_encode($this->filter->getMessages()), 422);
        }
        return $handler->handle($request);
    }

    abstract function setData(ServerRequestInterface $request): void;
}
