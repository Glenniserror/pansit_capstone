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

                // Student
                'resources/css/login/student_login.css',
                'resources/js/login/student_login.js',

                // Teacher
                'resources/css/login/teacher_login.css',
                'resources/js/login/teacher_login.js',

                // Admin
                'resources/css/login/admin_login.css',
                'resources/js/login/admin_login.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
