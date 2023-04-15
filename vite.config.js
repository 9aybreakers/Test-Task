import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/style.css', 'resources/js/scripts.js', 'resources/js/datatables-simple-demo.js',
                'resources/js/chart-area-demo.js','resources/js/chart-bar-demo.js', 'resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
