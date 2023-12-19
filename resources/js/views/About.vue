<template>
    <div class="About">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="display-3 text-center" style="color:#6653ff;direction:rtl;" v-if="this.$route.params.lang == 'ar'">{{ $t('about.What') }}</h3>
                        <h3 class="display-3 text-center" style="color:#6653ff;direction:ltr" v-else>{{ $t('about.What') }}</h3>
                    </div>
                </div>
                <br>
                <div class="row" v-if="this.$route.params.lang == 'ar'">
                    <div class="col-md-12" v-for="setting in settings" :key="setting.id">
                        <p style="text-align:justify;line-height:2;direction:rtl;">
                            {{ setting.about_us_ar }}
                        </p>
                    </div>
                </div>
                <div class="row" v-else>
                    <div class="col-md-12" v-for="setting in settings" :key="setting.id">
                        <p style="text-align:justify;line-height:2;direction:ltr;">
                            {{ setting.about_us_en }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <br>
    </div>
</template>

<script>
import $ from 'jquery';
import axios from 'axios';
export default {
    name:"About",
    data: function(){
        return {
            settings:[],
        }
    },
    mounted(){
        axios
        .get('/api/settings')
        .then(response => (
            this.settings = response.data
        ))
    }
}
</script>