import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'esources/css/app.css',
                'esources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'dist', // Add this line to specify the output directory
    },
});