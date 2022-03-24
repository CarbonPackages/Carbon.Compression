<?php

namespace Carbon\Compression\EelHelper;

use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Flow\Annotations as Flow;
use WyriHaximus\HtmlCompress\Factory as HtmlCompress;

/**
 * @Flow\Proxy(false)
 */
class CompressionHelper implements ProtectedContextAwareInterface
{
    /**
     * Minify Html Content
     *
     * @param string $content
     * @return string
     */
    public function compress(string $content): string
    {
        return HtmlCompress::construct()->compress($content);
    }

    /**
     * All methods are considered safe
     *
     * @param string $methodName The name of the method
     *
     * @return bool
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}
