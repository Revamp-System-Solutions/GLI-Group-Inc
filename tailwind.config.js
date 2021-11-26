module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/js/**/*.vue',
    './resources/js/Pages/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
    backgroundSize: {
      'auto': 'auto',
      'cover': 'cover',
      'contain': 'contain',
      'bg-size-1/4': '25%',
      '16': '4rem',
    }
  },
  variants: {
    extend: {},
  },
  plugins: [],
  important: true,
}
