const { screens } = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        container: {
            padding:{
                default : '1rem',
                lg: '1.5rem',
            },
            center: true,  
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
                }
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
