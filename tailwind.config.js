import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import colors from "./resources/js/Assets/colors";
import breakpoints from "./tailwind/breakpoints";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.tsx",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },

            colors,
            screens: breakpoints,
        },
    },

    plugins: [forms],
};
