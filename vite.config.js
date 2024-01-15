import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/site.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});


// Aggiungi il plugin 'vite-plugin-style-import' per il supporto SCSS
// import VitePluginStyleImport from 'vite-plugin-style-import';

// export default defineConfig({
//     plugins: [
//         VitePluginStyleImport(),
//         laravel({
//             input: [
//                 'resources/sass/app.scss',
//                 'resources/sass/site.scss',
//                 'resources/js/app.js',
//             ],
//             refresh: true,
//         }),
//     ],
// });
