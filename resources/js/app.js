require('./bootstrap');

import {createApp, h} from 'vue';
import { App, plugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress'
import VueClickAway from "vue3-click-away";
import CKEditor from '@ckeditor/ckeditor5-vue';

const el = document.getElementById('app');

InertiaProgress.init();


    const app = createApp({
        render: () => h(App, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default
        })
    });

    app.config.globalProperties.$route = window.route;
    app.config.devtools = false
    app.config.debug = false
    app.config.silent = true
    app.provide('$route', window.route);
    app.use(VueClickAway)
    app.use(CKEditor)
    app.use(plugin).mount(el);

