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
    '10px': '0.625rem',
    '15px': '15px',
    '18px': '18px',
    '20px': '20px',
    '22px': '22px',
    '24px': '6rem',
    '25px': '25px',
    '26px': '26px',
    '28px': '28px',
    '30px': '1.875‬',
    '35px': '2.1875‬rem',
    '37px': '2.3125‬rem',
    '44px': '2.75rem',
    '46px': '46px',
    '47px': '2.938rem',
    '52px': '3.25rem',
    '53px': '3.375‬rem',
    '54px': '3.375‬‬rem',
    '56px': '65px',
    '60px': '3.75rem',
    '66px': '4.13rem',
    '78px': '4.875‬rem',
    '80px': '5rem',
    '82px': '5.125‬rem',
    '84px': '5.25‬rem',
    '88px': '5.5rem',
    '92px': '5.75‬rem',
    '93px': '5.8125‬rem',
    '94px': '5.875‬rem',
    '96px': '6rem',
    '113px': '7rem',
    '128px': '8.75‬rem',
    '140px': '140px',
    '174px': '10.9‬rem',
    '174px': '10.9‬rem',
    '180px': '11.25‬rem',
    '336px': '21‬‬rem',
};
module.exports = {
    prefix: 'tw-',
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
                tm701: {
                    '1': '#28404A',
                    '2': '#DBDEC4',
                    '3': '#707070',
                    '4': '#335E5E',
                }
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
                gothampro: ['Gotham Pro', 'sans-serif'],
                facultad: ['Facultad', 'sans-serif'],
            },
            maxWidth: {
                'tm700-dw-1': '73.875rem',
                'tm700-xl-1': '120rem',
                'tm700-xl-2': '106.5625rem',
                '1396px': '87.25rem',
                '1767px': '1767px',
            },
            gridTemplateColumns: {
                'tm700-d-skills-bar': '118px auto 48px',
                'tm701-header': '1fr 4fr 2fr',
            },
            borderRadius: {
                'civ-15': '15px',
                '25px': '15px',
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
                '18px': '1.125rem', // 22px
                '25px': '25px', // 22px
            },
            lineHeight: {
                '10px': '10px',
                '11px': '11px',
                'civ-22': '22px',
                '22px': '1.375‬rem',
                '23px': '23px',
                '33px': '33px',
                '37px': '37px',
                'civ-29': '29‬px',
            },
        },
    },
    variants: {},
    plugins: [],
};
