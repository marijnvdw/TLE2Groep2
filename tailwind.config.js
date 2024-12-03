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
        },
    },

    plugins: [forms],
};

const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                'light-moss': '#E2ECC8',
                'dark-moss': '#2E342A',
                'medium-moss': '#92AA83',
                'violet': '#AA0160',
                'dark-violet': '#7C1A51',
                'rose-brown': '#DA9F93',
                'yellow': '#F8D44C',
                'white': '#FFFFFF',
                'cream': '#FBFCF6',
                'gray': '#D6D6D6',
            },
            fontFamily: {
                sans: ['Radikal W01 Regular', 'sans-serif'],
                bold: ['Radikal Bold', 'sans-serif'],
            },
            spacing: {
                '128': '32rem',
                '144': '36rem',
            },
        },
    },
    plugins: [],
};
