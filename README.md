# Contao Parallax Image Bundle

A bundle to add parallax background images to articles.

> Currently only works with [Encore Bundle](https://github.com/heimrichhannot/contao-encore-bundle)

## Features

* Uses the lightweight and vanilla js library [Rellax](https://github.com/dixonandmoe/rellax) for parallax effect. 
* [Encore Bundle](https://github.com/heimrichhannot/contao-encore-bundle) integration

## Usage

### Installation

```
composer require heimrichhannot/contao-parallaximage-bundle
```

* You need to update the database after composer installation
* If you don't use [Foxy](https://github.com/heimrichhannot/contao-encore-bundle/blob/master/docs/introductions/bundles_with_webpack.md), add rellax to your bundle package.json

### Add parallax image

You find the options to add an parallax background image in article settings.

**Attention:** If you choose to add a parallax background image, the default article template is switched to an customized article template. If you selected an custom template, it won't be overwritten, so you need to update your custom template or switch to the default one.