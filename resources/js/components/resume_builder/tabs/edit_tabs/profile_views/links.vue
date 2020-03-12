<template>
    <div v-if="links">
        <div class="achievements-bar sub-bar" id="linksWrapper">
            <div class="bar-item" v-for="(tabName,i) in tabs" :key="i" :index="i" :item="tabName" :data-target="tabName"
                 @click="changeTab" :class="{ active : activeTab === tabName}">
                {{tabName.replace(/-/g, " ")}}
            </div>

            <div class="decorator"></div>
        </div>

        <transition :duration="590" class="mt-5 content" name="hide" mode="out-in">

            <div v-if="activeTab === 'My-profile-link'">

                <div class="hold-tab animated fadeIn">
                    <div class="input-field">
                        <label for="profilelink">My profile link</label>
                        <input type="text" name="profilelink" id="profilelink" v-model="profileLink.link">
                        <div class="error" v-if="errors.link">
                            {{ Array.isArray(errors.link) ? errors.link[0] : errors.link}}
                        </div>
                    </div>
                    <div class="quick-opts">
                        <a href="javascript:void(0)" @click="copyProfileLink"><span class="copy"></span></a>
                        <a href="javascript:void(0)"><span class="share"></span></a>
                    </div>
                    <a href="javascript:void(0)" @click="saveProfileLink" class="btn-blue"><img
                            src="/images/resume_builder/profile/icon-save2.png">Save this new link</a>

                </div>

            </div>

            <div v-else-if="activeTab === 'Social-link'">
                <div class="hold-tab social">
                    <div class="options-wrap">
                        <a href="javascript:void(0)" class="btn-outline" v-show="!isAddSocialLink" @click="isAddSocialLink = true">Add new link</a>
                        <!--<a href="javascript:void(0)" class="btn-outline">Auto import</a>-->
                    </div>
                    <div class="addItem-wrap animated fadeIn" v-show="isAddSocialLink">
                        <div class="input-field">
                            <label for="socialLink">Add social link</label>
                            <input id="socialLink" type="text" v-model="newSocialLink.link">
                            <div class="error" v-if="errors.link">
                                {{ Array.isArray(errors.link) ? errors.link[0] : errors.link}}
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="btn-blue" @click="saveLink(newSocialLink)"><img
                                src="/images/resume_builder/profile/icon-save2.png">Save new this link</a>
                        <a href="javascript:void(0)" class="btn-close ml-5" @click="isAddSocialLink = false">x</a>
                    </div>

                    <div class="list-links">
                        <ul>
                            <li v-for="(item, index) in socialLinks" :key="index" class="animated fadeIn link-item"
                                :class="{'fadeIn': activeListItem === index, 'movingDown': movingDown === index, 'movingUp': movingUp === index }">
                                        <span class="move-item">
                                            <a href="javascript:void(0)" class="go_up"
                                               @click.prevent="reorder('social','mup',index,index-1)"
                                               :class="index==0?'disable':''"></a>
                                            <a href="javascript:void(0)" class="go_down"
                                               @click.prevent="reorder('social','mdown',index,index+1)"
                                               :class="index==(socialLinks.length-1)?'disable':''"></a>
                                        </span>
                                <span class="info-link">
                                            <img src="/images/resume_builder/link-icon.png" alt="">
                                            {{item.link}}
                                        </span>
                                <div class="options">
                                    <div class="options-btn NoDecor"
                                         @click="optionSocialLinkId === item.id ? optionSocialLinkId=0 : optionSocialLinkId=item.id">
                                        <a href="javascript:void(0)" :class="{'opened':optionSocialLinkId === item.id}">
                                            Options
                                            <img src="/images/resume_builder/arrow-down.png" alt=""
                                                 :class="{'optionsOpened':optionSocialLinkId === item.id}">
                                        </a>
                                    </div>
                                    <div class="extended-options" v-show="optionSocialLinkId === item.id"
                                         :class="{'opened':optionSocialLinkId === item.id}">
                                        <!--<div class="edit-btn NoDecor" @click="editLink(item)">-->
                                            <!--<img src="/images/resume_builder/edit-icon.png" alt="edit icon">-->
                                            <!--Edit-->
                                        <!--</div>-->
                                        <div class="delete-btn NoDecor" @click="deleteLink(item)">
                                            <img src="/images/resume_builder/delete-icon.png" alt="delete icon">
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div v-else-if="activeTab === 'Portfolio-link'">
                <div class="hold-tab social">
                    <div class="options-wrap">
                        <a href="javascript:void(0)" class="btn-outline" v-show="!isAddPortfolioLink" @click="isAddPortfolioLink = true">Add new link</a>
                        <!--<a href="javascript:void(0)" class="btn-outline">Auto import</a>-->
                    </div>
                    <div class="addItem-wrap animated fadeIn" v-show="isAddPortfolioLink">
                        <div class="input-field">
                            <label for="portfolioLink">Add portfolio link</label>
                            <input id="portfolioLink" type="text" v-model="newPortfolioLink.link">
                            <div class="error" v-if="errors.link">
                                {{ Array.isArray(errors.link) ? errors.link[0] : errors.link}}
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="btn-blue" @click="saveLink(newPortfolioLink)"><img
                                src="/images/resume_builder/profile/icon-save2.png">Save new this link</a>
                        <a href="javascript:void(0)" class="btn-close ml-5" @click="isAddPortfolioLink = false">x</a>
                    </div>
                    <div class="list-links">
                        <ul>
                            <li v-for="(item, index) in portfolioLinks" :key="index" class="animated fadeIn link-item"
                                :class="{'fadeIn': activeListItem === index , 'movingDown': movingDown === index, 'movingUp': movingUp === index }">
                                        <span class="move-item">
                                            <a href="javascript:void(0)" class="go_up"
                                               @click.prevent="reorder('portfolio','mup',index,index-1)"
                                               :class="index==0?'disable':''"></a>
                                            <a href="javascript:void(0)" class="go_down"
                                               @click.prevent="reorder('portfolio','mdown',index,index+1)"
                                               :class="index==(socialLinks.length-1)?'disable':''"></a>
                                        </span>
                                <span class="info-link">
                                            <img src="/images/resume_builder/link-icon.png" alt="">
                                            {{item.link}}
                                        </span>

                                    <div class="options">
                                    <div class="options-btn NoDecor"
                                         @click="optionPortfolioLinkId === item.id ? optionPortfolioLinkId=0 : optionPortfolioLinkId=item.id">
                                        <a href="javascript:void(0)" :class="{'opened':optionPortfolioLinkId === item.id}">
                                            Options
                                            <img src="/images/resume_builder/arrow-down.png" alt=""
                                                 :class="{'optionsOpened':optionPortfolioLinkId === item.id}">
                                        </a>
                                    </div>
                                    <div class="extended-options" v-show="optionPortfolioLinkId === item.id"
                                         :class="{'opened':optionPortfolioLinkId === item.id}">
                                        <!--<div class="edit-btn NoDecor" @click="editLink(item)">-->
                                            <!--<img src="/images/resume_builder/edit-icon.png" alt="edit icon">-->
                                            <!--Edit-->
                                        <!--</div>-->
                                        <div class="delete-btn NoDecor" @click="deleteLink(item)">
                                            <img src="/images/resume_builder/delete-icon.png" alt="delete icon">
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div v-else>
                <div class="hold-tab animated fadeIn">
                    <div class="input-field">
                        <label for="paymentLink">My payment link</label>
                        <input type="text" name="paymentLink" id="paymentLink" v-model="paymentLink.link">
                        <div class="error" v-if="errors.link">
                            {{ Array.isArray(errors.link) ? errors.link[0] : errors.link}}
                        </div>
                    </div>
                    <div class="quick-opts">
                        <a href="javascript:void(0)" @click="copyPaymentLink"><span class="copy"></span></a>
                        <a href="javascript:void(0)"><span class="share"></span></a>
                    </div>
                    <a href="javascript:void(0)" @click="savePaymentLink" class="btn-blue"><img
                            src="/images/resume_builder/profile/icon-save2.png">Save this new link</a>

                </div>
            </div>
        </transition>

    </div>
