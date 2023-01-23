/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '16px'
      },
    },
    fontFamily: {
      poppins: ['Poppins', 'sans-serif'],
      leckerli: ['Leckerli One', 'cursive'],
    },
    screens: {
      'android': '480px',      
      'tablet': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      '2xl': '1536px',
      '3xl': '1920px',
    },
    extend: {
      colors: {
        'primary': {
          '50': '#DCE7E6',
          '100': '#C5D6D5',
          '200': '#A8C2C0',
          '300': '#8BAEAB',
          '400': '#6E9996',
          '500': '#518581',
        },
      },
    },
  },
  plugins: [
    require('flowbite-typography'),
    require('flowbite/plugin'),
  ],
}
