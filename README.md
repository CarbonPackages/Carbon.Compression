[![Latest Stable Version](https://poser.pugx.org/carbon/compression/v/stable)](https://packagist.org/packages/carbon/compression)
[![Total Downloads](https://poser.pugx.org/carbon/compression/downloads)](https://packagist.org/packages/carbon/compression)
[![License](https://poser.pugx.org/carbon/compression/license)](LICENSE)
[![GitHub forks](https://img.shields.io/github/forks/CarbonPackages/Carbon.Compression.svg?style=social&label=Fork)](https://github.com/CarbonPackages/Carbon.Compression/fork)
[![GitHub stars](https://img.shields.io/github/stars/CarbonPackages/Carbon.Compression.svg?style=social&label=Stars)](https://github.com/CarbonPackages/Carbon.Compression/stargazers)
[![GitHub watchers](https://img.shields.io/github/watchers/CarbonPackages/Carbon.Compression.svg?style=social&label=Watch)](https://github.com/CarbonPackages/Carbon.Compression/subscription)

# Carbon.Compression Package for Flow & Neos CMS

This package minifies the HTML output of Flow using [wyrihaximus/html-compress](https://github.com/WyriHaximus/HtmlCompress).
**If you set your templates with AFX, you might not need this package.**

## Installation

```bash
composer require carbon/compression
```

## Inner working

The compression http middleware will modify all responses with active `X-Compression: Enabled` http header. This header is added to `Neos.Neos:Page` already so this will work for Neos right away. For other controllers, you will have to add the `X-Compression: Enabled` manually.
