# Contao Parallax Image Bundle

A bundle to add parallax background images to articles.

## Features

* Uses the lightweight and vanilla js library [Rellax](https://github.com/dixonandmoe/rellax) for parallax effect. 
* Webpack / Encore / [Encore Bundle](https://github.com/heimrichhannot/contao-encore-bundle) integration

## Usage

### Installation

```
composer require heimrichhannot/contao-parallaximage-bundle
```

You need to update the database after composer installation

If you don't use Webpack/Encore/Encore-bundle at all:
* you need to add rellax library by yourself, as it don't comes with this bundle

If you don't use [Foxy](https://github.com/heimrichhannot/contao-encore-bundle/blob/master/docs/introductions/bundles_with_webpack.md):
* add rellax to your bundle package.json

If you don't use Encore bundle:
* add `./vendor/heimrichhannot/contao-parallaximage-bundle/src/Resources/assets/js/contaoParallaxImageBundle.es6.js` to your packages and require it, where you need it
* we recommend to unset the assets entires by yourself to don't have doublicates

With encore bundle: 
* Activate ContaParallaxImageBundle entry within encore section in your page structure for the pages, where you want parallax effect or in your page root.  


### Add parallax image

You find the options to add an parallax background image in article settings.

**Attention:** If you choose to add a parallax background image, the default article template is switched to an customized article template. If you selected an custom template, it won't be overwritten, so you need to update your custom template or switch to the default one.