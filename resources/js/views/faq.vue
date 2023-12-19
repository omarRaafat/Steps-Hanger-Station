<template>
    <div class="faq">
        <section id="faq" style="direction:rtl;padding-top:50px !important;padding-bottom:50px !important;" v-if="this.$route.params.lang == 'ar'">
            <div class="container">
                <div class="row section-title justify-content-center text-center">
                    <div class="col-md-9 col-lg-8 col-xl-7">
                        <h3 class="display-4" style="color:#6653ff;font-family:ap;">{{ $t('faq.FAQ') }}</h3>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div id="faq-accordion">
                            <div class="card mb-2 mb-md-3" v-for="faq in faqs" :key="faq.id">
                                <a @click="hideThisShit(faq.id);" :href="'#accordion-'+faq.id" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 mr-2" style="color:#6653ff;font-family:abo;">{{ faq.question_ar }}</h6>
                                    <img :src="'assets/img/icons/interface/icon-caret-right.svg'" alt="Caret Right" class="icon icon-sm" style="color:#6653ff;font-family:ap;">
                                </div>
                                </a>
                                <div :class="'collapse accordion-'+faq.id" :id="'accordion-'+faq.id" data-parent="#faq-accordion">
                                <div class="px-3 px-md-4 pb-3 pb-md-4">
                                    {{ faq.answer_ar }}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="faq" style="direction:ltr;padding-top:50px !important;padding-bottom:50px !important;" v-else>
            <div class="container">
                <div class="row section-title justify-content-center text-center">
                    <div class="col-md-9 col-lg-8 col-xl-7">
                        <h3 class="display-4" style="color:#6653ff;font-family:ap;">{{ $t('faq.FAQ') }}</h3>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div id="faq-accordion">
                            <div class="card mb-2 mb-md-3" v-for="faq in faqs" :key="faq.id">
                                <a @click="hideThisShit(faq.id);" :href="'#accordion-'+faq.id" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 mr-2" style="color:#6653ff;font-family:abo;">{{ faq.question_en }}</h6>
                                    <img :src="'assets/img/icons/interface/icon-caret-right.svg'" alt="Caret Right" class="icon icon-sm" style="color:#6653ff;font-family:ap;">
                                </div>
                                </a>
                                <div :class="'collapse accordion-'+faq.id" :id="'accordion-'+faq.id" data-parent="#faq-accordion">
                                <div class="px-3 px-md-4 pb-3 pb-md-4">
                                    {{ faq.answer_en }}
                                </div>
                                </div>
                            </div>
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
export default {
    name:"FAQ",
    data: function(){
        return {
            faqs:[],
        }
    },
    mounted(){
        axios
        .get('/api/faq')
        .then(response => (
            this.faqs = response.data
        ))
    },
    methods: {
        hideThisShit(id){
            $(this).siblings('.accordion-'+id).slideDown();
            $(this).siblings('.accordion-'+id).slideToggle();
        },
    }
}
</script>
