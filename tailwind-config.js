const { screens } = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        container: {
            center: true,  
            padding:{
                default : '1rem',
                lg: '1.5rem',
            },
        },
        screens : {
            xs: '420px',
            ...screens,
        },  
        extend: {
            colors: {
                link: {
                    'default': '#3182ce',
                    'hover': '#63b3ed',
                },
                yellow : '#FFD327',
                light_yellow : '#FFF6DB',
                dark_grey : '#485156',
                light_grey : '#EDEFF0',
                accent1 : '#598A9C',
                accent2 : '#CAD772',
                accent3 : '#C1AFA2',
                accent4 : '#CCADBF',
                
            },
            fontFamily: {
                sans: [
                    'Gilroy Sans',
                    '-apple-system',
                    'BlinkMacSystemFont',
                    '"Segoe UI"',
                    'Roboto',
                    '"Helvetica Neue"',
                    'Arial',
                    '"Noto Sans"',
                    'sans-serif',
                    '"Apple Color Emoji"',
                    '"Segoe UI Emoji"',
                    '"Segoe UI Symbol"',
                    '"Noto Color Emoji"',
                ],
                serif: [
                    'PT Serif',
                    'Georgia',
                    'Cambria',
                    '"Times New Roman"',
                    'Times',
                    'serif',
                ],
            },
            fontSize: {
                xxs: '0.675rem',
            },
            lineHeight: {
                tighter: '1.125',
            },
        },
    },
    variants: {
        textColor: ['responsive', 'hover', 'focus', 'visited'],
    },
    plugins: [
        ({addUtilities}) => {
            const utils = {
                '.translate-x-half': {
                    transform: 'translateX(50%)',
                },
            };
            addUtilities(utils, ['responsive'])
        },
        ({ addComponents })  => {
            addComponents({
              '.container': {
                maxWidth: '100%',
                    '@screen xs': {
                        maxWidth: '100%',
                    },
                    '@screen sm': {
                    maxWidth: '640px',
                    },
                    '@screen md': {
                    maxWidth: '768px',
                    },
                    '@screen lg': {
                    maxWidth: '1024px',
                    },
                    '@screen xl': {
                    maxWidth: '1280px',
                    },
                }
            })
        }
    ]
};
