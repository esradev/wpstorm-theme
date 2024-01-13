/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: ['./**/*.php', './src/**/*.js'],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Wpstorm', ...defaultTheme.fontFamily.sans],
                mono: ['Wpstorm', ...defaultTheme.fontFamily.mono],
                serif: ['Wpstorm', ...defaultTheme.fontFamily.serif],
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
    ],
    // important: '.wpstorm-theme-tw-class',
};
