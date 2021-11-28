<template>
    <footer class="footer bg-white relative pt-1 " ondragstart="return false;">
    <div class="container mx-auto px-6">

        <div class="flex mt-8 bg-gray">
            <div class="mt-0 w-full lg:px-8 flex flex-col justify-center">
                <div class="flex flex-col">
                    <span class="text-center mb-3"><img src="/images/brand-logo.png" class="mx-auto lg:w-36 w-24 "></span>
                    <div class="flex lg:flex-row flex-col text-center text-xs lg:text-base mx-auto uppercase font-semibold brand-logo-bold">
                        <span class="mx-2">
                            <a v-if="!switchInertia" href="#designstudio" class="text-black hover:text-green-600">Design Studio</a>
                            <inertia-link v-if="switchInertia" :href="$route('guest.studio') " class="text-black hover:text-green-600 ">
								Design Studio
							</inertia-link></span>
                        <span class="mx-2">
                            <a v-if="!switchInertia" href="#builders" class="text-black hover:text-green-600">Builders</a>
                            <inertia-link v-if="switchInertia" :href="$route('guest.builders') " class="text-black hover:text-green-600 ">
								Builders
							</inertia-link>
                            </span>
                        <span class="mx-2">
                            <a v-if="!switchInertia" href="#modularcabinets" class="text-black hover:text-green-600">Modular Cabinets</a>
                            <inertia-link v-if="switchInertia" :href="$route('guest.modcabinet') " class="text-black hover:text-green-600 ">
								Modular Cabinets
							</inertia-link>
                            </span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container mx-auto px-6">
        <div class="mt-8 border-t-2 border-gray-100 flex flex-col items-center">
            <div class="w-full text-center py-6 relative">
                <p class="text-sm text-gray-400 font-semibold mb-2 uppercase brand-logo-bold">
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
    data: () => ({
		switchInertia: false,
  	}),
    setup() {
        const user = computed(() => usePage().props.value.auth.user);

        return {
            user
        }
    },
    mounted() {
     if(window.location.pathname !== "/home"){
			this.switchInertia = true
		}
    }
}
</script>
