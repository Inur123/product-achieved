/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
        extend: {
          colors: {
            primary: "#2A6B96", // Deep blue/teal
            secondary: "#5AA7D4", // Lighter blue
            accent: "#FFD166",
            dark: '#2A2A2A',
            light: "#F7F7F7",
            success: "#4CAF50",
            pending: "#FFC107",
            error: "#F44336",
             primary_program: '#dceefd',
                secondary_program: '#ffffff'
          },
          fontFamily: {
            sans: ["Nunito", "sans-serif"],
          },
        },
      },
    plugins: [],
  }

