<template>
    <footer class="footer bg-white relative pt-1 " ondragstart="return false;" >
    <div class="container mx-auto px-6">

        <div class="flex mt-8 bg-gray">
            <div class="mt-8 mt-0 w-full lg:px-8 flex flex-col justify-center">
                <div class="flex flex-col">
                    <span class="text-center mb-3"><img src="/images/gli-logo.png" class="mx-auto lg:w-36 w-24 "></span>
                    <div class="flex flex-row text-xs lg:text-base mx-auto">
                        <span class="mx-2"><a href="#designstudio" class="text-black hover:text-green-600">Design Studio</a></span>
                        <span class="mx-2"><a href="#builders" class="text-black hover:text-green-600">Builders</a></span>
                        <span class="mx-2"><a href="#modularcabinets" class="text-black hover:text-green-600">Modolar Cabinets</a></span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container mx-auto px-6">
        <div class="mt-16 border-t-2 border-gray-300 flex flex-col items-center">
            <div class="w-full text-center py-6 relative">
                <p class="text-sm text-gray-400 font-bold mb-2 uppercase">
                    © {{ new Date().getFullYear() }} | GLI Group Inc. 
                </p>
                <img src="/images/revamp-system-solutions.png" oncontextmenu="return false;" class="mx-auto w-1/3 lg:w-36 ">
            </div>
        </div>
    </div>
</footer>
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
     
    }
}
</script>
