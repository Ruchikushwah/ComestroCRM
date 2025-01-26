export default defineConfig({
    css: {
        postcss: {
            options: {
                exclude: /node_modules/,
            },
        },
    },
});
