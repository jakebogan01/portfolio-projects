const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.svelte',
        './resources/js/**/*.js',
    ],

    theme: {
        container: {
            center: true,
            padding: "1.25rem",
        },
        extend: {
            fontFamily: {
                roboto: ["Roboto", "sans-serif"],
                montserrat: ["Montserrat", "sans-serif"],
            },
            screens: {},
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
