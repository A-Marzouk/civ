<template>
    <v-app id="hold-theme903" >
        <div class="content-header-tm903">
            <div class="header-tm903" :class="`d-flex align-center `" >
                <v-row :class="`d-flex align-center `" >
                    <v-col lg="2" sm="3" cols="3">
                        <v-img class="profile-image-tm903" src="/images/resume_themes/theme903/profile.png" ></v-img>
                    </v-col>
                    <v-col lg="10" sm="8"  cols="9">
                        <v-row>
                            <v-col lg="7" sm="12" cols="6">
                                <span class="name-tm903" >Hean Prinsloo</span><br>
                                <span class="job-tm903" >UXUI Designer</span>
                                <p v-show="hiden_mobile" class="description-tm903" >Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices...</p>
                                <p v-show="hiden_mobile" class="info-tm903">hour rate  &nbsp; &nbsp; &nbsp;<span class="info-get-tm903" >$20</span>&nbsp;&nbsp;&nbsp; Weekly availability &nbsp;&nbsp;&nbsp;<span class="info-get-tm903">250</span></p>
                            </v-col>
                            <v-col  lg="5" sm="12" cols="6">
                                <v-row>
                                    <v-col  class="pr-3" lg="5" sm="5" cols="12">
                                        <v-row justify="center">
                                            <v-dialog v-model="payment_dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
                                            <template v-slot:activator="{ on }">
                                                <v-btn rounded class="hireme-tm903" v-on="on" :color="hire_me_color">
                                                    <v-icon left>mdi-email-outline</v-icon> hire me
                                                </v-btn>
                                            </template>
                                            <v-card>
                                                <div>
                                                <v-btn icon absolute right color="#000" @click="payment_dialog = false">
                                                    <v-icon>mdi-close</v-icon>
                                                </v-btn>
                                                </div>
                                                <v-container fluid>
                                                    <v-row justify="center" class="align-center payment-tm903" >
                                                        <v-col class="payment-left-tm903" >
                                                            <v-img src="/images/resume_themes/theme903/bg.png" ></v-img>
                                                        </v-col>
                                                        <v-col>
                                                            <div class="payment-right-tm903" >
                                                                <p class="payment-title-tm903" > Fill in your details  </p>
                                                                <div class="button-payement-tm903" >
                                                                    <v-row>
                                                                        <v-col lg="6" cols="12" >
                                                                            <v-btn  height="60" width="100%" color="#0D001A" rounded >
                                                                                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <g clip-path="url(#clip0)">
                                                                                    <path d="M17.9238 40.8737C17.5964 40.2171 17.0787 39.6755 16.4359 39.2688C15.7654 38.8582 14.9739 38.5705 14.0693 38.3999C13.1488 38.2333 12.0855 38.1579 10.8536 38.146L5.16611 38.15C4.57494 38.1579 3.99568 38.6181 3.85682 39.1895L0.0301214 55.8571C-0.108743 56.4205 0.262223 56.8926 0.853387 56.8926H3.57711C4.16827 56.8926 4.75348 56.4344 4.88441 55.8571L5.81877 51.8102C5.94375 51.2468 6.52698 50.7767 7.12409 50.7767H7.90372C11.2345 50.7727 13.8134 50.0923 15.6662 48.7294C17.529 47.3646 18.4475 45.5613 18.4475 43.3276C18.4455 42.3496 18.2848 41.5283 17.9238 40.8737ZM12.0498 46.3191C11.2265 46.9222 10.0819 47.2237 8.60597 47.2237H7.93942C7.34627 47.2237 6.98324 46.7556 7.11219 46.1842L7.93149 42.6452C8.04655 42.0778 8.64366 41.6077 9.22888 41.6116L10.1216 41.6057C11.1631 41.6057 11.9585 41.7862 12.4902 42.1354C13.0159 42.4805 13.2797 43.03 13.2758 43.7581C13.2916 44.865 12.8691 45.7161 12.0498 46.3191Z" fill="#003087"/>
                                                                                    <path d="M95.5684 39.4514L95.3978 39.503L95.1697 39.5347L94.89 39.4911L94.7471 39.3522L94.6817 39.134L94.6777 38.8067V37.5946H95.5883V37.2197H94.6777V36.4639H94.2274V37.2197H93.9219V37.5946H94.2274V39.0051L94.4377 39.7034L95.0566 39.9255L95.3165 39.9037L95.5922 39.8502V39.4514H95.5684Z" fill="#009CDE"/>
                                                                                    <path d="M99.7917 37.4121L99.1411 37.1443L98.661 37.2415L98.173 37.5708L97.8893 37.2554L97.4291 37.1463L96.9867 37.2435L96.5681 37.5133V37.2197H96.1257V39.868H96.5661V37.8902L96.9371 37.6601L97.3061 37.5688L97.6076 37.6224L97.7564 37.7751L97.8219 38.029L97.8437 38.3564V39.87H98.2861V38.1758L98.2781 38.035L98.2702 37.9061L98.6471 37.666L99.02 37.5728L99.3117 37.6263L99.4704 37.7791L99.5259 38.035L99.5557 38.3584V39.872H100V38.152L99.7917 37.4121Z" fill="#009CDE"/>
                                                                                    <path d="M31.058 43.2561C30.0304 42.6768 28.4077 42.3872 26.1898 42.3872C25.0928 42.3872 23.9998 42.4725 22.8948 42.6431C22.0795 42.7681 22.0001 42.7919 21.4982 42.901C20.4627 43.1272 20.3 44.1607 20.3 44.1607L19.9668 45.5315C19.7783 46.4063 20.2822 46.3726 20.4925 46.2992C20.9448 46.1643 21.1967 46.0254 22.1211 45.8191C23.0039 45.6188 23.9343 45.468 24.6723 45.4779C25.7614 45.4779 26.5945 45.593 27.15 45.8271C27.6975 46.0651 27.9713 46.4738 27.9713 47.0649L27.9237 47.4498L27.5309 47.6918C25.9855 47.789 24.8687 47.9318 23.5137 48.1282C22.1886 48.3127 21.0261 48.6361 20.06 49.0785C19.0225 49.5347 18.2528 50.1477 17.7152 50.9273C17.1954 51.7109 16.9355 52.6612 16.9355 53.776C16.9355 54.8255 17.3125 55.6924 18.0445 56.3629C18.7805 57.0215 19.7525 57.3429 20.915 57.3429C21.651 57.3389 22.2203 57.2814 22.625 57.1842L23.9442 56.7299L25.0611 56.1109L26.0887 55.4325L26.1026 55.4523L25.9994 55.8888L25.9935 55.9066V55.9106C25.8824 56.4422 26.2037 56.8787 26.7215 56.9302L26.7314 56.9421H26.779H28.8679H29.2607L29.2964 56.9263C29.84 56.8628 30.3498 56.4264 30.4688 55.9066L32.4546 47.3109L32.5578 46.6107L32.6054 45.954C32.6133 44.736 32.0876 43.8334 31.058 43.2561ZM26.666 52.921L26.2414 53.4805L25.1702 54.0339C24.6663 54.2383 24.1882 54.3414 23.7458 54.3414C23.0753 54.3414 22.5496 54.2442 22.1945 54.0458L21.6688 53.0242C21.6688 52.4707 21.7958 52.0323 22.0676 51.6951L23.2221 50.9095C23.7161 50.7429 24.3191 50.602 25.0174 50.5048C25.6403 50.4274 26.8703 50.2866 27.031 50.2826L27.2194 50.6139C27.1817 50.8024 26.8326 52.2624 26.666 52.921Z" fill="#003087"/>
                                                                                    <path d="M80.5292 43.2681C79.4957 42.6888 77.8749 42.3972 75.663 42.3972C74.566 42.3972 73.471 42.4825 72.37 42.6591C71.5526 42.7781 71.4713 42.8039 70.9674 42.911C69.9339 43.1352 69.7732 44.1727 69.7732 44.1727L69.4399 45.5415C69.2535 46.4163 69.7454 46.3767 69.9755 46.3092C70.4298 46.1743 70.6738 46.0414 71.5903 45.8272C72.4692 45.6288 73.4075 45.482 74.1474 45.486C75.2325 45.486 76.0657 45.603 76.6192 45.8371C77.1707 46.0751 77.4405 46.4878 77.4405 47.073L77.3988 47.4558L77.01 47.7038C75.4488 47.797 74.3299 47.9399 72.9889 48.1363C71.6677 48.3208 70.5012 48.6421 69.5332 49.0865C68.4996 49.5447 67.72 50.1577 67.1883 50.9393C66.6626 51.7229 66.4067 52.6712 66.4067 53.7761C66.4067 54.8335 66.7797 55.7004 67.5216 56.3669C68.2616 57.0236 69.2237 57.3529 70.3862 57.3529C71.1182 57.3449 71.6875 57.2973 72.0942 57.1922L73.4095 56.7439L74.5362 56.1249L75.5559 55.4385L75.5738 55.4604L75.4805 55.9008L75.4706 55.9087L75.4746 55.9166C75.3516 56.4483 75.6749 56.8887 76.1986 56.9363L76.2026 56.9462H76.2502C76.5934 56.9462 77.7797 56.9462 78.3451 56.9462H78.7299L78.7716 56.9323C79.3092 56.8669 79.817 56.4304 79.9301 55.9047L81.9218 47.3209L82.027 46.6167L82.0845 45.9581C82.0865 44.744 81.5667 43.8454 80.5292 43.2681ZM76.1471 52.933L75.7047 53.4984L74.6434 54.0479C74.1395 54.2503 73.6594 54.3554 73.225 54.3554C72.5326 54.3554 72.0208 54.2562 71.6756 54.0578L71.144 53.0402C71.144 52.4847 71.2729 52.0503 71.5328 51.7071C71.7966 51.3837 72.1994 51.1179 72.6993 50.9235C73.1873 50.7568 73.7903 50.6219 74.4926 50.5208C75.1115 50.4434 76.3375 50.2986 76.4962 50.2966L76.6886 50.6279C76.6609 50.8163 76.3097 52.2705 76.1471 52.933Z" fill="#009CDE"/>
                                                                                    <path d="M67.3867 40.9352C67.0455 40.2746 66.5336 39.741 65.8869 39.3244C65.2244 38.9118 64.4388 38.6222 63.5203 38.4555C62.6177 38.2948 61.5405 38.2076 60.3165 38.2056L54.6211 38.2095C54.0279 38.2195 53.4586 38.6797 53.3217 39.2451L49.491 55.9207C49.3522 56.486 49.7331 56.9542 50.3123 56.9542L53.04 56.9502C53.6193 56.9542 54.2124 56.49 54.3493 55.9187L55.2718 51.8698C55.4067 51.3064 55.9919 50.8323 56.581 50.8362H57.3607C60.6954 50.8362 63.2803 50.1499 65.141 48.791C66.98 47.4162 67.9104 45.6169 67.9104 43.3812C67.9005 42.4072 67.7318 41.5839 67.3867 40.9352ZM61.5127 46.3886C60.6914 46.9798 59.5448 47.2813 58.0768 47.2813H57.3984C56.8132 47.2873 56.4343 46.8112 56.5652 46.2438L57.3904 42.7107C57.5114 42.1453 58.1026 41.6712 58.6918 41.6772L59.5746 41.6712C60.622 41.6772 61.4076 41.8498 61.9432 42.1989C62.4768 42.548 62.7288 43.0956 62.7347 43.8216C62.7407 44.9286 62.33 45.7816 61.5127 46.3886Z" fill="#009CDE"/>
                                                                                    <path d="M90.7417 39.3777C90.8666 38.8084 90.5096 38.3462 89.9243 38.3541H87.4843C86.9844 38.3541 86.5341 38.7251 86.3139 39.1813L86.179 39.3916L86.056 39.9312L82.6459 55.4324L82.5348 55.9085L82.5387 55.9204C82.4257 56.4302 82.7391 56.8151 83.2231 56.8885L83.2648 56.946H85.7981C86.294 56.946 86.7602 56.5691 86.9725 56.1049L87.1034 55.9065L90.7496 39.3797L90.7417 39.3777Z" fill="#009CDE"/>
                                                                                    <path d="M49.5667 42.5954C48.9219 42.6034 46.3014 42.5954 46.3014 42.5954C45.7142 42.5954 44.9603 43.0696 44.5874 43.6349C44.5874 43.6349 40.6873 50.3282 40.3084 51.0007L39.8561 50.9947L38.642 43.6806C38.5071 43.1053 37.906 42.6133 37.1582 42.6133L34.7181 42.6173C34.1309 42.6173 33.7699 43.0854 33.9028 43.6568C33.9028 43.6568 35.7556 54.2005 36.1266 56.6822C36.2992 58.051 36.1048 58.295 36.1048 58.295L33.6925 62.4967C33.3354 63.068 33.5279 63.5342 34.1131 63.5342L36.934 63.5302C37.5212 63.5302 38.2929 63.068 38.642 62.4947L49.4933 44.1408C49.4933 44.1428 50.5367 42.5736 49.5667 42.5954Z" fill="#003087"/>
                                                                                    </g>
                                                                                    <defs>
                                                                                    <clipPath id="clip0">
                                                                                    <rect width="100" height="100" fill="white"/>
                                                                                    </clipPath>
                                                                                    </defs>
                                                                                </svg>
                                                                            </v-btn>
                                                                        </v-col>
                                                                        <v-col lg="6" cols="12" >
                                                                        <v-btn height="60" width="100%" color="#E7E7E7" rounded >
                                                                            <svg width="100" height="42" viewBox="0 0 100 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M7.02778 16.2548C7.02778 15.1748 7.91667 14.7594 9.38889 14.7594C11.5 14.7594 14.1667 15.3963 16.2778 16.5317V10.0242C13.9722 9.11042 11.6944 8.75043 9.38889 8.75043C3.75 8.75043 0 11.6857 0 16.5871C0 24.2298 10.5556 23.0114 10.5556 26.3067C10.5556 27.5805 9.44444 27.9958 7.88889 27.9958C5.58333 27.9958 2.63889 27.0543 0.305556 25.7805V32.3711C2.88889 33.4787 5.5 33.9495 7.88889 33.9495C13.6667 33.9495 17.6389 31.0973 17.6389 26.1405C17.6111 17.8885 7.02778 19.3562 7.02778 16.2548ZM25.8056 3.21218L19.0278 4.65213L19 26.8328C19 30.9311 22.0833 33.9495 26.1944 33.9495C28.4722 33.9495 30.1389 33.5341 31.0556 33.0357V27.4143C30.1667 27.7743 25.7778 29.0481 25.7778 24.9498V15.1194H31.0556V9.22118H25.7778L25.8056 3.21218ZM39.6944 11.2703L39.25 9.22118H33.25V33.451H40.1944V17.0301C41.8333 14.8979 44.6111 15.2856 45.4722 15.5902V9.22118C44.5833 8.88889 41.3333 8.27968 39.6944 11.2703ZM47.1667 9.22118H54.1389V33.451H47.1667V9.22118ZM47.1667 7.11665L54.1389 5.62132V0L47.1667 1.46764V7.11665ZM68.6389 8.75043C65.9167 8.75043 64.1667 10.0242 63.1944 10.9103L62.8333 9.19349H56.7222V41.4815L63.6667 40.0138L63.6944 32.1772C64.6945 32.8972 66.1667 33.9218 68.6111 33.9218C73.5833 33.9218 78.1111 29.9342 78.1111 21.1561C78.0833 13.1256 73.5 8.75043 68.6389 8.75043ZM66.9722 27.8297C65.3333 27.8297 64.3611 27.2482 63.6944 26.5282L63.6667 16.2548C64.3889 15.4517 65.3889 14.8979 66.9722 14.8979C69.5 14.8979 71.25 17.7224 71.25 21.3499C71.25 25.0606 69.5278 27.8297 66.9722 27.8297ZM100 21.433C100 14.3441 96.5556 8.75043 89.9722 8.75043C83.3611 8.75043 79.3611 14.3441 79.3611 21.3776C79.3611 29.7127 84.0833 33.9218 90.8611 33.9218C94.1667 33.9218 96.6667 33.1741 98.5555 32.1218V26.5836C96.6667 27.5251 94.5 28.1066 91.75 28.1066C89.0556 28.1066 86.6667 27.1651 86.3611 23.8975H99.9444C99.9444 23.5376 100 22.0976 100 21.433ZM86.2778 18.8024C86.2778 15.6732 88.1944 14.3718 89.9444 14.3718C91.6389 14.3718 93.4444 15.6732 93.4444 18.8024H86.2778Z" fill="#6772E5"/>
                                                                            </svg>
                                                                        </v-btn>
                                                                        </v-col>
                                                                    </v-row>
                                                                </div>
                                                                <div class="form-payment-tm903" >
                                                                    <v-text-field
                                                                        class="input-payment-tm903"
                                                                        label="Email"
                                                                        outlined
                                                                    ></v-text-field>
                                                                    <v-text-field
                                                                        class="input-payment-tm903"
                                                                        label="Password"
                                                                        outlined
                                                                    ></v-text-field>
                                                                    <p class="message-paswwrod-tm903" >
                                                                        Did you forget your password?
                                                                    </p>
                                                                    <br>
                                                                    <div class="send-button-tm903" >
                                                                        <v-btn 
                                                                            width="100%" 
                                                                            rounded
                                                                            height="60"
                                                                            color="#FFD43B"
                                                                        >
                                                                            <span class="send-pay-tm903">Send Pay</span>
                                                                        </v-btn>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </v-col>
                                                    </v-row>
                                                </v-container>
                                            </v-card>
                                            </v-dialog>
                                        </v-row>
                                    </v-col>
                                    <v-col class="pl-5 pl-sm-8" v-show="hiden_mobile" cols="6">
                                        <div class="d-flex" >
                                            <v-btn class="mr-lg-5 mr-md-4 mr-sm-8" fab height="60" width="60" color="#FFD43B">
                                                <v-icon size="25" color="#0D001A" >mdi-instagram</v-icon>
                                            </v-btn>
                                            <v-btn class="mr-lg-5 mr-md-4 mr-sm-8" fab height="60" width="60" color="#FFD43B">
                                                <v-icon size="25" color="#0D001A" >mdi-twitter</v-icon>
                                            </v-btn>
                                            <v-btn fab height="60" width="60" color="#FFD43B">
                                                <v-icon size="25" color="#0D001A" >mdi-facebook</v-icon>
                                            </v-btn>
                                        </div>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </div>
        </div>
        <div class="content-tm903" >
            <v-tabs
                v-model="menu_tab"
                centered
                hide-slider 
                class="menu-tabs-tm903"
                >
                <v-tab
                    v-for="(value, index) in menu_tabs"
                    :key="index"
                >
                <v-icon :size="size_icon_tabs" left> {{ value.icon }} </v-icon>
                   <span class="title-tabs-tm903" > {{ value.name }} </span>
                </v-tab>
            </v-tabs>
        </div>
        <div class="content-tabs-tm903" >
            <v-tabs-items v-model="menu_tab">
                <v-tab-item key="portfolio">
                    <v-row class="portfolio-tm903" >
                        <v-col
                        class="firt-portfolio-tm903"
                        lg="4"
                        md="4"
                        sm="4"
                            v-for="(value,index) in portfolio.slice(0, 1)"
                            :key="index"
                            :width="size_portfolio(index)" :height="size_portfolio(index)"
                            >
                            <v-img class="protfolio-img-tm903" :src="value.img" >
                            <v-dialog
                            v-model="dialog"
                            width="500"
                            >
                            <template v-slot:activator="{ on }">
                                <div v-on="on"  class="preview-icon-903 ">
                                    <svg 
                                        viewBox="0 0 9 10" 
                                        xmlns="http://www.w3.org/2000/svg" >
                                        <path 
                                            d="M5.8607 0.989014L6.8956 2.02392L5.59522 3.3153L6.23416 3.95425L7.52555 2.65386L8.56045 3.68877V0.989014H5.8607ZM0.461182 3.68877L1.49609 2.65386L2.78747 3.95425L3.42642 3.3153L2.12603 2.02392L3.16094 0.989014H0.461182V3.68877ZM3.16094 9.08829L2.12603 8.05338L3.42642 6.762L2.78747 6.12305L1.49609 7.42344L0.461182 6.38853V9.08829H3.16094ZM8.56045 6.38853L7.52555 7.42344L6.23416 6.12305L5.59522 6.762L6.8956 8.05338L5.8607 9.08829H8.56045V6.38853Z">
                                        </path>
                                    </svg>
                                </div>
                            </template>
                            <div>
                                <v-img :src="value.img" ></v-img>
                            </div>
                            </v-dialog>
                            </v-img>
                        </v-col>
                        <v-col lg="8"  cols="12" sm="12" >
                            <v-row>
                                <v-col
                                    lg="3"
                                    md="3"
                                    sm="4"
                                    cols="6"
                                    v-for="(value,index) in portfolio.slice(1, 9)"
                                    :key="index"
                                    :width="size_portfolio(index)" :height="size_portfolio(index)"
                                    >
                                    <v-img class="protfolio-img-tm903" :src="value.img" >
                                    <v-dialog
                                    v-model="dialog"
                                    width="500"
                                    >
                                    <template v-slot:activator="{ on }">
                                    <div v-on="on"  class="preview-icon-903 ">
                                        <svg 
                                            viewBox="0 0 9 10" 
                                            xmlns="http://www.w3.org/2000/svg" >
                                            <path 
                                                d="M5.8607 0.989014L6.8956 2.02392L5.59522 3.3153L6.23416 3.95425L7.52555 2.65386L8.56045 3.68877V0.989014H5.8607ZM0.461182 3.68877L1.49609 2.65386L2.78747 3.95425L3.42642 3.3153L2.12603 2.02392L3.16094 0.989014H0.461182V3.68877ZM3.16094 9.08829L2.12603 8.05338L3.42642 6.762L2.78747 6.12305L1.49609 7.42344L0.461182 6.38853V9.08829H3.16094ZM8.56045 6.38853L7.52555 7.42344L6.23416 6.12305L5.59522 6.762L6.8956 8.05338L5.8607 9.08829H8.56045V6.38853Z">
                                            </path>
                                        </svg>
                                    </div>
                                    </template>
                                    <div>
                                        <v-img :src="value.img" ></v-img>
                                    </div>
                                    </v-dialog>
                                    </v-img>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-tab-item>
                <v-tab-item key="education">
                    <v-row>
                        <v-col
                            xl="4" 
                            lg="4"
                            cols="12"
                            v-for="(value,index) in 3"
                            :key="index">
                                <v-card
                                    class="box-tm903 mx-auto"
                                    width="100%"
                                >
                                    <v-list-item three-line>
                                    <v-list-item-content>
                                        <v-list-item-title class="box-title-tm903 ml-lg-8 ml-md-10 ml-sm-10 mt-10 mb-7"> Ryerson University</v-list-item-title>
                                        <span  class="box-subtitle-tm903 ml-md-10 ml-sm-10 ml-lg-8">Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.</span>
                                    </v-list-item-content>

                                    <v-list-item-avatar
                                        class="mt-10"
                                        tile
                                        color="transparent"
                                    >
                                        <v-icon :size="size_icon_boxes" color="#000" >mdi-school-outline</v-icon>
                                    </v-list-item-avatar>
                                    </v-list-item>

                                    <v-card-actions>
                                        <div class="box-date-tm903 mb-6 ml-2 mt-lg-8 ml-md-12 ml-sm-12 ml-lg-10">2010-2013</div>
                                    </v-card-actions>
                                </v-card>
                        </v-col>
                    </v-row>
                </v-tab-item>
                <v-tab-item key="experience">
                    <v-row>
                        <v-col 
                            xl="4" 
                            lg="4"
                            cols="12"
                            v-for="(value,index) in 3"
                            :key="index">
                                <v-card
                                    class="box-tm903 mx-auto"
                                    width="100%"
                                >
                                    <v-list-item three-line>
                                    <v-list-item-content>
                                        <v-list-item-title class="box-title-tm903 ml-lg-8 ml-md-10 ml-sm-10 mt-10 mb-7"> web design </v-list-item-title>
                                        <span  class="box-subtitle-tm903 ml-md-10 ml-sm-10 ml-lg-8">Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.</span>
                                    </v-list-item-content>

                                    <v-list-item-avatar
                                        class="mt-10"
                                        tile
                                        color="transparent"
                                    >
                                        <v-icon :size="size_icon_boxes" color="#000" >mdi-briefcase-outline</v-icon>
                                    </v-list-item-avatar>
                                    </v-list-item>

                                    <v-card-actions>
                                        <div class="box-date-tm903 mb-6 ml-2 mt-lg-8 ml-md-12 ml-sm-12 ml-lg-10">2010-2013</div>
                                    </v-card-actions>
                                </v-card>
                        </v-col>
                    </v-row>
                </v-tab-item>
                <v-tab-item key="skills">
                    <v-tabs
                        class="menu-skills-tabs-tm903"
                        v-model="tabs_skills"
                        :slider-size="5"
                        >
                        <v-tabs-slider color="#0D001A" ></v-tabs-slider>
                        <v-tab
                            v-for="value in menu_skills"
                            :key="value.name"
                        >
                            {{ value.name }}
                        </v-tab>
                    </v-tabs>
                    <v-tabs-items class="itmes-skills-903" v-model="tabs_skills" >
                        <v-tab-item key="programming languages">
                        <v-row>
                        <v-col 
                            xl="4" 
                            lg="4"
                            cols="12"
                            v-for="(value,index) in skill_programming"
                            :key="index">
                                <v-card
                                    class="box-tm903 mx-auto "
                                    width="100%"
                                >
                                    <v-list-item three-line>
                                    <v-list-item-content>
                                        <v-list-item-title class="box-title-tm903 ml-lg-8 ml-md-10 ml-sm-10 mt-10 mb-7"> {{ value.title }} </v-list-item-title>
                                    </v-list-item-content>

                                    <v-list-item-avatar
                                        class="mt-10"
                                        tile
                                        color="transparent"
                                    >
                                        <v-icon :size="size_icon_boxes" color="#000" >mdi-brush</v-icon>
                                    </v-list-item-avatar>
                                    </v-list-item>
                                    <div class="d-flex px-10">
                                        <v-progress-linear
                                            color="#FFD43B"
                                            :value="value.level"
                                            rounded
                                            height="15"
                                        ></v-progress-linear>
                                        <span class="pl-7 box-level-tm903" >{{ value.level }}%</span>
                                    </div>
                                    <v-divider class="mt-12 ml-10 mr-10" ></v-divider>
                                    <v-card-actions>
                                        <div class="box-date-tm903 mb-6 ml-2 mt-lg-8 ml-md-12 ml-sm-12 ml-lg-10">Total project: {{ value.project }}</div>
                                    </v-card-actions>
                                </v-card>
                        </v-col>
                    </v-row>
                        </v-tab-item>
                    </v-tabs-items>
                </v-tab-item>
                <v-tab-item key="media">
                    <div class="content-media-tm903" >
                    <v-row style="padding-bottom: 300px;" >
                        <v-col xl="7" lg="8" md="12" >
                            <v-row>
                                <v-col xl="6" lg="6" md="6" sm="6" >
                                    <v-row>
                                        <v-col 
                                            v-for="(value, index) in video_lists" 
                                            :key="index"
                                            >
                                            <Thevideo :link="value.link" :img="value.img" />
                                        </v-col>
                                    </v-row>
                                </v-col>
                                <v-col xl="6" lg="6" md="6" sm="6">
                                    <v-row>
                                        <v-col 
                                        cols="12"
                                            v-for="(value, index) in audio_lists" 
                                            :key="index"
                                            >
                                            <Theaudio :file="value.file" :img="value.img" />
                                        </v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                    <v-footer
                    fixed
                    color="#fff"
                    class="media-player-tm903"
                    >
                     <v-row justify="center" class="align-center" >
                            <v-col  class="avatar-media-player-tm903" lg="2" cols="2" sm="3">
                                <v-row justify="center" class="align-center" >
                                    <v-col lg="3" md="4" cols="3" sm="6" >
                                        <v-list-item-avatar 
                                            height="65"
                                            width="65" 
                                            color="transparent">
                                            <v-img src="/images/resume_themes/theme903/audio1.png" ></v-img>
                                        </v-list-item-avatar>
                                    </v-col>
                                    <v-col >
                                        <div class="audio-info-903" >
                                            <span class="title-audio-tm903" >AUDIO_04/09/2020</span>
                                            <br>
                                            <span class="subtitle-audio-tm903" >Hean Prinsloo</span>
                                        </div>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col class="linear-playing-audio-tm903" cols="3" >
                                    <div class="ml-n12" >
                                        <v-progress-linear
                                            height="54"
                                            color="#FFD43B"
                                            rounded
                                            style="cursor:pointer;border-radius: 30px;"
                                            @click.native="setPosition()" :disabled="!loaded"
                                            v-model="percentage"
                                            >
                                            <v-img class="ml-6 mt-6 mb-6 mr-6" src="/images/resume_themes/theme903/Bars.png" ></v-img>
                                        </v-progress-linear>
                                        <div class="d-flex" >
                                            <span class="timer-player-903" >0:00</span>
                                            <v-spacer></v-spacer>
                                            <span class="timer-player-903" >5:38</span>
                                        </div>

                                    </div>
                            </v-col>
                            <v-col lg="6" md="4" sm="8" cols="12" >
                                <div class="d-flex" >
                                        <v-list-item-icon>
                                            <v-btn icon>
                                                <v-icon  >mdi-shuffle</v-icon>
                                            </v-btn>
                                        </v-list-item-icon>
                                        <div class="player-audio-tm903"  >
                                            <v-btn style="margin-left:auto;margin-right:auto;" height="60" width="60" color="#0D001A" fab>
                                                <v-icon color="#FFFFFF" >mdi-chevron-double-left</v-icon>
                                            </v-btn>
                                            <v-btn  style="margin-left:auto;margin-right:auto;" height="60" width="60" color="#FFD43B" fab>
                                                <v-icon @click="playing=false" v-if="playing">mdi-play</v-icon>
						                        <v-icon @click="playing=true" v-else>mdi-pause</v-icon>
                                            </v-btn>
                                            <v-btn style="margin-left:auto;margin-right:auto;"  height="60" width="60"  color="#0D001A" fab>
                                                <v-icon color="#FFFFFF" >mdi-chevron-double-right</v-icon>
                                            </v-btn>
                                        </div>
                                        <v-list-item-icon>
                                            <v-btn icon>
                                                <v-icon  >mdi-repeat</v-icon>
                                            </v-btn>
                                        </v-list-item-icon>
                                </div>
                                <div class=" second-preogress-player-903 d-flex px-6">
                                        <v-progress-linear
                                        class="mt-2"
                                            color="#FFD43B"
                                            value="50"
                                            rounded
                                            height="10"
                                        ></v-progress-linear>
                                        <span class="pl-7" >2:00:00</span>
                                    </div>
                            </v-col>
                            <v-col class="full-media-player-tm903" >
                                <v-btn icon>
                                    <v-icon >mdi-fullscreen</v-icon>
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-footer>
                    </div>
                </v-tab-item>
                <v-tab-item key="about me">
                    <v-row  class=" aboutme-tm903" >
                        <v-col xl="8" lg="8" md="8" cols="12" >
                            <p class="aboutme-text-tm903" >
                                Donec a augue gravida, vulputate ligula et, pellentesque arcu. 🤖Morbi feugiat eros nec sem ultrices, et venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. 🥙 Mauris gravida laoreet lacus, non hendrerit elit suscipit a. 🎉 Nunc ut ultricies massa, eu sollicitudin enim. Praesent quis ultrices nibh. Donec bibendum🍭 elit sed erat convallis, at feugiat arcu mollis. Nunc quam eros, venenatis id tristique malesuada, ornare eu augue. Aliquam volutpat eros id libero posuere 🎨vestibulum.
                            </p>
                        </v-col>
                        <v-col class="aboutme-image-tm903"  cols="4" >
                            <img  class="about-image-tm903" src="/images/resume_themes/theme903/profile.png" >
                        </v-col>
                         <v-col class="aboutme-infos-tm903"  xl="4" lg="4" cols="12" >
                            <span class="about-item-tm930" > hour rate &nbsp;<span class="about-much-tm930" >$20</span> &nbsp; Weekly availability &nbsp;<span class="about-much-tm930" >250</span></span><br>
                            <span class="followme-title-tm903" > follow me </span>
                            <div class="d-flex" >
                                <v-btn fab height="40" width="40" color="#FFD43B">
                                    <v-icon size="20" color="#0D001A" >mdi-instagram</v-icon>
                                </v-btn>
                                <v-btn class="ml-5" fab height="40" width="40" color="#FFD43B">
                                    <v-icon size="20" color="#0D001A" >mdi-twitter</v-icon>
                                </v-btn>
                                <v-btn class="ml-5" fab height="40" width="40" color="#FFD43B">
                                    <v-icon size="20" color="#0D001A" >mdi-facebook</v-icon>
                                </v-btn>
                            </div>
                        </v-col>
                    </v-row>
                </v-tab-item>
            </v-tabs-items>
        </div>
    </v-app>
