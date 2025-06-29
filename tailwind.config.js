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
            boxShadow: {
                "input-shadow": "0 63px 59px rgba(26,33,188,.1)",
                "article-shadow": "0 40px 20px rgba(0,0,0,.15)",
                "testimonial-shadow1":
                    "0 5.54348px 11.087px rgba(89,104,118,.05)",
                "testimonial-shadow2":
                    "5.54348px 38.8043px 110.87px rgba(89,104,118,.15)",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                frontprimary: "#6556ff",
                frontsecondary: "#1a21bc",
                grey: "#57595f",
                slateGray: "#f6faff",
                deepSlate: "#d5effa",
                success: "#43c639",
                midnight_text: "#222c44",
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
