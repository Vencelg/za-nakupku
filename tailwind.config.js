/** @type {import('tailwindcss').Config} */
//const {  defaultColors } = require('tailwindcss/defaultTheme')
const defaultColors = require('tailwindcss/colors')
module.exports = {
    'theme': {
        'colors': {
           ...defaultColors,
            green: {
                400: '#a3c775',
                500: '#8AC53F',
                600: '#7abe26',
            },
        },
    },
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './src/**/*.{html,js}',
        './node_modules/tw-elements/dist/js/**/*.js',
    ],

    plugins: [
        require('tw-elements/dist/plugin')
    ],
}
