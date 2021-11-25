<template>
    <app-header></app-header>
    <div  class=" mx-auto ">
                    <errors-and-messages :errors="errors"></errors-and-messages>
        DASHBOARD HERE
    </div>

</template>

<script>
import AppHeader from "../../Partials/AppHeader";
import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject} from "vue";

export default {
    name: "Admin",
    components: {
        ErrorsAndMessages,
        AppHeader
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
