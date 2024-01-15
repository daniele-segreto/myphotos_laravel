const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/site.scss', 'public/css') // inserito da me
    .babelConfig({
        plugins: ['@babel/plugin-syntax-dynamic-import'],
    });

// inserito da me
mix.webpackConfig({
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: 'babel-loader',
                options: {
                    presets: ['@babel/preset-env'],
                    plugins: ['@babel/plugin-syntax-dynamic-import'],
                },
            },
        }, ],
    },
});
