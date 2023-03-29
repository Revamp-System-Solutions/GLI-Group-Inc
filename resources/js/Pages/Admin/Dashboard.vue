<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<div class="flex">
    <app-header-small :user="user" :menu-links="menuLinks" :menu-sub-links="menuSubLinks" />
    <div class="flex flex-row w-full ">
        <div id="content-area" class="w-full  h-auto bg-gray-50 ">

            
        </div>
    </div>
</div>
</template>

<script>
import AppHeaderSmall from '../../Partials/AppHeaderSmall';
import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import LvProgressBar from 'lightvue/progress-bar';
import prettyBytes from 'pretty-bytes';

export default {
    name: "Admin",
    components: {
        ErrorsAndMessages,
        AppHeaderSmall,
        LvProgressBar,
    },
    props: {
        errors: Object
    },	 
    setup() {
       
        const user = computed(() => usePage().props.value.auth.user);
		const menuLinks = computed(() => usePage().props.value.page_links.parentLinks);
		const menuSubLinks = computed(() => usePage().props.value.page_links.subLinks);
        
        
        return {
            user,
			menuLinks,
			menuSubLinks,
           
        }
    },
    methods:{
        filter_bytes: (value)=>{
            return prettyBytes(value, {binary:true})
        }
    }

}
</script>

