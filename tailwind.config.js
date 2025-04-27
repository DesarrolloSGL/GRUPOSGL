/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')



module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./public/payment/*payment_confirmation.php",
        "./resources/**/*.js",
        // "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
        screens: {
            'sm': '540px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
        },
        fontSize: {
            '2xs': '0.6rem',
            'xs': '0.75rem',
            'sm': '0.875rem',
            'base': '1rem',
            'lg': '1.125rem',
            'xl': '1.25rem',
            '2xl': '1.5rem',
            '3xl': '1.875rem',
            '4xl': '2.25rem',
            '5xl': '3rem',
            '6xl': '3.75rem',
            '7xl': '4.5rem',
            '8xl': '6rem',
            '9xl': '8rem',
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.gray,
            slate: colors.slate,
            zinc: colors.zinc,
            neutral: colors.neutral,
            stone: colors.stone,
            red: colors.red,
            orange: colors.orange,
            amber: colors.amber,
            lime: colors.lime,
            green: colors.green,
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            sky: colors.sky,
            indigo: colors.indigo,
            blue: colors.blue,
            violet: colors.violet,
            purple: colors.purple,
            fuchsia: colors.fuchsia,
            pink: colors.pink,
            rose: colors.rose,
            global: colors.indigo,
        },
    },
    plugins: [],
}

