const plugin = require('tailwindcss/plugin')
module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/js/**/*.vue',
    './resources/js/**/**/*.vue',
    './resources/js/**/**/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      transitionProperty: {
        'width': 'width',
        'height': 'height'
      },
      gridTemplateRows: {
        '[auto,auto,1fr]': 'auto auto 1fr',
      },
    },
    backgroundSize: {
      'auto': 'auto',
      'cover': 'cover',
      'contain': 'contain',
      'bg-size-1/4': '25%',
      '16': '4rem',
    }
  },
  variants: {
    extend: {
      width: ['hover', 'focus', 'important'],
      right: ['hover', 'focus', 'important'],
      inset: ['hover', 'focus', 'important'],
      border: ['focus', 'focus-visible']
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    plugin(function({ addVariant, e }) {
      addVariant('first-child', ({ modifySelectors, separator }) => {
        modifySelectors(({ className }) => {
          return `.${e(`first-child${separator}${className}`)}:first-child`
        })
      })
    }),
    plugin(function({ addVariant, e }) {
      addVariant('nth-child', ({ modifySelectors, separator }) => {
        modifySelectors(({ className }) => {
          return `.${e(`nth-child${separator}${className}`)}:nth-child`
        })
      })
    }),
    plugin(function({ addVariant }) {
      addVariant('important', ({ container }) => {
        container.walkRules(rule => {
          rule.selector = `.\\!${rule.selector.slice(1)}`
          rule.walkDecls(decl => {
            decl.important = true
          })
        })
      })
    }),
    require('@tailwindcss/aspect-ratio'),
  ],
  important: false,
}
