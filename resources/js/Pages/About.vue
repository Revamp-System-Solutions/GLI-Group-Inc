<template>
    <app-header></app-header>

    <div  class="flex flex-col mx-auto h-screen lg:px-36 px-2" >
        <div  class="flex flex-col h-full">
            <div class="h-5/6 bg-white">
                <div class="flex lg:flex-row flex-col h-full">
                    <div class="lg:w-1/2 w-full relative " >
                        <div class="absolute py-16 pl-16 pr-20 ml-16 h-3/4 -right-16 top-20 bottom-20 bg-white-o-70">     
                        
                            <div class="mb-8 border-l-4 border-gray-500">
                                <h2 class="ml-5 brand-text-header text-3xl font-semibold">MEET THE CEO OF</h2>
                                <h2 class="ml-5 brand-logo-bold text-3xl font-semibold">GLI <span class="brand-logo-light font-thin">GROUP INC.</span></h2>    
                            </div>               
                                <p class="text-left text-xl brand-text-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque egestas nec ipsum ac mollis. Duis at lorem sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur felis lacus, venenatis non maximus vitae, laoreet sit amet risus. Vivamus id ex magna. Vestibulum nibh elit, vestibulum ac mauris a, ornare sodales lorem. Aenean turpis velit, hendrerit eget dui sed, accumsan molestie libero. Donec sapien magna, egestas vel congue vel, accumsan et erat. Etiam nisi odio, pretium sit amet nunc at, dapibus vehicula augue.</p>
                        </div>               
                    </div>
                    <div class="lg:w-1/2 w-full bg-local" style="background-image: url('/images/pages/ceo.jpeg')"></div>
                </div>
            </div>

            <div class="h-1/3 bg-cover bg-bottom bg-local" style="background-image: url('/images/pages/house.jpeg')" >
                <div class="py-4 h-full text-center mt-auto w-full flex flex-col justify-center text-white bg-green-o-70">
                    <h2 class="ml-5 brand-text-content text-3xl font-light">We Build as One here in</h2>
                    <h2 class="ml-5 brand-logo-bold text-4xl font-bold">GLI <span class="brand-logo-light font-thin">GROUP INC.</span></h2>    
                </div> 
            
            </div>

        </div>
        
    </div>
    <app-footer></app-footer>
</template>

<script>
import AppHeader from "../Partials/AppHeader";
import AppFooter from "../Partials/AppFooter";
import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject} from "vue";
export default {
    name: "Home",
    components: {
        ErrorsAndMessages,
        AppHeader,
        AppFooter
    },
    props: {
        errors: Object
    },
   
}
</script>
