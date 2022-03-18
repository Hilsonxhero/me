module.exports = {
    mode: "JIT",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/**/*.vue",
        "./resources/**/**/**/*.vue",
        "./resources/**/**/**/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
