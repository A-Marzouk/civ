const { colors } = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            colors: {
                gray: {
                    ...colors.gray,
                    '301': '#EBEBEB',
                    '701': '#444444',
                    '702': '#484848',
                },
                purple: {
                    ...colors.purple,
                    '501': '#513ECD',
                },
            },
        },
    },
    variants: {},
    plugins: [],
};
