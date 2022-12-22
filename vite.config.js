import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// you need to allow an unsecured connection!!!
import basicSsl from '@vitejs/plugin-basic-ssl'

export default defineConfig({
    server: {    // <-- this object is added
        port: 5174,
    },
    plugins: [
        basicSsl(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
