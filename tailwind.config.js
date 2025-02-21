import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/**/*.jsx',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                custom: {
                    'primary-1': '#5b6d92',
                    'primary-2': '#d5e3e6',
                    'neutral-1': '#f0e2d2',
                    'neutral-2': '#efeee5',
                    'accent': '#d18266',
                    'text': '#393646',
                    'danger': '#e05a49',
                }
            },
            backgroundImage: {
                'body-background': "url('/images/body-background.jpg')",
            },
        },
    },
    plugins: [],
};
