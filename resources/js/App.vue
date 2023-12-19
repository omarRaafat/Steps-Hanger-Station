<template>
    <div class="app">
        <link rel="stylesheet" 
        href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" 
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" 
        crossorigin="anonymous">
        <div class="navbar-container bg-primary-3" style="min-height:60px;">
            <nav class="navbar navbar-expand-lg navbar-dark scrolled" style="direction:rtl" data-sticky="top" v-if="this.$route.params.lang == 'ar'">
                <div class="container">
                    <router-link :to="`/${i18n.locale}`">
                        <a class="navbar-brand navbar-brand-dynamic-color">
                            <img alt="Steps" class="stepsLogo" width="127px" height="36px" :src="'assets/img/logos/stepsWhiteCopy.png'">
                        </a>
                    </router-link>
                    
                    <div class="d-flex align-items-center order-lg-3">
                        <button @click="hideMenuBar();" aria-expanded="false" aria-controls="navbarNav" aria-label="Toggle navigation" class="navbar-toggler" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                            <i class="fas fa-bars barsIconFahmy" style="color:#fff;"></i>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse order-3 order-lg-2 justify-content-lg-end" id="navigation-menu">
                        <ul class="navbar-nav my-3 my-lg-0">

                        <li class="nav-item">
                            <router-link :to="`/${i18n.locale}`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.Home') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                        <router-link :to="`/${i18n.locale}/#about-us`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.About Us') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                        <router-link :to="`/${i18n.locale}/#why-steps`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.Why Steps') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                        <router-link :to="`/${i18n.locale}/#benefit-steps`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.Benefits') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                        <router-link :to="`/${i18n.locale}/faq`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.FAQ') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link :to="`/${i18n.locale}/contact`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.Contact Us') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <div class="dropdown" style="direction:ltr;">
                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle nav-link nav-item arrow-bottom ml-4" data-toggle="dropdown-grid" href="#" role="button">{{ $t('Language') }}</a>
                                <div class="row dropdown-menu">
                                    <div class="col-auto" data-dropdown-content>
                                    <div class="dropdown-grid-menu">
                                        <a href="#" class="dropdown-item" @click.prevent="setLocale('ar')">{{ $t('Arabic') }}</a>
                                        <a href="#" class="dropdown-item" @click.prevent="setLocale('en')">{{ $t('English') }}</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </li>
            
                        </ul>
                    </div>
                </div>
            </nav>

            <nav class="navbar navbar-expand-lg navbar-dark scrolled" style="direction:ltr" data-sticky="top" v-else>
                <div class="container">
                    <router-link :to="`/${i18n.locale}`">
                        <a class="navbar-brand navbar-brand-dynamic-color">
                            <img alt="Steps" class="stepsLogo" width="127px" height="36px" :src="'assets/img/logos/stepsWhiteCopy.png'">
                        </a>
                    </router-link>
                    
                    <div class="d-flex align-items-center order-lg-3">
                        <button @click="hideMenuBar();" aria-expanded="false" aria-controls="navbarNav" aria-label="Toggle navigation" class="navbar-toggler" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                            <i class="fas fa-bars barsIconFahmy" style="color:#fff;"></i>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse order-3 order-lg-2 justify-content-lg-end" id="navigation-menu">
                        <ul class="navbar-nav my-3 my-lg-0">

                        <li class="nav-item">
                            <router-link :to="`/${i18n.locale}`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.Home') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                        <router-link :to="`/${i18n.locale}/#about-us`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.About Us') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                        <router-link :to="`/${i18n.locale}/#why-steps`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.Why Steps') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                        <router-link :to="`/${i18n.locale}/#benefit-steps`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.Benefits') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                        <router-link :to="`/${i18n.locale}/faq`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.FAQ') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link :to="`/${i18n.locale}/contact`" class="nav-item" exact>
                                <a class="nav-link nav-item">{{ $t('nav.Contact Us') }}</a>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <div class="dropdown">
                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle nav-link nav-item arrow-bottom ml-4" data-toggle="dropdown-grid" href="#" role="button">{{ $t('Language') }}</a>
                                <div class="row dropdown-menu">
                                    <div class="col-auto" data-dropdown-content>
                                    <div class="dropdown-grid-menu">
                                        <a href="#" class="dropdown-item" @click.prevent="setLocale('ar')">{{ $t('Arabic') }}</a>
                                        <a href="#" class="dropdown-item" @click.prevent="setLocale('en')">{{ $t('English') }}</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </li>
            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <router-view></router-view>

        <footer class="bg-primary-3 text-white links-white pb-4 footer-1" style="direction:rtl;" v-if="this.$route.params.lang == 'ar'">
            <div class="container" v-for="setting in settings" :key="setting.id">
                <div class="row">
                    <div class="col-xl-auto ml-xl-5 col-md-3">
                        <h5 class="text-right">{{ $t('footer.Pages') }}</h5>
                        <ul class="nav flex-row flex-md-column text-right pagesLinksRtl">
                        <li class="nav-item ml-2 mr-md-0">
                            <router-link :to="`/${i18n.locale}`">
                                <a class="nav-link px-0 py-2 homeContact1">{{ $t('footer.Home') }}</a>
                            </router-link>
                        </li>
                        <li class="nav-item ml-2 mr-md-0">
                            <router-link :to="`/${i18n.locale}/about`">
                                <a class="nav-link px-0 py-2 aboutContact1">{{ $t('footer.About Us') }}</a>
                            </router-link>
                        </li>
                        <li class="nav-item ml-2 mr-md-0">
                            <router-link :to="`/${i18n.locale}/contact`">
                                <a class="nav-link px-0 py-2 contactContact1">{{ $t('footer.Contact Us') }}</a>
                            </router-link>
                        </li>
                        <li class="nav-item ml-2 mr-md-0">
                            <router-link :to="`/${i18n.locale}/faq`">
                                <a class="nav-link px-0 py-2 faqContact1">{{ $t('footer.FAQ') }}</a>
                            </router-link>
                        </li>
                        </ul>
                    </div>
                    <div class="col mt-4 mt-md-0 mt-lg-5 mt-xl-0 order-lg-4 order-xl-3 contactsBigRtl">
                        <h5 class="text-right ml-5">{{ $t('footer.Contacts') }}</h5>
                        <ul class="list-unstyled d-flex flex-wrap ml-2 contactsLinksRtl">
                            <li class="col-12 col-lg-6 col-xl-12">
                                <div class="row my-1">
                                    <p class="emContactRtl">{{ $t('footer.Email') }}</p>
                                    <div class="col">
                                        <a class="h6 emailContactRtl" :href="'malito:'+setting.email">{{setting.email}}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="pLabelPhoneRtl">{{ $t('footer.Phone') }}</p>
                                    <div class="col">
                                        <a class="h6 phoneContactRtl" :href="'tel:'+setting.phone">{{setting.phone}}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="addContactRtl">{{ $t('footer.Address') }}</p>
                                    <div class="col">
                                        <p class="pConatctRtl">{{setting.address}}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg mt-2 mt-md-5 mt-lg-0 order-lg-3 order-xl-4">
                        <h5 class="text-right">{{ $t('footer.Newsletter') }}</h5>
                        <div class="card card-body bg-white">
                        <p class="text-right">{{ $t('footer.Get a bi-weekly') }}</p>
                            <form @submit.prevent="formSubmitAr">
                                <div class="d-flex flex-column flex-sm-row form-group">
                                    <input class="form-control mr-sm-2 mb-2 mb-sm-0 w-auto flex-grow-1" v-model="email" placeholder="البريد الإلكتروني" type="email">
                                    <button type="submit" class="btn btn-loading btnGoFooter">
                                        <span style="color:#fff;font-family:ap;">{{ $t('footer.Go') }}</span>
                                    </button>
                                </div>
                                <div class="invalid-feedback" v-if="errors.email" style="display:block;">{{ errors.email[0] }}</div>
                                <div class="text-small text-right text-muted">{{ $t('footer.We ll never share') }}</div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <hr>
                    </div>
                </div>

                <div class="row flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                    <div class="col-auto">
                        <div class="d-flex flex-column flex-sm-row align-items-center text-small">
                            <div class="muted">{{ $t('footer.All Rights') }}</div>
                        </div>
                    </div>
                    <div class="col-auto mt-3 mt-lg-0">
                        <ul class="list-unstyled d-flex mb-0">
                            <li class="mx-3">
                                <a :href="setting.twitter" class="hover-fade-out">
                                    <i class="fab fa-twitter icon icon-xs"></i>
                                </a>
                            </li>
                            <li class="mx-3">
                                <a :href="setting.facebook" class="hover-fade-out">
                                    <i class="fab fa-facebook icon icon-xs"></i>
                                </a>
                            </li>
                            <li class="mx-3">
                                <a :href="setting.instagram" class="hover-fade-out">
                                    <i class="fab fa-instagram icon icon-xs"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <footer class="bg-primary-3 text-white links-white pb-4 footer-1" style="direction:ltr;" v-else>
            <div class="container" v-for="setting in settings" :key="setting.id">
                <div class="row">
                    <div class="col-xl-auto mr-xl-5 col-md-3">
                        <h5>{{ $t('footer.Pages') }}</h5>
                        <ul class="nav flex-row flex-md-column">
                        <li class="nav-item mr-3 mr-md-0">
                            <router-link :to="`/${i18n.locale}`">
                                <a class="nav-link px-0 py-2">{{ $t('footer.Home') }}</a>
                            </router-link>
                        </li>
                        <li class="nav-item mr-3 mr-md-0">
                            <router-link :to="`/${i18n.locale}/about`">
                                <a class="nav-link px-0 py-2">{{ $t('footer.About Us') }}</a>
                            </router-link>
                        </li>
                        <li class="nav-item mr-3 mr-md-0">
                            <router-link :to="`/${i18n.locale}/contact`">
                                <a class="nav-link px-0 py-2">{{ $t('footer.Contact Us') }}</a>
                            </router-link>
                        </li>
                        <li class="nav-item mr-3 mr-md-0">
                            <router-link :to="`/${i18n.locale}/faq`">
                                <a class="nav-link px-0 py-2">{{ $t('footer.FAQ') }}</a>
                            </router-link>
                        </li>
                        </ul>
                    </div>
                    <div class="col mt-4 mt-md-0 mt-lg-5 mt-xl-0 order-lg-4 order-xl-3 contactsBigLtr">
                        <h5>{{ $t('footer.Contacts') }}</h5>
                        <ul class="list-unstyled d-flex flex-wrap contactsLinksLtr">
                            <li class="col-12 col-lg-6 col-xl-12">
                                <div class="row my-1">
                                    <p class="emContactLtr">{{ $t('footer.Email') }}</p>
                                    <div class="col">
                                        <a class="h6 emailContactLtr" :href="'malito:'+setting.email">{{setting.email}}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="pLabelPhoneLtr">{{ $t('footer.Phone') }}</p>
                                    <div class="col">
                                        <a class="h6 phoneContactLtr" :href="'tel:'+ setting.phone">{{setting.phone}}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="addContactLtr">{{ $t('footer.Address') }}</p>
                                    <div class="col">
                                        <p class="pConatctLtr">{{setting.address}}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg mt-2 mt-md-5 mt-lg-0 order-lg-3 order-xl-4">
                        <h5>{{ $t('footer.Newsletter') }}</h5>
                        <div class="card card-body bg-white">
                        <p>{{ $t('footer.Get a bi-weekly') }}</p>
                            <form @submit.prevent="formSubmitEn">
                                <div class="d-flex flex-column flex-sm-row form-group">
                                    <input class="form-control mr-sm-2 mb-2 mb-sm-0 w-auto flex-grow-1" v-model="email" placeholder="Email Address" type="email">
                                    <button type="submit" class="btn btn-loading" style="background-color:#6653ff;font-family:ap;">
                                        <span style="color:#fff;font-family:ap;">{{ $t('footer.Go') }}</span>
                                    </button>
                                </div>
                                <div class="invalid-feedback" v-if="errors.email" style="display:block;">{{ errors.email[0] }}</div>
                                <div class="text-small text-muted">{{ $t('footer.We ll never share') }}</div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <hr>
                    </div>
                </div>

                <div class="row flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                    <div class="col-auto">
                        <div class="d-flex flex-column flex-sm-row align-items-center text-small">
                            <div class="muted">{{ $t('footer.All Rights') }}</div>
                        </div>
                    </div>
                    <div class="col-auto mt-3 mt-lg-0">
                        <ul class="list-unstyled d-flex mb-0">
                            <li class="mx-3">
                                <a :href="setting.twitter" class="hover-fade-out">
                                    <i class="fab fa-twitter icon icon-xs"></i>
                                </a>
                            </li>
                            <li class="mx-3">
                                <a :href="setting.facebook" class="hover-fade-out">
                                    <i class="fab fa-facebook icon icon-xs"></i>
                                </a>
                            </li>
                            <li class="mx-3">
                                <a :href="setting.instagram" class="hover-fade-out">
                                    <i class="fab fa-instagram icon icon-xs"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <FlashMessage position="left bottom"></FlashMessage>
    </div>
