require('./bootstrap');

import {createApp, h} from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress'
import VueClickAway from "vue3-click-away";
import CKEditor from '@ckeditor/ckeditor5-vue';
import  VueGoogleMaps from '@fawmi/vue-google-maps'


InertiaProgress.init();

require('@helpers');

createInertiaApp({
  resolve:  name => {
    const page = require(`./Pages/${name}`).default

    return page
  },
  setup({ el, App, props, plugin }) {
    const app =  createApp({ render: () => h(App, props) })
    
    app.config.globalProperties.$route = window.route;
    app.config.devtools = false
    app.config.debug = true
    app.config.silent = true
  
    app.provide('$route', window.route)
    app.use(VueGoogleMaps, {
        load: {
            key: 'AIzaSyB5SiSMKLwgubZJHNWFH92onf3HX2p3pNE',
        },
    })
  
    app.use(CKEditor)
    app.use(VueClickAway)
    app.use(plugin)
    .component('InertiaHead', Head)
    .component('InertiaLink', Link)
    .mixin({ methods: { route } })
    app.mount(el)
  },
})
 