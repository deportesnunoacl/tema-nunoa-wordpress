module.exports = {
  content: [
    "./*.php",
    "./template-parts/**/*.php",
    "./src/**/*.{php,html}",
    "./inc/**/*.php",
    "./assets/js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: '#3DAE6A',
        secondary: '#010101',
      },
      fontFamily: {
        roboto: ['Roboto', 'sans-serif'],
        gabarito: ['Gabarito', 'sans-serif'],
      },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
  }
};
