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
        'custom-dark': '#111E2E',
        'custom-gray': '#3E4A57',
        'custom-blue-2': '#F4FAFA',
        'custom-blue': '#06838E',
        'custom-status-blue': '#1A3F9C',
        'custom-status-blue-bg': '#C3DCFD',
        'custom-button-blue': '#0EBCCB',
        'custom-light-blue': '#F4FAFA',
        'custom-lighter-blue': '#EFF5F5',
        'custom-dark-blue': '#364252',
        'custom-dark-green': '#09553E',
        'custom-dark-blue-2': '#607389',
        'custom-lighter-gray': '#A3BBE9',
        'custom-lighter-gray-2': '#CBD7E2',
        'custom-dark-gray': '#354151',
        'custom-light-green': '#B8EDD6',
        'custom-light-orange': '#FBD6BA',
        'custom-dark-red': '#8B3314',
        'custom-red': '#EE4E4F',
        'custom-dark-red-2': '#C4201C',
      }
    },
  },
  plugins: [],
}

