<template>
    <app-header></app-header>
    
    <div  class=" mx-auto h-auto "  >
        <div class="flex lg:flex-row-reverse  flex-col-reverse h-auto">
            <div class="w-full  h-auto flex" >            
                    <div class="transition duration-500 ease-in-out bg-blue-600 flex-grow text-center h-auto bg-local bg-cover bg-center" style="background-image: url('/images/pages/design.jpg')" id="designstudio" :class="portfolioCats.designstudio ? 'w-10/12 ':'w-1/3'" @mouseover="expandHovered('designstudio')" @mouseleave="shrinkHovered('designstudio')">  
                        <div class="font-bold uppercase h-full bg-green-600 bg-opacity-70 p-36" id="pcChild-1">
                            <h2 class="brand-logo-bold text-xl font-semibold text-black">GLI</h2>
                            <h2 class="brand-logo-light text-3xl text-white font-light">Design Studio</h2>  
                        </div>               
                    </div>
                    <div class="transition duration-500 ease-in-out bg-blue-600 flex-grow text-center h-auto bg-local bg-cover bg-center" style="background-image: url('/images/pages/builders.jpg')" id="builders" :class="portfolioCats.builders ? 'w-10/12 ':'w-1/3'" @mouseover="expandHovered('builders')" @mouseleave="shrinkHovered('builders')">  
                        <div class="font-bold uppercase h-full bg-green-600 bg-opacity-70 p-36" id="pcChild-2">
                            <h2 class="brand-logo-bold text-xl font-semibold text-black">GLI</h2>
                            <h2 class="brand-logo-light text-3xl text-white font-light">Builders</h2>  
                        </div>               
                    </div> 
                    <div class="transition duration-500 ease-in-out bg-blue-600 flex-grow text-center h-auto bg-local bg-cover bg-center" style="background-image: url('/images/pages/modularcabs.jpg')" id="modularcabinets" :class="portfolioCats.modularcabinets ? 'w-10/12 ':'w-1/3'"  @mouseover="expandHovered('modularcabinets')" @mouseleave="shrinkHovered('modularcabinets')">  
                        <div class="font-bold uppercase h-full bg-green-600 bg-opacity-70 p-36" id="pcChild-3">
                            <h2 class="brand-logo-bold text-xl font-semibold text-black">GLI</h2>
                            <h2 class="brand-logo-light text-3xl text-white font-light">Modular Cabinets</h2>  
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
        portfolioCats: {'designstudio':false,'builders':false,'modularcabinets':false}
    }),
    props: {
        errors: Object
    },
    methods:{
        expandHovered: function(id){
            this.portfolioCats[id]=true
            for(var pc in this.portfolioCats){
                if(id!==pc){
                $("#"+pc).addClass("w-1/12");
                $("#"+$("#"+pc).children('div').attr('id')).removeClass('bg-green-600 p-36').addClass('bg-green-900')
                 $("#"+$("#"+pc).children('div').attr('id')).children('h2').hide()
                }
            }
        },
         shrinkHovered: function(id){
           
            for(var pc in this.portfolioCats){
                $("#"+pc).removeClass("w-1/12");
                 this.portfolioCats[pc]=false
                
                $("#"+$("#"+pc).children('div').attr('id')).removeClass('bg-green-900').addClass('bg-green-600 p-36')
                 $("#"+$("#"+pc).children('div').attr('id')).children('h2').show()
               
            }
        }
    }
   
}
</script>