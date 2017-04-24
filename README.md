Carbon.Compression Package for Neos CMS
=======================================

This package enables gzip/deflate compression for the Neos output (borrowed from [c0necto/neos-compressor](https://github.com/c0necto/neos-compressor)). Additionally, the head and body section HTML of the `Neos.Neos:Page` prototype is being minified using pure regex. The regex can be adjusted in [Settings.yaml](Configuration/Settings.yaml). The difference between the minification from this package and `wyrihaximus/html-compress` is, that this package inserts a blank space between the tags. This behavior prevents some browser bugs, especially Safari and SVG issues.


Installation
------------

```
composer require carbon/compression
```


Usage
-----

As soon as the package is installed, the `Neos.Neos:Page` prototype is amended with @process instructions on the head and body elements. This will minify and "regular" output without any further steps to take.


Adjust minification
-------------------

To remove the default minification, simply override:

```
prototype(Page) {
    head.@process.minify >
    body.@process.minify >
}
```

To compress specific parts, use the minification prototype like this:

```
something.@process.minify = Carbon.Compression:Minify
```


License
-------

Licensed under MIT, see [LICENSE](LICENSE)
