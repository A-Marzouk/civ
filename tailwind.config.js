const spacing = {
    "tm700-1": "158px",
    "tm700-2": "132px",
    "tm700-3": "5px",
    "tm700-4": "915px",
    "tm700-5": "14px",
    "tm700-6": "117px",
    "civ-15": "15px",
    "tm700-8": "94px",
    "tm700-9": "100px",
    "tm700-10": "25px",
    "tm700-11": "9px",
    "civ-10": "10‬px",
    "civ-13": "13px",
    "civ-18": "18px",
    "civ-21": "21‬px",
    "civ-61": "61‬px",
    "5px": "5px",
    "9px": "9px",
    "10px": "0.625rem",
    "14px": "14px",
    "15px": "15px",
    "18px": "18px",
    "19px": "19px",
    "20px": "20px",
    "22px": "22px",
    "24px": "6rem",
    "25px": "25px",
    "26px": "26px",
    "28px": "28px",
    "30px": "1.875rem",
    "35px": "2.1875rem",
    "36px": "36px",
    "37px": "2.3125rem",
    "44px": "2.75rem",
    "46px": "46px",
    "47px": "2.938rem",
    "50px": "50px",
    "52px": "3.25rem",
    "53px": "3.375‬rem",
    "54px": "3.375‬‬rem",
    "56px": "65px",
    "60px": "3.75rem",
    "63px": "63px",
    "70px": "70px",
    "66px": "4.13rem",
    "78px": "4.875‬rem",
    "80px": "5rem",
    "82px": "5.125‬rem",
    "84px": "84px",
    "85px": "85px",
    "88px": "5.5rem",
    "92px": "5.75‬rem",
    "93px": "5.8125‬rem",
    "94px": "5.875‬rem",
    "96px": "6rem",
    "113px": "7rem",
    "100px": "100px",
    "112px": "112px",
    "128px": "8.75‬rem",
    "135px": "135px",
    "140px": "140px",
    "174px": "10.9‬rem",
    "174px": "10.9‬rem",
    "200px": "200px",
    //"180px": "11.25‬rem", not working
    "247px": "247px",
    "256px": "256px",
    "279px": "279px",
    "286px": "286px",
    "336px": "21‬‬rem",
    "440px": "440px",
    "494px": "494px",
    "603px": "603px",
    "8rem": "8rem",
    "5rem": "5rem",
    "11rem": "11rem"
};
module.exports = {
    prefix: "tw-",
    theme: {
        extend: {
            spacing,
            colors: {
                tm700: {
                    "1": "#513ECD",
                    "2": "#EBEBEB",
                    "3": "#D9D9D9",
                    "4": "#444444",
                    "5": "#484848",
                    "6": "#2D2D2D",
                    "7":
                        "linear-gradient(135.49deg, #ffffff 10.06%, #ffffff 75.33%)"
                },
                tm701: {
                    "1": "#28404A",
                    "2": "#DBDEC4",
                    "3": "#707070",
                    "4": "#335E5E",
                    "5": "#315E5E",
                    "6": "#2F5E5E",
                    "7": "#DBDFC3",
                    "8": "#838BA4",
                    "9": "#DBE0C2",
                    "10": "#6C8E8E",
                    "11": "#616887"
                }
            },
            inset: {
                "24px": "24px",
                "34px": "34px",
                "94px": "94px",
                "minus-80px": "-80px"
            },
            fontFamily: {
                lato: ["Lato", "sans-serif"],
                montserrat: ["Montserrat", "sans-serif"],
                muli: ["Muli", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
                roboto: ["Roboto", "sans-serif"],
                "open-sans": ["Open Sans", "sans-serif"]
            },
            maxWidth: {
                "tm700-dw-1": "73.875rem",
                "tm700-xl-1": "120rem",
                "tm700-xl-2": "106.5625rem",
                "1396px": "87.25rem",
                "1767px": "1767px",
                "1727px": "1727px"
            },
            gridTemplateColumns: {
                "tm700-d-skills-bar": "118px auto 48px",
                "tm701-header": "1fr 4fr 2fr",
                "tm701-skills--inner": "1fr 3fr"
            },
            borderRadius: {
                "3px": "3px",
                "civ-15": "15px",
                "10px": "0.625rem",
                "25px": "15px",
                "5rem": "5rem",
                "civ-50": "3.125‬‬rem", // 50px
                "civ-50p": "50px" // 50px
            },
            flex: {
                "civ-1": "0.53",
                "civ-1_2": "1.2",
                "civ-3": "1.4",
                "civ-4": "1.7",
                "civ-1_5": "1.5",
                "civ-2": "2"
            },
            borderWidth: {
                "14": "14px"
            },
            fontSize: {
                "tm700-18": "1.125rem", // 18px
                "tm700-22": "1.375‬rem", // 22px
                "14px": "14px", // 22px
                "18px": "1.125rem", // 22px
                "20px": "20px", // 20px
                "22px": "22px", // 22px
                "25px": "25px", // 22px
                "26px": "26px", // 22px
                "30px": "30px", // 22px
                "40px": "40px" // 22px
            },
            lineHeight: {
                "10px": "10px",
                "11px": "11px",
                "17px": "17px",
                "18px": "18px",
                "civ-22": "22px",
                "21px": "21px",
                "22px": "1.375‬rem",
                "23px": "23px",
                "24px": "24px",
                "27px": "29‬px",
                "civ-29": "29‬px",
                "30px": "30px",
                "33px": "33px",
                "35px": "35px",
                "36px": "36px",
                "37px": "37px",
                "40px": "40px",
                "50px": "50px",
                "64px": "64px"
            }
        }
    },
    variants: {},
    plugins: []
};
