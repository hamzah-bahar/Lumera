import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    200: "#be8e4e85",
                    400: "#be8e4eab",
                    500: "#c89e61",
                },
                secondary: {
                    200: "#",
                    400: "#",
                    500: "rgb(70 108 140)",
                },
            },
        },
    },

    plugins: [forms],
};
