<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<app-header-small></app-header-small>
    <div class="flex flex-row">
        <app-sidebar></app-sidebar>
        <div id="content-area" class="w-full  h-auto bg-gray-50">
        <div class="h-screen">
                 DASHBOARD HERE
        </div>
           
        </div>
    </div>
</template>

<script>
import AppHeaderSmall from '../../Partials/AppHeaderSmall';
import AppSidebar from "../../Partials/AppSidebar";
import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";
// import {usePage} from "@inertiajs/inertia-vue3";
// import {Inertia} from "@inertiajs/inertia";
// import {computed, inject} from "vue";



export default {
    name: "Admin",
    components: {
        ErrorsAndMessages,
        AppSidebar,
        AppHeaderSmall
    },
    props: {
        errors: Object
    },
   
}
</script>

