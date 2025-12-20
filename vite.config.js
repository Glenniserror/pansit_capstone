import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/homepage.css',
                'resources/js/homepage.js',
                /********************student login ***********************/
                'resources/js/student_login.css',
                'resources/js/student_login.js',
                /********************student login ***********************/
                'resources/js/teacher_login.css',
                'resources/js/teacher_login.js',
                /********************student login ***********************/
                'resources/js/admin_login.css',
                'resources/js/admin_login.js',
    
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
