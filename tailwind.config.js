const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
  mode: 'jit',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  purge: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      ...colors,
      'primary': '#083d67',
      'accent': '#ffd700',
      'fontPrimary': '#083D67',
      'fontSecondary': '#FBB03B',
      'bgPrimary': '#00B2FF',
      'bgSecondary': '#BBAFFF',
      'bg3': '#FF4545',
      'bg4': '#37D8DE',
      'bgWhite': '#FFF6EA'
    },
    extend: {},
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: ["light", "cupcake"],
  },
}

