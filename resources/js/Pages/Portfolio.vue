<template>
    <app-header></app-header>
    
    <div  class=" mx-auto h-auto "  >
        <div class="flex lg:flex-row-reverse  flex-col-reverse h-auto">
            <div class="w-full  h-auto flex" >            
                    <div class="w-1/3 overflow-clip text-center flex-grow h-auto" style="background-image: url('/images/pages/builders.jpg')" id="designstudio" @mouseover="expandHovered('designstudio')" @mouseleave="shrinkHovered('designstudio')">  
                        <div class="font-bold uppercase h-full bg-gray-600 bg-opacity-70 p-36" >
                            <h2 class="brand-logo-bold text-3xl font-semibold">GLI</h2>
                            <h2 class="brand-logo-light text-3xl text-green-600 font-light">Design Studio</h2>  
                        </div>               
                    </div>
                    <div class="w-1/3 overflow-clip flex-grow text-center h-auto" style="background-image: url('/images/pages/builders.jpg')" id="builders" @mouseover="expandHovered('builders')" @mouseleave="shrinkHovered('builders')">  
                        <div class="font-bold uppercase h-full bg-gray-600 bg-opacity-70 p-36">
                            <h2 class="brand-logo-bold text-3xl font-semibold">GLI</h2>
                            <h2 class="brand-logo-light text-3xl text-green-600 font-light">Builders</h2>  
                        </div>               
                    </div> 
                    <div class="w-1/3 overflow-clip flex-grow text-center h-auto" style="background-image: url('/images/pages/builders.jpg')" id="modularcabinets" @mouseover="expandHovered('modularcabinets')" @mouseleave="shrinkHovered('modularcabinets')">  
                        <div class="font-bold uppercase h-full bg-gray-600 bg-opacity-70 p-36">
                            <h2 class="brand-logo-bold text-3xl font-semibold">GLI</h2>
                            <h2 class="brand-logo-light text-3xl text-green-600 font-light">Modular Cabinets</h2>  
                        </div>               
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
    data: () =>({
        portfolioCats: ['designstudio','builders','modularcabinets']
    }),
    props: {
        errors: Object
    },
    methods:{
        expandHovered: function(id){
            console.log(id)
        },
         shrinkHovered: function(id){
            console.log(id)
        }
    }
   
}
</script>