import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                navy: {
                    DEFAULT: '#22344A',
                    dark: '#1A2839',
                    light: '#324258',
                    soft: '#EEF1F4',
                },
                brand: {
                    DEFAULT: '#C97A45',
                    dark: '#A8632F',
                    soft: '#F4E4D6',
                },
                paper: {
                    DEFAULT: '#FAF9F6',
                    dim: '#F1EFE9',
                },
            },
        },
    },

    plugins: [forms],
};