</template>

<script>
    import {moveTabsHelper} from '../../../helpers/tab-animations';

    export default {
        data: () => ({
            tabs: [
                'My-profile-link',
                'Social-link',
                'Portfolio-link',
                'Payment-link'
            ],
            activeTab: 'My-profile-link',
            /** Add item list flow */
            activeListItem: undefined,
            movingUp: undefined,
            movingDown: undefined,
            socialLinks: [],
            portfolioLinks: [],
            profileLink: '',
            paymentLink: '',
            isAddSocialLink: false,
            isAddPortfolioLink: false,
            newSocialLink: {
                category:'social_link',
                link:''
            },
            newPortfolioLink: {
                category:'portfolio_link',
                link:''
            },
            errors: {},
            optionPortfolioLinkId:'',
            optionSocialLinkId:''
        }),
        methods: {
            reorder(type, dir, from, to) {
                this.activeListItem = from;

                if (dir == 'mup') {
                    this.movingUp = from;
                    this.movingDown = undefined
                }
                if (dir == 'mdown') {
                    this.movingDown = from;
                    this.movingUp = undefined
                }
                setTimeout(() => {
                    switch (type) {
                        case 'social':
                            this.socialLinks.moveItem(from, to);
                            break;
                        case 'portfolio':
                            this.porfolioLinks.moveItem(from, to);
                            break;
                    }

                    this.activeListItem = undefined;
                    this.movingDown = undefined;
                    this.movingUp = undefined;
                }, 500)

            },
            setActiveTab(tab) {
                this.activeTab = tab
            },
            changeTab(e) {

                this.errors = {};
                // Here will be the animations between transitions
                moveTabsHelper(e, 'linksWrapper', this)
            },
            saveProfileLink() {
                if(!this.validURL(this.profileLink.link)){
                    this.errors = {link : 'Not a valid link!'} ;
                    return;
                }
                axios.put('/api/user/links', this.profileLink)
                    .then((response) => {
                        // console.log(response.data.data);
                        this.$store.dispatch('successMessage');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            },
            copyProfileLink() {
                let $temp = $("<input>");
                $("body").append($temp);
                $temp.val(this.profileLink.link).select();
                document.execCommand("copy");
                $temp.remove();
            },
            savePaymentLink() {
                if(!this.validURL(this.paymentLink.link)){
                    this.errors = {link : 'Not a valid link!'} ;
                    return;
                }
                axios.put('/api/user/links', this.paymentLink)
                    .then((response) => {
                        this.$store.dispatch('successMessage');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            },
            copyPaymentLink() {
                let $temp = $("<input>");
                $("body").append($temp);
                $temp.val(this.paymentLink.link).select();
                document.execCommand("copy");
                $temp.remove();
            },
            editLink(link){

            },
            deleteLink(link){
                if (!confirm('Do you want to delete this link [' + link.link + '] ?')) {
                    return;
                }
                axios.delete('/api/user/links/' + link.id)
                    .then((response) => {
                        this.links.forEach( (link,index) => {
                            if(link.id === response.data.data.id){
                                this.links.splice(index,1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            closeOptionsBtn() {
                this.optionPortfolioLinkId = 0;
                this.optionSocialLinkId = 0;
            },
            addSocialLink(){
                this.isAddSocialLink = true;
            },
            addPortfolioLink(){
                this.isAddPortfolioLink = true;
            },
            saveLink(link){
                if(!this.validURL(link.link)){
                   this.errors = {link : 'Not a valid link!'} ;
                    return;
                }
                axios.post('/api/user/links', link)
                    .then((response) => {
                        let addedLink = response.data.data;
                        this.links.push(addedLink);
                        this.clearLink();
                        // changes saved pop-up
                        this.$store.dispatch('successMessage');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors  = 'Something went wrong. Please try again.';
                        }
                    });
            },
            clearLink(){
                this.isAddSocialLink = false;
                this.isAddPortfolioLink = false;
                this.newSocialLink.link = '';
                this.newPortfolioLink.link = '';
            },
            validURL(str) {
                var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
                    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
                return !!pattern.test(str);
            }
        },
        computed: {
            links() {
                let links = this.$store.state.user.links;
                this.socialLinks = [];
                this.portfolioLinks = [];
                links.forEach((link) => {
                    if (link.category === 'profile_link') {
                        this.profileLink = link;
                    }
                    if (link.category === 'payment_link') {
                        this.paymentLink = link;
                    }
                    if (link.category === 'social_link') {
                        this.socialLinks.push(link);
                    }
                    if (link.category === 'portfolio_link') {
                        this.portfolioLinks.push(link);
                    }
                });
                return links;
            }
        },
        mounted() {
            this.changeTab({target: document.querySelector(`.bar-item[data-target=${this.activeTab}]`)})
        }
    }
</script>

<style lang="scss" scoped>
    $mainColor: #001CE2;

    .options {
        position: absolute;
        right: -100px;
        top: 5px;

        .options-btn {
            a {
                width: 88px;
                height: 29px;

                display: flex;
                justify-content: center;
                align-items: center;

                background: #FFFFFF 0 0 no-repeat padding-box;
                border: 1px solid #505050;
                border-radius: 5px;
                opacity: 1;

                font: 600 13px Noto Sans;
                letter-spacing: 0;
                color: #505050;

                img {
                    width: 13.3px;
                    height: 6.8px;
                    margin-left: 8px;
                }

                img.optionsOpened {
                    -webkit-transform: scaleY(-1);
                    transform: scaleY(-1);
                }
            }

            a.opened {
                border: 1px solid #1F5DE4;
            }

            a:focus {
                outline: none !important;
                box-shadow: none !important;
            }
        }

        .extended-options {
            background: #FFFFFF 0 0 no-repeat padding-box;
            border: 1px solid #505050;
            border-radius: 5px;
            opacity: 1;
            margin-top: 8px;
            width: 88px;
            height: 45px;
            padding-top: 5px;
            padding-left: 8px;

            .edit-btn, .delete-btn {
                display: flex;
                justify-content: flex-start;
                align-items: center;
                font: 600 13px Noto Sans;
                letter-spacing: 0;
                color: #505050;

                img {
                    width: 15.75px;
                    height: 14px;
                    margin-right: 6px;
                }

                &:hover {
                    cursor: pointer;
                }
            }

            .delete-btn {
                margin-top: 8px;

                img {
                    width: 10.89px;
                    height: 14px;
                    margin-right: 9.5px;
                }
            }
        }

        .extended-options.opened {
            border: 1px solid #1F5DE4;
        }
    }

    .link-item{
        min-width: 400px;
    }

    .error{
        color:red;
        padding-top:5px;
        padding-left:3px;
    }

    .info-link{
        img{
            margin-right: 6px !important;
            max-width: 30px !important;
            min-width: 20px !important;
        }
    }
</style>
