var Encore = require('@symfony/webpack-encore');

Encore
.setOutputPath('public/assets/')
.setPublicPath('/bundles/heimrichhannotcontaoparallaximage')
.setManifestKeyPrefix('bundles/heimrichhannotcontaoparallaximage')
.addEntry('contao-parallaximage-bundle', './assets/js/contao-parallaximage-bundle.js')
.disableSingleRuntimeChunk()
.addExternals({
    'rellax': 'Rellax'
})
.enableSassLoader()
.enablePostCssLoader()
.enableSourceMaps(!Encore.isProduction())
;

module.exports = Encore.getWebpackConfig();