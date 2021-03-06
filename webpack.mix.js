const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 const path = require("path");

mix.webpackConfig({
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources/js/"),
        },
    },
});

// if (mix.inProduction()) {
//     mix.version();
// }



mix.js("resources/js/app.js", "public/js")
    .vue()
    // .postCss("resources/css/app.css", "public/css")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/custom.scss", "public/css")
    .version();

// mix.version();
