<template>
<footer class="footer bg-white relative pt-1 " ondragstart="return false;">
    <div class="container mx-auto px-6">
        <div class="flex mt-8 bg-gray">
            <div class="mt-0 w-full lg:px-8 flex flex-col justify-center">
                <div class="flex flex-col">
                    <span class="text-center mb-3"><img src="/images/brand-logo.png" class="mx-auto lg:w-36 w-24 "></span>
                    <div class="flex lg:flex-row flex-col text-center text-xs lg:text-base mx-auto uppercase font-semibold brand-logo-text">
                        <span class="mx-2">
                            <a v-if="!switchInertia" href="#designstudio" class="text-black hover:text-green-600">Design Studio</a>
                            <inertia-link v-if="switchInertia"  href="/home#designstudio"  class="text-black hover:text-green-600 ">
								Design Studio
							</inertia-link></span>
                        <span class="mx-2">
                            <a v-if="!switchInertia" href="#builders" class="text-black hover:text-green-600">Builders</a>
                            <inertia-link v-if="switchInertia"  href="/home#builders"  class="text-black hover:text-green-600 ">
								Builders
							</inertia-link>
                            </span>
                        <span class="mx-2">
                            <a v-if="!switchInertia" href="#modularcabinets" class="text-black hover:text-green-600">Modular Cabinets</a>
                            <inertia-link v-if="switchInertia"  href="/home#modularcabinets" class="text-black hover:text-green-600 ">
								Modular Cabinets
							</inertia-link>
                            </span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <app-footer-small/>
</footer>
</template>

<script>
import AppFooterSmall from "./AppFooterSmall"

export default {
    name: "AppFooter",
    components:{
        AppFooterSmall,
    },
    data: () => ({
		switchInertia: false,
  	}),
    setup() {
       

        return {
            
        }
    },
    mounted() {
     if(window.location.pathname !== "/home"){
			this.switchInertia = true
		}
    }
}
</script>
