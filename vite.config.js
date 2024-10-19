import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({

    build: {
        rollupOptions: {
          input: 'src/main.js', // specify the entry point
        },
      },

    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],

    optimizeDeps: {
        include: ['jquery', 'alpinejs', '@ckeditor/ckeditor5-build-classic'], // include specific dependencies
      },
});
