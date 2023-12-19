<template>
    <div class="contact">
        <div class="bg-gradient p-0 o-hidden" data-overlay>
            <section class="pb-0">
                <div class="container">
                <div class="text-white">
                    <div class="row section-title justify-content-center text-center">
                    <div class="col-md-9 col-lg-8 col-xl-7">
                        <h1 class="display-3">{{ $t('contact.We’re here') }}</h1>
                    </div>
                    </div>
                </div>

                <div class="row justify-content-center" v-if="this.$route.params.lang == 'ar'">
                    <div class="col-xl-8 col-lg-9 col-md-11">
                        <form class="card card-body shadowCardRtl" @submit.prevent="formSubmitAr">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="form-group text-right">
                                    <label>{{ $t('contact.Name') }}</label>
                                        <input type="text" v-model="name" class="form-control text-right" placeholder="اكتب هنا">
                                        <div class="invalid-feedback" v-if="errors.name" style="display:block;">{{ errors.name[0] }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group text-right">
                                    <label>{{ $t('contact.Email Address') }}</label>
                                        <input type="email" v-model="email" class="form-control text-right" placeholder="you@website.com">
                                        <div class="invalid-feedback" v-if="errors.email" style="display:block;">{{ errors.email[0] }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="form-group text-right">
                                    <label>{{ $t('contact.Phone (optional)') }}</label>
                                        <input type="tel" v-model="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group text-right">
                                    <label>{{ $t('contact.Address') }}</label>
                                        <div class="position-relative">
                                            <input type="text" v-model="address" class="form-control text-right" placeholder="العنوان">
                                            <div class="invalid-feedback" v-if="errors.address" style="display:block;">{{ errors.address[0] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group text-right">
                                <label>{{ $t('contact.How can we help') }}</label>
                                <textarea v-model="help" rows="5" class="form-control text-right" style="resize:none;"></textarea>
                                <div class="invalid-feedback" v-if="errors.help" style="display:block;">{{ errors.help[0] }}</div>
                            </div>
                            <div class="d-flex flex-column flex-wrap flex-md-row justify-content-center">
                                <button class="btn btn-loading btnSubmitMessage" type="submit">
                                    <span style="color:#fff;font-family:ap;">{{ $t('contact.Send Message') }}</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row justify-content-center" v-else>
                    <div class="col-xl-8 col-lg-9 col-md-11">
                        <form class="card card-body shadowCardLtr" @submit.prevent="formSubmitEn">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label>{{ $t('contact.Name') }}</label>
                                        <input type="text" v-model="name" class="form-control" placeholder="Type Here">
                                        <div class="invalid-feedback" v-if="errors.name" style="display:block;">{{ errors.name[0] }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ $t('contact.Email Address') }}</label>
                                        <input type="email" v-model="email" class="form-control" placeholder="you@website.com">
                                        <div class="invalid-feedback" v-if="errors.email" style="display:block;">{{ errors.email[0] }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ $t('contact.Phone (optional)') }}</label>
                                        <input type="tel" v-model="phone" class="form-control">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>{{ $t('contact.Address') }}</label>
                                    <div class="position-relative">
                                        <input type="text" v-model="address" class="form-control" placeholder="Address">
                                        <div class="invalid-feedback" v-if="errors.address" style="display:block;">{{ errors.address[0] }}</div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                            <div class="form-group">
                                <label>{{ $t('contact.How can we help') }}</label>
                                <textarea v-model="help" rows="5" class="form-control" style="resize:none;"></textarea>
                                <div class="invalid-feedback" v-if="errors.help" style="display:block;">{{ errors.help[0] }}</div>
                            </div>
                            <div class="d-flex flex-column flex-wrap flex-md-row justify-content-center">
                                <button class="btn btn-loading btnSubmitMessage" type="submit">
                                    <span style="color:#fff;font-family:ap;">{{ $t('contact.Send Message') }}</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                </div>
                <div class="divider divider-bottom bg-white"></div>
            </section>
        </div>
        <section>
            <div class="container">
                <div class="row justify-content-center text-center" v-for="setting in settings" :key="setting.id">
                <div class="col-md-auto" data-aos="fade-up">
                    <div class="px-md-4 px-lg-5 mb-5 mb-md-0">
                    <h5>{{ $t('contact.Email us') }}</h5>
                    <a :href="'malito:'+setting.email" class="lead" style="font-family:ap;color:#301b72;">{{ setting.email }}</a>
                    </div>
                </div>
                <div class="col-md-auto" data-aos="fade-up" data-aos-delay="100">
                    <div class="px-md-4 px-lg-5 mb-5 mb-md-0">
                    <h5>{{ $t('contact.Drop in') }}</h5>
                    <address>
                        <p style="color:#301b72;font-family:abo;">{{ setting.address }}</p>

                    </address>
                    </div>
                </div>
                <div class="col-md-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="px-md-4 px-lg-5 mb-5 mb-md-0">
                    <h5>{{ $t('contact.Call any time') }}</h5>
                    <a :href="'tel:'+setting.phone" class="lead" style="font-family:ap;color:#301b72;">{{ setting.phone }}</a>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import $ from 'jquery';
import axios from 'axios';
import * as contact_service from "../services/contact_service";
export default {
    name:"Contact",
    data: function(){
        return{
            settings:[],
            name:'',
            email:'',
            phone:'',
            address:'',
            help:'',
            errors:{},
        }
    },
    mounted(){
        axios
        .get('/api/settings')
        .then(response => (
            this.settings = response.data
        ))
    },methods:{
        formSubmitAr:async function(){
            let formData = new FormData();
            formData.append('name' , this.name);
            formData.append('email' , this.email);
            formData.append('phone' , this.phone);
            formData.append('address' , this.address);
            formData.append('help' , this.help);
            try{
                const response = await contact_service.addNewContact(formData);
                this.name = "";
                this.email = "";
                this.phone = "";
                this.address = "";
                this.help = "";
                this.errors = "";
                this.flashMessage.success({
                    message:"لقد تم حفظ استفسارك بنجاح",
                    time:5000
                });
            }catch(error){
                // console.log(error.response.status);
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
            formData.append('name' , this.name);
            formData.append('email' , this.email);
            formData.append('phone' , this.phone);
            formData.append('address' , this.address);
            formData.append('help' , this.help);
            try{
                const response = await contact_service.addNewContact(formData);
                this.name = "";
                this.email = "";
                this.phone = "";
                this.address = "";
                this.help = "";
                this.errors = "";
                this.flashMessage.success({
                    message:"Your Question Stored Successfylly",
                    time:5000
                });
            }catch(error){
                // console.log(error.response.status);
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
    .shadowCardRtl{
        padding:60px;
        -webkit-box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.15);
        box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
    }
    .shadowCardLtr{
        padding:60px;
        -webkit-box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.15);
        box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
    }
    .btnSubmitMessage{
        background-color:#6653ff;
        width:200px;
        height:55px;
        border-radius:26px;
    }
    @media (max-width: 500px){
        .btnSubmitMessage{
            position:relative;
            right:-15px;
        }
    }
    @media only screen and (width: 414px){
        .btnSubmitMessage{
            position:relative;
            right:-30px;
        }
    }
    @media only screen and (width: 411px){
        .btnSubmitMessage{
            position:relative;
            right:-30px;
        }
    }
    @media only screen and (width: 360px){
        .btnSubmitMessage{
            position:relative;
            right:-10px;
        }
    }
    @media only screen and (width: 320px){
        .btnSubmitMessage{
            position:relative;
            width:150px;
            right:-10px;
        }
    }
   
</style>