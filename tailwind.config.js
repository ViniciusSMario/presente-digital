module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
    './resources/js/**/*.js',
  ],
  darkMode: 'class',
  theme: {
    extend: {},
  },
  plugins: [
    require('daisyui')
  ],
  daisyui: {
    themes: [
      {
        presentedigital: {
          primary: '#2563eb',
          secondary: '#06b6d4',
          accent: '#60a5fa',
          neutral: '#0f172a',
          'base-100': '#ffffff'
        }
      }
    ]
  }
}
