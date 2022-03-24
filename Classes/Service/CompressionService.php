<?php

namespace Carbon\Compression\Service;

use Neos\Flow\Annotations as Flow;
use Psr\Http\Message\ResponseInterface;
use WyriHaximus\HtmlCompress\Factory as HtmlCompress;
use function GuzzleHttp\Psr7\stream_for;

class CompressionService
{
    /**
     * @var bool
     * @Flow\InjectConfiguration(path="debugMode")
     */
    protected $debugMode;

    /**
     * Modify the given response and return a new one with the compressed content
     *
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function processResponse(ResponseInterface $response): ResponseInterface
    {
        $html = $response->getBody()->getContents();
        $html = HtmlCompress::construct()->compress($html);
        $response = $response->withBody(stream_for($html));

        if (!$this->debugMode) {
            $response = $response->withoutHeader('X-Compression');
        }

        return $response;
    }
}
