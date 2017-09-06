Carbon.Compression Package for Neos CMS
=======================================

This package enables gzip/deflate compression for the Neos output (borrowed from [c0necto/neos-compressor](https://github.com/c0necto/neos-compressor)). Additionally, the head and body section HTML of the `Neos.Neos:Page` prototype is being minified using pure regex. The regex can be adjusted in [Settings.yaml](Configuration/Settings.yaml). The difference between the minification from this package and `wyrihaximus/html-compress` is that this package inserts a blank space between the tags. This behavior prevents some browser bugs, especially Safari and SVG issues.


Installation
------------

Most of the time you have to make small adjustments to a package (e.g. configuration in `Settings.yaml`). Because of that, it is important to add the corresponding package to the composer from your theme package. Mostly this is the site packages located under `Packages/Sites/`. To install it correctly go to your theme package (e.g.`Packages/Sites/Foo.Bar`) and run following command:
```
composer require carbon/compression --no-update
```

The `--no-update` command prevent the automatic update of the dependencies. After the package was added to your theme `composer.json`, go back to the root of the Neos installation and run `composer update`. Et voilà! Your desired package is now installed correctly.


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
