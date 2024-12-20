import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
            host: '192.168.8.101', // Match this to the IP you're using
            port: 5173, // Default port for Vite
            hmr: {
                host: '192.168.8.101', // Ensure HMR uses the same host
            },
        },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
