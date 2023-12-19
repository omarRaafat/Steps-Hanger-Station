<template>
    <div class="terms">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-5">
                    <div class="card p-5" v-if="this.$route.params.lang == 'ar'">
                        <div class="card-body" v-for="term in terms" :key="term.id">
                            <p style="direction:rtl;text-align:justify;line-height:2;" v-html="term.term_ar"></p>
                        </div>
                    </div>
                    <div class="card p-5" v-else>
                        <div class="card-body" v-for="term in terms" :key="term.id">
                            <p style="direction:ltr;text-align:justify;line-height:2;" v-html="term.term_en"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $ from 'jquery';
import axios from 'axios';
import i18n from "../I18n.js";
import * as home_service from "../services/home_service";
export default {
    name:"Term",
    data: function(){
        return {
            terms:[]
        }
    },
    mounted(){
      this.getTerms();
    },
    methods: {
        getTerms: async function(){
            try{
                const response = await home_service.getTerms();
                this.terms = response.data;
            }catch(error){
                console.log(error);
            }
        }
    }
}
</script>