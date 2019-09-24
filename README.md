[![Latest Stable Version](https://poser.pugx.org/carbon/compression/v/stable)](https://packagist.org/packages/carbon/compression)
[![Total Downloads](https://poser.pugx.org/carbon/compression/downloads)](https://packagist.org/packages/carbon/compression)
[![License](https://poser.pugx.org/carbon/compression/license)](LICENSE)
[![GitHub forks](https://img.shields.io/github/forks/CarbonPackages/Carbon.Compression.svg?style=social&label=Fork)](https://github.com/CarbonPackages/Carbon.Compression/fork)
[![GitHub stars](https://img.shields.io/github/stars/CarbonPackages/Carbon.Compression.svg?style=social&label=Stars)](https://github.com/CarbonPackages/Carbon.Compression/stargazers)
[![GitHub watchers](https://img.shields.io/github/watchers/CarbonPackages/Carbon.Compression.svg?style=social&label=Watch)](https://github.com/CarbonPackages/Carbon.Compression/subscription)

# Carbon.Compression Package for Neos CMS

This package minify the head and body section HTML of the `Neos.Neos:Page` prototype using pure regex. The regex can be adjusted in [Settings.yaml](Configuration/Settings.yaml). The difference between the minification from this package and `wyrihaximus/html-compress` is that this package inserts a blank space between the tags. This behavior prevents some browser bugs, especially Safari and SVG issues. **If you set your templates with AFX, you might not need this package.**

## Installation

Most of the time you have to make small adjustments to a package (e.g. configuration in `Settings.yaml`). Because of that, it is important to add the corresponding package to the composer from your theme package. Mostly this is the site packages located under `Packages/Sites/`. To install it correctly go to your theme package (e.g.`Packages/Sites/Foo.Bar`) and run following command:

```bash
composer require carbon/compression --no-update
```

The `--no-update` command prevent the automatic update of the dependencies. After the package was added to your theme `composer.json`, go back to the root of the Neos installation and run `composer update`. Et voilà! Your desired package is now installed correctly.

## Usage

As soon as the package is installed, the `Neos.Neos:Page` prototype is amended with @process instructions on the head and body elements. This will minify and "regular" output without any further steps to take.

## Adjust minification

To remove the default minification, simply override:

```elm
prototype(Neos.Neos:Page) {
    head.@process.minify >
    body.@process.minify >
}
```

To compress specific parts, use the minification prototype like this:

```elm
something.@process.minify = Carbon.Compression:Minify
```
