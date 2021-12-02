<template>
    <app-header></app-header>
        <div class="transition duration-500 ease-in-out w-full h-auto flex overflow-hidden relative" >            
                <div class="transition-width duration-700 ease-in-out cursor-pointer h-auto bg-local bg-cover bg-center static w-1/3" style="background-image: url('/images/pages/design.jpg')" id="designstudio" @mouseover="expandHovered('designstudio')">  
                    <div class="static transition duration-500 ease-in-out uppercase text-center lg:h-48 h-96 bg-green-600 bg-opacity-70 " id="pcChild-1"> 
                        <h2 class="transition duration-500 ease-in-out brand-logo-light lg:text-3xl text-base text-white font-light  transform origin-center lg:-translate-x-0 lg:translate-y-20 translate-y-48">Design Studio</h2>      
                    </div>               
                </div>
                <div class="transition-width duration-700 ease-in-out cursor-pointer h-auto bg-local bg-cover bg-center static w-1/3" style="background-image: url('/images/pages/builders.jpg')" id="builders" @mouseover="expandHovered('builders')" >  
                    <div class="static transition duration-500 ease-in-out uppercase text-center lg:h-48 h-96 bg-green-600 bg-opacity-70 " id="pcChild-2">
                        <h2 class="transition duration-500 ease-in-out brand-logo-light lg:text-3xl text-base text-white font-light  transform origin-center lg:-translate-x-0 lg:translate-y-20 translate-y-48">Builders</h2>  
                    </div>               
                </div> 
                <div class="transition-width duration-700 ease-in-out cursor-pointer h-auto bg-local bg-cover bg-center static w-1/3" style="background-image: url('/images/pages/modularcabs.jpg')" id="modularcabinets" @mouseover="expandHovered('modularcabinets')">  
                    <div class="static transition duration-500 ease-in-out uppercase text-center lg:h-48 h-96 bg-green-600 bg-opacity-70 " id="pcChild-3">
                        <h2 class="transition duration-500 ease-in-out brand-logo-light lg:text-3xl text-base text-white font-light  transform origin-center lg:-translate-x-0 lg:translate-y-20 translate-y-48">Modular Cabinets</h2>  
                    </div>               
                </div>                        
        </div>
        <div v-if="hovered != null">
                {{hovered}}            
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
    data: () =>({
        portfolioCats: {'designstudio':false,'builders':false,'modularcabinets':false},
        hovered: null

    }),
    
    methods:{
        expandHovered: function(id){

            for(var pc in this.portfolioCats){
                this.portfolioCats[pc]=false
                if(id!==pc){
                    $("#"+pc).removeClass('w-10/12')
                    $("#"+pc).removeClass('w-1/3').addClass("w-1/12 ");          
                    $("#"+$("#"+pc).children('div').attr('id')).removeClass('bg-green-600 ').addClass('bg-green-900')
                    $("#"+$("#"+pc).children('div').attr('id')).children('h2').removeClass('rotate-0 translate-y-48 lg:text-3xl').addClass('-rotate-90 translate-y-60 lg:text-xs whitespace-nowrap')
                }else{
                    this.hovered = pc;     
                    this.portfolioCats[pc]=true
                    $("#"+pc).removeClass('w-1/3').addClass('w-10/12');
                    $("#"+$("#"+pc).children('div').attr('id')).removeClass('bg-green-900').addClass('bg-green-600 ')
                    $("#"+$("#"+pc).children('div').attr('id')).children('h2').removeClass('-rotate-90 translate-y-60 lg:text-xs whitespace-nowrap').addClass('rotate-0 translate-y-48 lg:text-3xl')
                }
            }
        },

    }
   
}
</script>