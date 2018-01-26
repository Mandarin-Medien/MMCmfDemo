// webpack.config.js
let Encore = require('@symfony/webpack-encore');
const webpack = require('webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
var DashboardPlugin = require('webpack-dashboard/plugin');
var WebpackBundleSizeAnalyzerPlugin = require('webpack-bundle-size-analyzer').WebpackBundleSizeAnalyzerPlugin;

Encore
// the project directory where all compiled assets will be stored
    .setOutputPath('web/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    // will create web/build/app.js and web/build/app.css
    //.addEntry('react', './src/WebsiteBundle/React/cinestar/src/index.js')
    .addEntry('admin_js', ['babel-polyfill', './assets/js/admin.js'])

    // less entry point
    .addStyleEntry('admin_css', './assets/css/admin.less')

    // allow less files to be processed
    .enableLessLoader(function (options) {
        // https://github.com/webpack-contrib/less-loader#examples
        // http://lesscss.org/usage/#command-line-usage-options
        options.relativeUrls = true;
    })

    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()

    // source map
    .enableSourceMaps(!Encore.isProduction())

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    .enableBuildNotifications()

    // REACT JS
    .enableReactPreset()

    // first, install any presets you want to use (e.g. yarn add babel-preset-es2017)
    // then, modify the default Babel configuration
    .configureBabel(function (babelConfig) {
        // add additional presets
        babelConfig.presets.push('es2015');
        babelConfig.presets.push('env');
        babelConfig.presets.push('stage-1');

        // no plugins are added by default, but you can add some
        // babelConfig.plugins.push('styled-jsx/babel');
    })

    // create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())
    .addPlugin(new DashboardPlugin())
    .addPlugin(new WebpackBundleSizeAnalyzerPlugin('./reports/plain-report.txt'))
    .addPlugin(new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/))
;
const webpackConfig = Encore.getWebpackConfig();

if (Encore.isProduction()) {
// Remove the old version first
    webpackConfig.plugins = webpackConfig.plugins.filter(
        plugin => !(plugin instanceof webpack.optimize.UglifyJsPlugin)
    );

// Add the new one
    webpackConfig.plugins.push(new UglifyJsPlugin());

}

// if (!Encore.isProduction()) {
//     webpackConfig.plugins.push(new DashboardPlugin());
// }

// export the final configuration
module.exports = webpackConfig;