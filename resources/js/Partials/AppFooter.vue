<template>
    

        Footer
</template>

<script>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "AppFooter",
    setup() {
        const user = computed(() => usePage().props.value.auth.user);

        return {
            user
        }
    },
    mounted() {
        document.getElementById('nav-toggle').onclick = function(){
			document.getElementById("nav-content").classList.toggle("hidden");
        }
    }
}
</script>
