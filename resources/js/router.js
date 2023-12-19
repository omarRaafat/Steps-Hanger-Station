import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import Contact from "./views/Contact.vue";
import About from "./views/About.vue";
import Pricing from "./views/Pricing.vue";
import faq from "./views/faq.vue";
import Term from "./views/Term.vue";
import Policy from "./views/Policy.vue";
import VueScrollTo from 'vue-scrollto';
import i18n from "./I18n.js";



Vue.use(Router);

const routes = [
    {
        path:"/",
        redirect:`/${i18n.locale}`
    },
    {
        path:"/:lang",
        component:{
            render (c) {return c('router-view')}
        },
        children:[
            {
                name:"Home",
                path:"/",
                component:Home
            },

            {
                name:"Contact",
                path:"contact",
                component:Contact
            },
            {
                name:"About",
                path:"about",
                component:About
            },
            {
                name:"Pricing",
                path:"pricing",
                component:Pricing
            },
            {
                name:"FAQ",
                path:"faq",
                component:faq
            },
            {
                name:"Terms",
                path:"terms",
                component:Term
            },
            {
                name:"Policy",
                path:"policy",
                component:Policy
            },
        ]
    }
];

const router = new Router({
    mode:"hash",
    hashbang:false,
    routes:routes,
    scrollBehavior: function (to) {
        if (to.hash) {
            VueScrollTo.scrollTo(to.hash, 700);
            return {
            selector: to.hash
            }
        }else{
            return {x: 0, y: 0}
        }
    },
    linkActiveClass:"active"
});

export default router;
