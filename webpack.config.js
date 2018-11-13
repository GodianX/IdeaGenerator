// webpack.config.js
var Encore = require('@symfony/webpack-encore');
const CopyWebpackPlugin = require('copy-webpack-plugin');

Encore
    .setOutputPath('public/build/')

    .setPublicPath('/build')

    .addEntry('app', './assets/js/app.js')

    .autoProvidejQuery()

    .enableSourceMaps(!Encore.isProduction())

    .cleanupOutputBeforeBuild()

    .enableBuildNotifications()

    .enableSassLoader()

    .addPlugin(new CopyWebpackPlugin([
        { from: './assets/img', to: 'img' }
    ]))

    .addPlugin(new CopyWebpackPlugin([
        { from: './assets/css', to: 'build' }
    ]))
    .addPlugin(new CopyWebpackPlugin([
        { from: './assets/js', to: 'build' }
    ]))
;

module.exports = Encore.getWebpackConfig();