</template>

<script>
import axios from 'axios';
import $ from 'jquery'
import i18n from "./I18n.js";
import * as news_service from "./services/news_service";
export default {
    name:"App",
    data: function(){
        return {
            i18n,
            langs: ['ar', 'en'],
            settings:[],
            errors:{},
            email:'',
        }
    },
    mounted(){
        axios
        .get('/api/settings')
        .then(response => (
            this.settings = response.data
        ))
    },
    methods:{
        scrollToTop() {
            window.scrollTo(0,0);
        },
        setLocale(locale){
            this.$i18n.locale = locale;
            this.$router.push({
                params: {lang: locale}
            })
        },
        hideMenuBar(){
            if($('#navigation-menu').is(':visible')){
                $('#navigation-menu').slideToggle('slow');
            }else{
                $('#navigation-menu').slideToggle('slow');
            }
        },
        formSubmitAr:async function(){
            let formData = new FormData();
            formData.append('email' , this.email);
            try{
                const response = await news_service.addNewNewsLetters(formData);
                this.email = "";
                this.errors = "";
                this.flashMessage.success({
                    message:"لقد تم تسجيل بريدك الإلكتروني بنجاح",
                    time:5000
                });
            }catch(error){
                switch (error.response.status) {
                    case 422:
                        this.errors = error.response.data.errors;
                        break;
                
                    default:
                        this.flashMessage.error({
                            message:"Some Error Occured",
                            time:5000
                        });
                        break;
                }
            }
        },
        formSubmitEn:async function(){
            let formData = new FormData();
            formData.append('email' , this.email);
            try{
                const response = await news_service.addNewNewsLetters(formData);
                this.email = "";
                this.errors = "";
                this.flashMessage.success({
                    message:"Your E-mail Stored Successfully",
                    time:5000
                });
            }catch(error){
                switch (error.response.status) {
                    case 422:
                        this.errors = error.response.data.errors;
                        break;
                
                    default:
                        this.flashMessage.error({
                            message:"Some Error Occured",
                            time:5000
                        });
                        break;
                }
            }
        },
    },
}

