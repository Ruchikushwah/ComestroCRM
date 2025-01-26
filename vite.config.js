import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue"; // or react, depending on your project
import tailwindcss from "tailwindcss";
import autoprefixer from "autoprefixer";

export default defineConfig({
    plugins: [vue()],
    css: {
        postcss: {
            plugins: [tailwindcss(), autoprefixer()],
        },
    },
});
