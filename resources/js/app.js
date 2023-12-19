import Vue from "vue";
import App from "./App.vue";
import router from "./router.js";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap";
import i18n from "./I18n.js";

import BootstrapVue from "bootstrap-vue";
import FlashMessage from "@smartweb/vue-flash-message";

Vue.use(BootstrapVue);
Vue.use(FlashMessage);

import { library } from '@fortawesome/fontawesome-svg-core'
import { faCoffee } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faCoffee)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

router.beforeEach((to, from, next) => {
    let language = to.params.lang
    if(!language ){
        language = "ar";
    }

    i18n.locale = language;
    next()
})

new Vue({
    el: '#app',
    router,
    i18n,
    render: h => h(App),
});