// $(window).on('scroll' , function(){
//     var value = $(this).scrollTop();
//     if(value > 100){
//         $('.barsIconFahmy').css('color' , '#000');
//         $('.dropdown-item').css('color' , '#a09999');
//     }else{
//         $('.barsIconFahmy').css('color' , '#fff');
//         $('.dropdown-item').css('color' , '#a09999');
//     }
// });

  

$(document).scroll(function () {
    var $nav = $(".navbar-expand-lg");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
});
</script>
<style >
    ._vue-flash-msg-body._vue-flash-msg-body_success{
        z-index:9999;
    }
    ._vue-flash-msg-body._vue-flash-msg-_left-bottom, ._vue-flash-msg-body._vue-flash-msg-_left-top{
        z-index:9999;
    }
</style>
<style scoped>
    .pagesLinksRtl{
        position:relative;
        right:-35px;
        top:0px;
    }
    .contactsLinksRtl{
        position:relative;
        right:-35px;
        top:0px;
    }
    .btnGoFooter{
        background-color:#6653ff;
        font-family:ap;
        position:relative;
        right:5px;
    }
    .navbar-dark .navbar-nav .nav-link{
        color:#fff;
    }
    .navbar-dark .navbar-nav .show > .nav-link, .navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .nav-link.active{
        color:#6653ff;
    }
    .navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus{
        color:#6653ff;
    }
    .navbar-expand-lg.scrolled {
        background-color: #301b72 !important;
        transition: background-color 200ms linear;
    }
    .navbar.scrolled.navbar-dark .navbar-nav .nav-link:hover, .navbar.navbar-toggled-show.navbar-dark .navbar-nav .nav-link:focus{
        color:#6653ff;
    }
    .navbar.scrolled.navbar-dark .navbar-nav .nav-link, .navbar.navbar-toggled-show.navbar-dark .navbar-nav .nav-link{
        color:#fff;
    }
    .navbar.scrolled.navbar-dark .navbar-nav .show > .nav-link, .navbar.scrolled.navbar-dark .navbar-nav .active > .nav-link, .navbar.scrolled.navbar-dark .navbar-nav .nav-link.show, .navbar.scrolled.navbar-dark .navbar-nav .nav-link.active{
        color:#6653ff;
    }
    .dropdown{
        position: relative;
        top:-7px;
    }
    .dropdown-menu.row.show{
        /* display:flex; */
        width:100px;
    }
    @media (min-width:1200px){
        .dropdown{
            position: relative;
            top:-10px;
        }
    }
    @media screen and (min-width:1024px) and (max-width:1199px) {
        .dropdown{
            position: relative;
            top:-10px;
        }
        .contactsBigRtl{
            position:relative;
            right:0px;
            margin-top:0px !important;
        }
        .pConatctRtl{
            position: relative;
            right:0px;
            top:0px;
            width:200px;
        }
        .emailContactRtl{
            position:relative;
            right:-15px;
            top:-4px;
        }
        .phoneContactRtl{
            position: relative;
            right:15px;
            top:0px;
        }
        .pLabelPhoneRtl{
            position:relative;
            right:30px;
            top:0px;
        }

        .contactsBigLtr{
            position:relative;
            right:0px;
            margin-top:0px !important;
        }
        .pConatctLtr{
            position: relative;
            right:0px;
            top:0px;
            width:200px;
        }
        .emailContactLtr{
            position:relative;
            right:15px;
            top:-4px;
        }
        .phoneContactLtr{
            position: relative;
            right:-15px;
            top:0px;
        }
        .pLabelPhoneLtr{
            position:relative;
            right:-30px;
            top:0px;
        }
    }
    @media (max-width: 500px){
        .dropdown-item{
            color:#a09999;
        }
        .btnGoFooter{
            position:relative;
            right:0px;
        }
        .pagesLinksRtl{
            position:relative;
            right:-10px;
            top:0px;
        }
        .contactsLinksRtl{
            position:relative;
            right:-10px;
            top:0px;
        }
        .addContactRtl{
            position:relative;
            right:-25px;
            top:0px;
        }
        .pLabelPhoneRtl{
            position:relative;
            right:-25px;
            top:0px;
        }
        .emContactRtl{
            position:relative;
            right:-25px;
            top:0px;
        }
        .faqContact1{
            position:relative;
            right:-25px;
            top:0px;
        }
        .homeContact1{
            position:relative;
            right:-25px;
            top:0px;
        }
        .contactContact1{
            position:relative;
            right:-25px;
            top:0px;
        }
        .aboutContact1{
            position:relative;
            right:-25px;
            top:0px;
        }
    }
</style>