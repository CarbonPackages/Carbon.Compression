<?php

namespace Carbon\Compression\Middleware;

use Neos\Flow\Annotations as Flow;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Carbon\Compression\Service\CompressionService;

class CompressionMiddleware implements MiddlewareInterface
{
    /**
     * @var CompressionService
     * @Flow\Inject
     */
    protected $compressionService;

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        if ($response->getHeaderLine('X-Compression') == 'enabled') {
            return $this->compressionService->processResponse($response);
        } else {
            return $response;
        }
    }
}
