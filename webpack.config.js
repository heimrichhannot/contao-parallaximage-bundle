var Encore = require('@symfony/webpack-encore');

Encore
.setOutputPath('src/Resources/public/assets/')
.setPublicPath('/bundles/heimrichhannotcontaoparallaximage')
.setManifestKeyPrefix('bundles/heimrichhannotcontaoparallaximage')
.addEntry('contao-parallaximage-bundle', './src/Resources/assets/js/contao-parallaximage-bundle.js')
.disableSingleRuntimeChunk()
.addExternals({
    'rellax': 'Rellax'
})
.enableSassLoader()
.enablePostCssLoader()
.enableSourceMaps(!Encore.isProduction())
;

module.exports = Encore.getWebpackConfig();