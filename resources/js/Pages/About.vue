<template>
    <app-header></app-header>
    <div  class=" mx-auto ">
        About page here
    </div>
</template>

<script>
import AppHeader from "../Partials/AppHeader";
import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject} from "vue";
export default {
    name: "Home",
    components: {
        ErrorsAndMessages,
        AppHeader
    },
    props: {
        errors: Object
    },
   
}
</script>