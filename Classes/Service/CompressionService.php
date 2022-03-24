<?php

namespace Carbon\Compression\Service;

use Neos\Flow\Annotations as Flow;
use Psr\Http\Message\ResponseInterface;
use WyriHaximus\HtmlCompress\Factory as HtmlCompress;
use GuzzleHttp\Psr7\Utils;

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
        $response = $response->withBody(Utils::streamFor($html));

        if (!$this->debugMode) {
            $response = $response->withoutHeader('X-Compression');
        }

        return $response;
    }
}
