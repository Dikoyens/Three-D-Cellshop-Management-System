/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",          // Scan JS files
    "./templates/**/*.html.twig" // Scan Twig templates
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
