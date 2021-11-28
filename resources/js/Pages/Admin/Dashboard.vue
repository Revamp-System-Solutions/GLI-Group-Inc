<template>
<errors-and-messages :errors="errors"></errors-and-messages>
    <div class="flex flex-row">
        <app-sidebar></app-sidebar>
        <div id="content-area" class="w-10/12 bg-gray-50">
        <app-header-small></app-header-small>
            
            DASHBOARD HERE
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

<style scoped>
    .action-btn {
        margin-left: 12px;
        font-size: 13px;
    }

    .article {
        margin-top: 20px;
        
    }
    .d-flex{
        display: flex !important;
        justify-content: flex-start;
    }

</style>
