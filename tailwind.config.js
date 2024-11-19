/** @type {import('tailwindcss').Config} */
module.exports = {
  media: false,
  content: [
    "./**/*.html", // Matches all .html files in your project
    "./**/*.php", // Matches all .php files in your project
  ],
  theme: {
    extend: {
      container: {
        center: true,
        padding: "15px",
        screens: {
          sm: "100%", // Full width on small screens
          md: "768px", // Set max width on medium screens
          lg: "1024px", // Set max width on large screens
          xl: "1180px", // Set max width on extra-large screens
          "2xl": "1440px", // Set max width on 2xl screens
        },
      },
    },
  },
  plugins: [],
};