</template>
<script>
    import Theaudio from './Theaudio'
    import Thevideo from './Thevideo'
export default {
    name:"hold-theme903",
    components:{
        Theaudio,
        Thevideo
    },
    data(){
        return{
            playing:true,
            payment_dialog: false,
            notifications: false,
            sound: true,
            widgets: false,
            dialog: false,
            menu_tab:null,
            tabs_skills:null,
            audio_lists:[
                {file:"http://www.hochmuth.com/mp3/Boccherini_Concerto_478-1.mp3",img:"/images/resume_themes/theme903/audio1.png"},
                {file:"http://www.hochmuth.com/mp3/Boccherini_Concerto_478-1.mp3",img:"/images/resume_themes/theme903/audio2.png"},
                {file:"http://www.hochmuth.com/mp3/Boccherini_Concerto_478-1.mp3",img:"/images/resume_themes/theme903/audio3.png"},
            ],
            video_lists:[
                {link:"/images/resume_themes/theme903/video.mp4",img:"/images/resume_themes/theme903/video1.png"},
                {link:"/images/resume_themes/theme903/video.mp4",img:"/images/resume_themes/theme903/video2.png"},
                {link:"/images/resume_themes/theme903/video.mp4",img:"/images/resume_themes/theme903/video3.png"},
            ],
            menu_tabs:[
                {name:'portfolio',icon:'mdi-image-outline'},
                {name:'education',icon:'mdi-school-outline'},
                {name:'experience',icon:'mdi-briefcase-outline'},
                {name:'skills',icon:'mdi-brush'},
                {name:'media',icon:'mdi-play-box-multiple-outline'},
                {name:'about me',icon:'mdi-account-outline'}
            ],
            menu_skills:[
                {name:'programming languages'},
                {name:'frameworks'},
                {name:'design skills'},
                {name:'software'}
            ],
            portfolio:[
                { img:"/images/resume_themes/theme903/profile1.png" },
                { img:"/images/resume_themes/theme903/profile2.png" },
                { img:"/images/resume_themes/theme903/profile3.png" },
                { img:"/images/resume_themes/theme903/profile4.png" },
                { img:"/images/resume_themes/theme903/profile5.png" },
                { img:"/images/resume_themes/theme903/profile4.png" },
                { img:"/images/resume_themes/theme903/profile5.png" },
                { img:"/images/resume_themes/theme903/profile4.png" },
                { img:"/images/resume_themes/theme903/profile5.png" },
                { img:"/images/resume_themes/theme903/profile5.png" },
                { img:"/images/resume_themes/theme903/profile4.png" },
                { img:"/images/resume_themes/theme903/profile5.png" }
            ],
            skill_programming:[
                {title:"java",level:"58",project:"50"},
                {title:"php",level:"86",project:"50"},
                {title:"c#",level:"58",project:"50"}
            ]
        }
    },
    computed: {
        size_icon_tabs(){
        switch (this.$vuetify.breakpoint.name) {
          case 'xs': return '12'
          case 'sm': return '23'
          case 'md': return '23'
          case 'lg': return '23'
          case 'xl': return '23'
        }
      },
      size_icon_boxes(){
        switch (this.$vuetify.breakpoint.name) {
          case 'xs': return '27'
          case 'sm': return '27'
          case 'md': return '45'
          case 'lg': return '45'
          case 'xl': return '45'
        }
      },
      hiden_mobile () {
        switch (this.$vuetify.breakpoint.name) {
          case 'xs': return false
          case 'sm': return true
          case 'md': return true
          case 'lg': return true
          case 'xl': return true
        }
      },
      hire_me_color(){
          switch (this.$vuetify.breakpoint.name) {
          case 'xs': return '#FFD43B'
          case 'sm': return '#fff'
          case 'md': return '#fff'
          case 'lg': return '#fff'
          case 'xl': return '#fff'
        }
      }
    },
    methods:{

        size_portfolio(value){
            if(value===0){
                return '500'
            }else{
                return '242'
            }
        }
    }
}
</script>

