import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.tsx',
            refresh: true,
        }),
        react(),
    ],

    resolve: {
        alias: {
            '@assets': "./resources/js/Assets",
            '@components': "./resources/js/Components",
            '@widgets': "./resources/js/Widgets",
            '@styles': "./resources/js/Styles",
            '@context': "./resources/js/Context",
        }
    }
});
