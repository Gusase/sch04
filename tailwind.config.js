/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/*.{js,php}", "./public/**/*.{js,php}"],
  darkMode: "class",
  theme: {
    extend: {},
    fontFamily: {
      heading: "'Alliance No.1'",
      subHeading: "'Satoshi'",
      txt: "Nunito",
    },
  },
  plugins: [],
};
