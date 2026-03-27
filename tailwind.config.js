import defaultTheme from 'tailwindcss/defaultTheme'

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
        primary: {
          50: '#e6ecf5',
          100: '#cdd9eb',
          200: '#9bb3d6',
          300: '#698dc0',
          400: '#3a66aa',
          500: '#142C5A', // azul principal (da imagem)
          600: '#11264d',
          700: '#0e203f',
          800: '#0b1a32',
          900: '#081324',
        },
        accent: {
          50: '#fff8e1',
          100: '#ffecb3',
          200: '#ffe082',
          300: '#ffd54f',
          400: '#ffca28',
          500: '#d4af37', // ✨ dourado elegante (combina com azul)
          600: '#b9972e',
          700: '#9c7f26',
          800: '#7f671f',
          900: '#5c4a16',
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}