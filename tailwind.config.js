const spacing = {
    'tm700-1': '158px',
    'tm700-2': '132px',
    'tm700-3': '5px',
    'tm700-4': '915px',
    'tm700-5': '14px',
    'tm700-6': '117px',
    'civ-15': '15px',
    'tm700-8': '94px',
    'tm700-9': '100px',
    'tm700-10': '25px',
    'tm700-11': '9px',
    'civ-10': '10‬px',
    'civ-13': '13px',
    'civ-18': '18px',
    'civ-21': '21‬px',
    'civ-61': '61‬px',
    '9px': '9px',
    '15px': '15px',
    '18px': '18px',
    '20px': '20px',
    '22px': '22px',
    '47px': '1.68rem',
    '60px': '3.75rem',
    '66px': '4.13rem',
    '52px': '4.13rem',
    '52px': '4.13rem',
    '80px': '5rem', // 80px
    '88px': '5.5rem', // 80px
    '96px': '6rem', // 80px
};
module.exports = {
    theme: {
        extend: {
            spacing,
            colors: {
                tm700: {
                    '1': '#513ECD',
                    '2': '#EBEBEB',
                    '3': '#D9D9D9',
                    '4': '#444444',
                    '5': '#484848',
                    '6': '#2D2D2D',
                    '7': 'linear-gradient(135.49deg, #ffffff 10.06%, #ffffff 75.33%)',
                },
            },
            inset: {
                '24px': '24px',
                '34px': '34px',
                '94px': '94px',
                'minus-80px': '-80px',
            },
            fontFamily: {
                lato: ['Lato', 'sans-serif'],
                montserrat: ['Montserrat', 'sans-serif'],
            },
            maxWidth: {
                'tm700-dw-1': '73.875rem',
                'tm700-xl-1': '120rem',
                'tm700-xl-2': '106.5625rem',
            },
            gridTemplateColumns: {
                'tm700-d-skills-bar': '118px auto 48px',
            },
            borderRadius: {
                'civ-15': '15px',
                'civ-50': '3.125‬‬rem', // 50px
                'civ-50p': '50px', // 50px
            },
            flex: {
                'civ-1': '0.53',
                'civ-1_2': '1.2',
                'civ-3': '1.4',
                'civ-4': '1.7',
                'civ-1_5': '1.5',
                'civ-2': '2',
            },
            borderWidth: {
                '14': '14px',
            },
            fontSize: {
                'tm700-18': '1.125rem', // 18px
                'tm700-22': '1.375‬rem', // 22px
            },
            lineHeight: {
                'civ-22': '22px', // 22px
                'civ-29': '29‬px', // 29px
            },
        },
    },
    variants: {},
    plugins: [],
};
