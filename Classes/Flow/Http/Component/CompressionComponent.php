<?php

namespace Carbon\Compression\Flow\Http\Component;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Http\Component\ComponentInterface;
use Neos\Flow\Http\Component\ComponentContext;


/**
 * Class CompressionComponent
 * @package Carbon\Compression\Flow\Http\Component
 * @author Alexander Dick <a.dick@conecto.at>
 */
class CompressionComponent implements ComponentInterface
{

    /**
     * @var array
     */
    protected $options;

    /**
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $this->options = $options;
    }

    /**
     * gzip/deflate the response content
     * @param ComponentContext $componentContext
     * @return void
     */
    public function handle(ComponentContext $componentContext)
    {
        $response = $componentContext->getHttpResponse();
        $acceptEncoding = $componentContext->getHttpRequest()->getHeader('Accept-Encoding');
        if (strpos($acceptEncoding, 'gzip') !== FALSE) {
            $content = gzencode($response->getContent());
            $response->setHeader('Content-Encoding', 'gzip');
            $response->setContent($content);
        } else if(strpos($acceptEncoding, 'deflate') !== FALSE) {
            $content = gzdeflate($response->getContent());
            $response->setHeader('Content-Encoding', 'deflate');
            $response->setContent($content);
        }
    }
}
