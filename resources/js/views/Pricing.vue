<template>
    <div class="pricing">
        <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous">

        <section class="pt-5" style="padding-bottom:20px;">
            <div class="container">
                <div class="mt-5" id="pricing" style="direction:rtl;" v-if="this.$route.params.lang == 'ar'">
                    <div class="pricing-table-section text-center text-lg-left">
                        <div class="row no-gutters border rounded fahmy-top justify-content-end bg-white">
                            <div class="col">
                                <h5 class="mb-4 premCssAr">{{ $t('Pricing.Steps System Features') }}</h5>
                            </div>
                            <div class="col text-center">
                                <h4 class="mb-4 dataCss">

                                </h4>
                            </div>
                            <div class="col text-center">
                                <a @click="scrollMeTo('subscribe')" class="btn mb-4 hrefCssAr">
                                    <span style="color:#fff;">{{ $t('header.Subscribe Now') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="border rounded">
                            <div class="row no-gutters align-items-center" v-for="serv in services" :key="serv.id">
                                <div class="col-12 col-lg-3  py-3 py-md-4">
                                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                                        <h6 class="mb-0 ml-lg-4 dataAr">{{ serv.service_ar }}</h6>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-3 d-flex justify-content-center py-3 py-md-4">

                                </div>
                                <div class="col-4 col-lg-3 d-flex justify-content-center py-3 py-md-4">

                                </div>
                                <div class="col-4 col-lg-3 d-flex justify-content-center py-3 py-md-4">
                                    <div class="rounded-circle" style="background-color:#6653ff;width:32px;height:32px;">
                                        <i class="fas fa-check" style="color:#fff;margin:8px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5" id="pricing" style="direction:ltr" v-else>
                    <div class="pricing-table-section text-center text-lg-left">
                        <div class="row no-gutters border rounded fahmy-top justify-content-end bg-white">
                            <div class="col">
                                <h5 class="mb-4 premCss" style="color:#6653ff;font-family:abo;">{{ $t('Pricing.Steps System Features') }}</h5>
                            </div>
                            <div class="col text-center">
                                <h4 class="mb-4 dataCss">

                                </h4>
                            </div>
                            <div class="col text-center">
                                <a @click="scrollMeTo('subscribe')" class="btn mb-4 hrefCss">
                                    <span style="color:#fff;">{{ $t('header.Subscribe Now') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="border rounded">
                            <div class="row no-gutters align-items-center" v-for="serv in services" :key="serv.id">
                                <div class="col-12 col-lg-3  py-3 py-md-4">
                                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                                        <h6 class="mb-0 ml-lg-4" style="color:#6653ff;font-family:ap;">{{ serv.service_en }}</h6>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-3 d-flex justify-content-center py-3 py-md-4">

                                </div>
                                <div class="col-4 col-lg-3 d-flex justify-content-center py-3 py-md-4">

                                </div>
                                <div class="col-4 col-lg-3 d-flex justify-content-center py-3 py-md-4">
                                    <div class="rounded-circle" style="background-color:#6653ff;width:32px;height:32px;">
                                        <i class="fas fa-check" style="color:#fff;margin:8px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-2" ref="subscribe" id="subscribe"></div>
            </div>
        </section>

        <section class="pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="display-4 text-center" style="color:#6653ff;font-family:abo;font-size:40px;">{{ $t('Pricing.Subscribe Now!') }}</h3>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="250" v-if="this.$route.params.lang == 'ar'">
                    <div class="col-md-10" data-aos-delay="250">
                        <div class="card card-body subscribesPricing">
                            <form class="formSubscribe" @submit.prevent="formSubmitAr">
                                <div class="row">
                                    <div class="col-md-12 mb-3 text-right">
                                        <label>{{ $t('Store Name') }}</label>
                                        <input v-model="store_name" type="text" class="form-control text-right" placeholder="اكتب هنا">
                                        <div class="invalid-feedback" v-if="errors.store_name" style="display:block;">{{ errors.store_name[0] }}</div>
                                    </div>
                                    <div class="col-md-12 mb-3 text-right">
                                        <label>{{ $t('Store Link') }}</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">steps-sa.co/</span>
                                            </div>
                                            <input v-model="store_link" type="text" class="form-control" placeholder="اكتب هنا">
                                            <small class="form-text text-right text-muted w-100" >{{ $t('It will be the link') }}</small>
                                            <div class="invalid-feedback" v-if="errors.store_link" style="display:block;">{{ errors.store_link[0] }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3 text-right">
                                        <label>{{ $t('Company') }}</label>
                                        <div class="position-relative">
                                            <select v-model="company_kind" class="custom-select" dir="rtl">
                                                <option selected value="">{{ $t('Pricing.Select an option') }}</option>
                                                <option value="مؤسسة">مؤسسة</option>
                                                <option value="شركة">شركة</option>
                                            </select>
                                            <div class="invalid-feedback" v-if="errors.company_kind" style="display:block;">{{ errors.company_kind[0] }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3 text-right">
                                        <label>{{ $t('Manager') }}</label>
                                        <input v-model="manager" type="text" class="form-control text-right" placeholder="اكتب هنا">
                                        <div class="invalid-feedback" v-if="errors.manager" style="display:block;">{{ errors.manager[0] }}</div>
                                    </div>
                                    <div class="col-md-6 mb-3 text-right">
                                        <label>{{ $t('Phone') }}</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+966</span>
                                            </div>
                                            <input v-model="phone" type="number" class="form-control" placeholder="اكتب هنا">
                                            <div class="invalid-feedback" v-if="errors.phone" style="display:block;">{{ errors.phone[0] }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3 text-right">
                                        <label>{{ $t('E-mail') }}</label>
                                        <input v-model="email" type="email" class="form-control text-right" placeholder="you@yoursite.com">
                                        <div class="invalid-feedback" v-if="errors.email" style="display:block;">{{ errors.email[0] }}</div>
                                    </div>
                                    <div class="col-md-6 mb-3 text-right">
                                        <label>{{ $t('Password') }}</label>
                                        <input v-model="password" type="password" class="form-control text-right" placeholder="اكتب هنا">
                                        <div class="invalid-feedback" v-if="errors.password" style="display:block;">{{ errors.password[0] }}</div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <p>بالتسجيل فإني قرأت وأوافق على <router-link :to="`/${i18n.locale}/terms`" target="_blank" exact>
                                            <a>اتفاقية الاستخدام</a>
                                        </router-link>
                                        و
                                        <router-link :to="`/${i18n.locale}/policy`" target="_blank" exact>
                                            <a>سياسة الخصوصية</a>
                                        </router-link>
                                         على منصة ستيبس</p>
                                    </div>
                                </div>
                                <button class="btn btn-block btn-loading buttonSubscribeLtr" type="submit" data-loading-text="Requesting Demo">
                                    <span style="color:#fff;">{{ $t('Pricing.Subscribe') }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="250" v-else>
                    <div class="col-md-10" data-aos-delay="250">
                        <div class="card card-body subscribesPricingLtr">
                            <form class="formSubscribeLtr" @submit.prevent="formSubmitEn">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>{{ $t('Store Name') }}</label>
                                        <input type="text" v-model="store_name" class="form-control" placeholder="Type Here">
                                        <div class="invalid-feedback" v-if="errors.store_name" style="display:block;">{{ errors.store_name[0] }}</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>{{ $t('Store Link') }}</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">steps-sa.co/</span>
                                            </div>
                                            <input type="text" v-model="store_link" class="form-control" placeholder="Type Here">
                                            <small class="form-text text-muted w-100" >{{ $t('It will be the link') }}</small>
                                            <div class="invalid-feedback" v-if="errors.store_link" style="display:block;">{{ errors.store_link[0] }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>{{ $t('Company') }}</label>
                                        <div class="position-relative">
                                            <select class="custom-select" v-model="company_kind">
                                                <option selected value="">{{ $t('Pricing.Select an option') }}</option>
                                                <option value="Institution">Institution</option>
                                                <option value="Company">Company</option>
                                            </select>
                                            <div class="invalid-feedback" v-if="errors.company_kind" style="display:block;">{{ errors.company_kind[0] }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>{{ $t('Manager') }}</label>
                                        <input type="text" v-model="manager" class="form-control" placeholder="Type Here">
                                        <div class="invalid-feedback" v-if="errors.manager" style="display:block;">{{ errors.manager[0] }}</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>{{ $t('Phone') }}</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+966</span>
                                            </div>
                                            <input type="number" v-model="phone" class="form-control" placeholder="Type Here">
                                            <div class="invalid-feedback" v-if="errors.phone" style="display:block;">{{ errors.phone[0] }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>{{ $t('E-mail') }}</label>
                                        <input v-model="email" type="email" class="form-control" placeholder="you@yoursite.com">
                                        <div class="invalid-feedback" v-if="errors.email" style="display:block;">{{ errors.email[0] }}</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>{{ $t('Password') }}</label>
                                        <input type="password" v-model="password" class="form-control" placeholder="Type Here">
                                        <div class="invalid-feedback" v-if="errors.password" style="display:block;">{{ errors.password[0] }}</div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>By registering, I have read and agree to<router-link :to="`/${i18n.locale}/terms`" target="_blank" exact>
                                            <a> Usage Agreement </a>
                                        </router-link>
                                        and
                                        <router-link :to="`/${i18n.locale}/policy`" target="_blank" exact>
                                            <a> privacy policy </a>
                                        </router-link>
                                        on the Steps platform</p>
                                    </div>
                                </div>
                                <button class="btn btn-block btn-loading buttonSubscribeLtr" type="submit" data-loading-text="Requesting Demo">
                                    <span style="color:#fff;">{{ $t('Pricing.Subscribe') }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</template>

<script>
import swal from 'sweetalert2';
window.Swal = swal;
import $ from 'jquery';
import axios from 'axios';
import * as price_service from "../services/price_service";
import i18n from "../I18n.js";
export default {
    name:"Pricing",
    data: function(){
        return {
            i18n,
            services:[],
            store_name:'',
            store_link:'',
            company_kind:'',
            manager:'',
            phone:'',
            email:'',
            password:'',
            errors:{},
        }
    },
    mounted(){
        this.getServicesFromPackage();
    },
    methods:{
        scrollMeTo(refName) {
            var element = this.$refs[refName];
            var top = element.offsetTop;

            element.scrollIntoView({behavior: 'smooth'});
            // window.scrollTo(0, top);
        },
        getServicesFromPackage:async function(){
            try{
                const response = await price_service.getServicesFromPackage();
                this.services = response.data;
            }catch(error){
                console.log(error);
            }
        },
        formSubmitAr:async function(){
            let formData = new FormData();

            formData.append('store_name' , this.store_name);
            formData.append('store_link' , this.store_link);
            formData.append('company_kind' , this.company_kind);
            formData.append('manager' , this.manager);
            formData.append('phone' , this.phone);
            formData.append('email' , this.email);
            formData.append('password' , this.password);

            try{
                const response = await price_service.StoreSubscriptions(formData);
                this.store_name = "";
                this.store_link = "";
                this.company_kind = "";
                this.manager = "";
                this.phone = "";
                this.email = "";
                this.password = "";
                this.errors = "";
                Swal.fire({
                    title: 'لقد تم اشتراكك بنجاح !',
                    confirmButtonText: 'تم',
                    icon: 'success'
                });
            }catch(error){
                console.log(error);
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

            formData.append('store_name' , this.store_name);
            formData.append('store_link' , this.store_link);
            formData.append('company_kind' , this.company_kind);
            formData.append('manager' , this.manager);
            formData.append('phone' , this.phone);
            formData.append('email' , this.email);
            formData.append('password' , this.password);

            try{
                const response = await price_service.StoreSubscriptions(formData);
                this.store_name = "";
                this.store_link = "";
                this.company_kind = "";
                this.manager = "";
                this.phone = "";
                this.email = "";
                this.password = "";
                this.errors = "";
                Swal.fire({
                    title: 'لقد تم اشتراكك بنجاح !',
                    confirmButtonText: 'تم',
                    icon: 'success'
                });
            }catch(error){
                // console.log(error);
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
        }
    },
}
</script>

<style scoped>
.swal2-shown {
    overflow: unset !important;
    padding-right: 0px !important;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.subscribesPricing{
    position:relative;
    right:-90px;
    -webkit-box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
    -moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.15);
    box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
}
.formSubscribe{
    padding:40px;
}
.buttonSubscribe{
    background-color:#6653ff;
    font-family:ap;
    height:60px;
    border-radius:26px;
    height:45px;
    width:500px;
    position:relative;
    right:-130px;
}
.subscribesPricingLtr{
    position:relative;
    right:-90px;
    -webkit-box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
    -moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.15);
    box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
}
.formSubscribeLtr{
    padding:40px;
}
.buttonSubscribeLtr{
    background-color:#6653ff;
    font-family:ap;
    height:60px;
    border-radius:26px;
    height:45px;
    width:500px;
    position:relative;
    right:-150px;
}
.dataAr{
    color: rgb(102, 83, 255);
    font-family: ap;
    position: relative;
    right: 80px;
}
.premCss{
    position:relative;
    top:20px;
    right:-25px;
}

.premCssAr{
    color: #6653ff;
    font-family: abo;
    position: relative;
    right: -120px;
    top: 20px;
}

.hrefCss{
    position:relative;
    top:10px;
    right:-40px;
    background-color:#6653ff;
    color:#fff;
    font-family:ap;
    border-radius:20px;
    height:40px;
}
.hrefCssAr{
    position:relative;
    top:10px;
    right:40px;
    background-color:#6653ff;
    color:#fff;
    font-family:ap;
    border-radius:20px;
    height:40px;
}

.dataCss{
    position:relative;
    top:25px;
    right:0px;
}
.fahmy-top{
    position: sticky;
    top: 71px;
    z-index: 1020;
}

.main {
    display: block;
    position: relative;
    padding-left: 45px;
    margin-bottom: 15px;
    cursor: pointer;
    /* font-size: 20px; */
}

input[type=checkbox] {
    visibility: hidden;
}

.geekmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

.main:hover input ~ .geekmark {
    background-color: #eee;
}

.main input:active ~ .geekmark {
    background-color: #6653ff;
}

.main input:checked ~ .geekmark {
    background-color: #6653ff;
}

.geekmark:after {
    content: "";
    position: absolute;
    display: none;
}

.main input:checked ~ .geekmark:after {
    display: block;
}

.main .geekmark:after {
    left: 8px;
    bottom: 5px;
    width: 6px;
    height: 12px;
    border: solid white;
    border-width: 0 4px 4px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}


/* arabic */

.mainAr {
    display: block;
    position: relative;
    padding-right: 45px;
    margin-bottom: 15px;
    cursor: pointer;
    /* font-size: 20px; */
}

input[type=checkbox] {
    visibility: hidden;
}

.geekmarkAr {
    position: absolute;
    top: 0;
    left: 770px;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

.mainAr:hover input ~ .geekmarkAr {
    background-color: #eee;
}

.mainAr input:active ~ .geekmarkAr {
    background-color: #6653ff;
}

.mainAr input:checked ~ .geekmarkAr {
    background-color: #6653ff;
}

.geekmarkAr:after {
    content: "";
    position: absolute;
    display: none;
}

.mainAr input:checked ~ .geekmarkAr:after {
    display: block;
}

.mainAr .geekmarkAr:after {
    left: 8px;
    bottom: 7px;
    width: 6px;
    height: 12px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

@media screen and (min-width: 1025px) and (max-width: 1340px){
    .premCssAr{
        position:relative;
        right:-40px;
    }
    .dataAr{
        position: relative;
        right:165px;
    }
    .subscribesPricing{
        position:relative;
        right:-90px;
    }
    .buttonSubscribe{
        position:relative;
        right:-130px;
    }
    .subscribesPricingLtr{
        position:relative;
        right:-90px;
    }
    .buttonSubscribeLtr{
        position:relative;
        right:-150px;
    }
    .geekmarkAr{
        left:770px;
    }
}

@media only screen and (width : 1024px){
    .hrefCssAr{
        position:relative;
        right:40px;
    }
    .hrefCss{
        position:relative;
        right:-40px;
    }
    .premCssAr{
        position:relative;
        right:-45px;
    }
    .dataAr{
        position:relative;
        right:100px;
    }
    .subscribesPricing{
        position:relative;
        right:-70px;
    }
    .buttonSubscribe{
        position:relative;
        right:-70px;
    }
    .subscribesPricingLtr{
        position:relative;
        right:-70px;
    }
    .buttonSubscribeLtr{
        position:relative;
        right:-70px;
    }
    .geekmarkAr{
        left:620px;
    }
}

@media screen and (min-width:768px) and (max-width:1000px) {
    .hrefCssAr{
        position:relative;
        right:0px;
    }
    .hrefCss{
        position:relative;
        right:0px;
    }
    .premCssAr{
        position:relative;
        right:0px;
    }
    .dataAr{
        position:relative;
        right:0px;
    }
    .subscribesPricing{
        position:relative;
        right:-60px;
    }
    .buttonSubscribe{
        position:relative;
        right:-30px;
        width:400px;
    }
    .subscribesPricingLtr{
        position:relative;
        right:-60px;
    }
    .buttonSubscribeLtr{
        position:relative;
        right:-30px;
        width:400px;
    }
    .geekmarkAr{
        left:420px;
    }
}

@media (max-width: 500px){
.premCss{
    position:relative;
    right:0px;
}

.premCssAr{
    color: #6653ff;
    font-family: abo;
    position: relative;
    right: 0px;
    top: 20px;
}

.hrefCss{
    position:relative;
    right:10px;
    top:25px;
}

.hrefCssAr{
    position: relative;
    right: -7px;
    height: 40px;
    top: 20px;
    width: 110px;
}

.dataCss{
    position:relative;
    right:0px;
}

.dataAr{
    position:relative;
    right:0px;
}
.subscribesPricing{
    position:relative;
    right:0px;
}
.buttonSubscribe{
    position:relative;
    width:250px;
    right:15px;
}
.subscribesPricingLtr{
    position:relative;
    right:0px;
}
.buttonSubscribeLtr{
    position:relative;
    width:250px;
    right:15px;
}
.main{
    font-size: 12px;
}
.mainAr{
    font-size: 12px;
}
.geekmarkAr{
    left:200px;
}
.fahmy-top{
    top:62px;
}
}

@media only screen and (width: 414px){
    .buttonSubscribe{
        position:relative;
        width:300px;
        right:20px;
    }
    .buttonSubscribeLtr{
        position:relative;
        width:300px;
        right:20px;
    }
    .main{
        font-size: 15px;
    }
    .mainAr{
        font-size: 15px;
    }
    .geekmarkAr{
        left:240px;
    }
    .hrefCss{
        right: 3px;
        top: 20px;
    }
    .hrefCssAr{
        position: relative;
        right: 0px;
        height: 40px;
        top: 20px;
        width: 110px;
    }
}
@media only screen and (width: 411px){
    .geekmarkAr{
        left:230px;
    }
    .hrefCssAr{
        position: relative;
        right: 0px;
        height: 40px;
        top: 20px;
        width: 110px;
    }
}
@media only screen and (width: 360px){
    .main{
        font-size: 12px;
    }
    .mainAr{
        font-size: 12px;
    }
    .geekmarkAr{
        left:180px;
    }
    .hrefCss{
        right: 8px;
        top: 28px;
        height: 60px;
    }
}

@media only screen and (width: 320px){
    .buttonSubscribe{
        position:relative;
        width:220px;
        right:25px;
    }
    .buttonSubscribeLtr{
        position:relative;
        width:220px;
        right:25px;
    }
    .main{
        font-size: 8px;
    }
    .mainAr{
        font-size: 8px;
    }
    .geekmarkAr{
        left:140px;
    }
    .hrefCss{
        right: 6px;
        top: 27px;
        height: 60px;
    }
    .hrefCssAr{
        width:100px;
        top:40px;
    }
}

</style>