<style lang="scss" >
#hold-theme903{
     max-width: 1920px;
    margin-left: auto;
    margin-right: auto;
    .v-tabs:not(.v-tabs--vertical):not(.v-tabs--right) > .v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes) .v-slide-group__prev{
        display: none;
    }

            .payment-tm903{
                    @media only screen and (max-width: 1024px){
                    background: #FFD43B;
                    border-radius: 50px;
                    }
                .payment-left-tm903{
                    @media only screen and (max-width: 1024px){
                        display: none;
                    }
                }
                .payment-right-tm903{
                    margin-left: auto;
                    margin-right: auto;
                    max-width: 500px;
                    text-align: center;
                    .payment-title-tm903{
                        font-family: Poppins;
                        font-style: normal;
                        font-weight: 800;
                        font-size: 40px;
                        line-height: 60px;
                        color: #333333;
                    }
                    .button-payement-tm903{
                        padding-top: 90px;
                    }
                    .form-payment-tm903{
                            margin-top: 90px;
                        .input-payment-tm903{
                            margin-left: auto;
                            margin-right: auto;
                            border: 5px solid #0D001A;
                            box-sizing: border-box;
                            border-radius: 100px;
                            //width: 500px;
                            height: 60px;
                            margin-bottom: 40px;
                        }
                        .message-paswwrod-tm903{
                            font-family: Poppins;
                            font-style: normal;
                            font-weight: 600;
                            font-size: 16px;
                            line-height: 24px;
                            color: #333333;
                            //margin-top: 90px;
                            float: right;
                        }
                        .send-button-tm903{
                            margin-top: 90px;
                            .send-pay-tm903{
                                font-family: Poppins;
                                font-style: normal;
                                font-weight: bold;
                                font-size: 20px;
                                line-height: 30px;
                                text-transform: capitalize;
                                color: #0D001A;
                            }
                        }
                    }
                }
            }
    .content-header-tm903{
        padding: 40px 75px 50px;
        @media only screen and (max-width: 1024px){
            padding: 40px 30px 26px;
        }
        @media only screen and (max-width: 764px){
            padding: 20px 15px 25px;
        }
        .header-tm903{
            background-image: url("/images/resume_themes/theme903/bg2.png") ; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 50px;
            height: 340px;
            @media only screen and (max-width: 1024px){
            background-image: url("/images/resume_themes/theme903/bg1.png") ; 
            }
            @media only screen and (max-width: 764px){
                border-radius: 20px;
            }
            @media only screen and (max-width: 596px){
                max-height: 120px;
            }
            @media only screen and (max-width: 425px){
                background-image: initial ; 
                background: #0D001A;
            }
            .profile-image-tm903{
                max-width: 150px;
                max-height: 150px;
                margin:auto;
                border-radius: 50px;
                @media only screen and (max-width: 1024px){
                    max-width: 125px;
                    max-height: 125px; 
                }
                @media only screen and (max-width: 764px){
                    max-width: 55px;
                    max-height: 55px;
                }
            }
            .name-tm903{
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold;
                font-size: 40px;
                line-height: 54px;
                color: #FFFFFF;
                @media only screen and (max-width: 1024px){
                    font-size: 36px;
                    line-height: 49px;
                }
                @media only screen and (max-width: 764px){
                    font-family: Poppins;
                    font-style: normal;
                    font-weight: 800;
                    font-size: 16px;
                    line-height: 24px;
                }
                @media only screen and (max-width: 400px){
                    font-size: 14px;
                }
            }
            .job-tm903{
                font-family: Poppins;
                font-style: normal;
                font-weight: bold;
                font-size: 20px;
                line-height: 30px;
                color: #FFFFFF;
                @media only screen and (max-width: 1024px){
                    font-size: 16px;
                    line-height: 24px;
                }
                @media only screen and (max-width: 764px){
                    font-family: Poppins;
                    font-style: normal;
                    font-weight: bold;
                    font-size: 10px;
                    line-height: 15px;
                }
            }
            .description-tm903{
                font-family: Poppins;
                font-style: normal;
                font-weight: normal;
                font-size: 18px;
                line-height: 27px;
                color: #FFFFFF;
                @media only screen and (max-width: 1024px){
                    font-size: 12px;
                    line-height: 18px;
                }
            }
            .info-tm903{
                font-family: Poppins;
                font-style: normal;
                font-weight: normal;
                font-size: 14px;
                line-height: 21px;
                display: flex;
                align-items: center;
                text-transform: uppercase;
                color: rgba(255, 255, 255, 0.5);
                .info-get-tm903{
                    font-family: Poppins;
                    font-style: normal;
                    font-weight: bold;
                    font-size: 20px;
                    line-height: 30px;
                    display: flex;
                    align-items: center;
                    color: #FFFFFF;
                }
            }
            .hireme-tm903{
            text-transform: capitalize;
            font-family: Poppins;
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
            line-height: 30px;
            color: #0D001A;
            height:60px;
            width:100%;
                @media only screen and (max-width: 764px){
                    font-size: 14px;
                }
                @media only screen and (max-width: 597px){
                    height:35px;
                    font-size: 10px;
                    margin-left: -10px;
                    width:80%;
                }
            }
        }
    }
    .content-tm903{
        padding: 0px 75px 0px;
        @media only screen and (max-width: 1024px){
            padding: 00px 30px 0px;
        }
        @media only screen and (max-width: 764px){
            padding: 0px 15px 0px;
        }
        .menu-tabs-tm903{
            .v-slide-group__wrapper {
                height: 60px;                
            }
            @media only screen and (max-width: 764px){
            height: 40px;   
            }
            .v-tab{
                text-transform: capitalize;
                font-family: Poppins;
                font-style: normal;
                font-weight: 500;
                font-size: 20px;
                line-height: 30px;
                color: #B3B3B3;
                height: 60px;
                min-width: initial;
                max-width: initial;
                 padding: 0 70px;
                @media only screen and (max-width: 1024px){
                font-size: 15px;
                line-height: 24px;
                padding: 0 30px;
                }
                @media only screen and (max-width: 764px){
                    font-size: 12px;
                    line-height: 18px;
                    height: 40px;
                    padding: 0 15px;
                }
                @media only screen and (max-width: 375px){
                    padding: 0 10px;
                }
                    .title-tabs-tm903{
                        @media only screen and (max-width: 1024px){
                        display: none;
                        }
                    }
            }
            .v-tab--active{
                background: #0D001A;
                border-radius: 50px;
                color: #FFFFFF;
                @media only screen and (max-width: 1024px){
                
                }
                @media only screen and (max-width: 764px){
                    color: #FFD43B;
                }
                    .title-tabs-tm903{
                        @media only screen and (max-width: 1024px){
                        display: initial
                        }
                        @media only screen and (max-width: 764px)
                        {
                            margin-left: 0px;
                        }
                    }
            }
        }
    }
    .content-tabs-tm903{
        padding: 80px 190px 0px;
        @media only screen and (max-width: 1024px){
            padding: 40px 30px 0px;
        }
        @media only screen and (max-width: 764px){
            padding: 20px 15px 0px;
        }
        .firt-portfolio-tm903{
            @media only screen and (max-width: 1024px){
            display: none
            }
        }
        // .portfolio-tm903{
        //     @media only screen and (max-width: 1024px){
        //     direction: rtl;
        //     }
        // }
        .preview-icon-903{
            color:#fff;
            height: 25px;
            width: 25px;
            position: absolute;
            right: 20px;
            top: 20px;
            }
        .col{
                height: 100%;
        }
        .box-tm903{
            background: #FFFFFF;
            box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            border-left: 30px solid #0D001A;
            .v-progress-linear__background{
                background-color:#0D001A !important;
                opacity: 1 !important;
            }
            .v-progress-linear{
                box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
            }
            .v-progress-linear--rounded {
                border-radius: 30px;
            }
            .box-level-tm903{
                font-family: Roboto;
                font-style: normal;
                font-weight: 900;
                font-size: 14px;
                line-height: 16px;
                color: #0D001A;
            }
            .box-title-tm903{
                font-family: Roboto;
                font-style: normal;
                font-weight: bold;
                font-size: 24px;
                line-height: 28px;
                color: #000000;
                @media only screen and (max-width: 425px){
                    font-size: 14px;
                    line-height: 16px;
                }
            }
            .box-subtitle-tm903{
                font-family: Roboto;
                font-style: normal;
                font-weight: normal;
                font-size: 20px;
                line-height: 23px;
                color: #000000;
                @media only screen and (max-width: 425px){
                    font-size: 12px;
                    line-height: 14px;
                }
            }
            .box-date-tm903{
                text-transform: capitalize;
                font-family: Roboto;
                font-style: normal;
                font-weight: normal;
                font-size: 13px;
                line-height: 15px;
                color: #B2B2B2;
            }
        }
        .menu-skills-tabs-tm903{
            .v-tabs:not(.v-tabs--vertical):not(.v-tabs--right) > .v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes) .v-slide-group__prev{
                display: none;
            }
            .v-tabs-slider {
                background-color: currentColor;
                height: 100%;
                width: 60%;
            }
            .v-tab{
                text-transform: capitalize;
                font-family: Poppins;
                font-style: normal;
                font-weight: normal;
                font-size: 26px;
                line-height: 39px;
                color: #111111;
                max-width:100%;
                padding: 0 0px;
                margin-right: 70px;
                @media only screen and (max-width: 1024px){
                    font-size: 20px;
                    margin-right: 50px;
                }
                @media only screen and (max-width: 425px){
                    font-size: 15px;
                    margin-right: 35px;
                }
            }
        }
        .itmes-skills-903{
            margin-top: 60px;
        }
        .aboutme-tm903{ 
            .aboutme-text-tm903{
            font-family: Poppins;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 18px;
            color: #333333;
            }
            .aboutme-image-tm903{
                @media only screen and (max-width: 1024px){
                    display: none;
                    }
                .about-image-tm903{
                    width: 350px;
                    height: 350px;
                    float: right;
                    border-radius: 50%;
                }
            }
            .aboutme-infos-tm903{
                display: none;
                @media only screen and (max-width: 1024px){
                    display: initial;
                    }
                .about-item-tm930{
                    font-family: Poppins;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 14px;
                    line-height: 21px;
                    display: flex;
                    align-items: center;
                    text-transform: uppercase;
                    color: #333333;
                    .about-much-tm930{
                    font-weight: bold;
                    font-size: 20px;
                    line-height: 30px;
                    display: flex;
                    align-items: center;
                    color: #0D001A;
                    }
                }
                .followme-title-tm903{
                    font-family: Poppins;
                    font-style: normal;
                    font-weight: bold;
                    font-size: 12px;
                    line-height: 18px;
                    color: #000000;
                }
            }
        }
        .content-media-tm903
        {
            .media-player-tm903{
                z-index:500;
             padding: 0px 40px 0px;
             @media only screen and (max-width: 1024px){
             padding: 0px 20px 0px;
                 }
             .linear-playing-audio-tm903{
                 @media only screen and (max-width: 1024px){
                     display:none;
                 }
             }
             .avatar-media-player-tm903{
                 @media only screen and (max-width: 425px){
                     display:none;
                 }
             }
             .full-media-player-tm903{
                 @media only screen and (max-width: 425px){
                     display:none;
                 }
             }
             .subtitle-audio-tm903{
                 @media only screen and (max-width: 1024px){
                     display:none;
                 }}
             .timer-player-903{
                font-family: Acumin Pro;
                font-style: normal;
                font-weight: 300;
                font-size: 14px;
                line-height: 17px;
                color: #000000;
             }

            .second-preogress-player-903{
                @media only screen and (min-width: 1024px){
                    display: none !important;
                }
             .v-progress-linear__background{
                 background: #0D001A !important;
                 opacity: 1 !important;
             }
            }
            }
        //     padding: 0px 205px 0px;
        // @media only screen and (max-width: 1024px){
        //     padding: 00px 30px 0px;
        // }
        // @media only screen and (max-width: 764px){
        //     padding: 0px 15px 0px;
        // }
        }
    }
}
</style>