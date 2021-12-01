<template>
    <app-header></app-header>
      <div  class=" mx-auto h-auto"  >
        <div class="flex lg:flex-row-reverse  flex-col-reverse h-auto">
            <div class="w-full  h-auto flex flex-col flex items-center" >            
                    <div class="w-full border border-red-500 p-24 bg-gray-500 text-white">  
                        <div class="w-full mb-8 border-l-4 border-green-600 inline-flex flex-col text-right">
                            <h2 class="brand-text-header font-bold text-7xl ml-5">Come and Visit us</h2>
                            <h8 class="italic text-xl  brand-text-content ml-5">were residing at the coziest place in Negros Oriental</h8>  
                        </div> 
                        <div class=" w-full mb-8 inline-flex flex-row ">
                             <div class="w-5/12 text-right text-6xl">
                                <i class="fas fa-map-marker-alt text-green-600 "></i> 
                             </div>
                            <div class="w-7/12 italic text-xl  brand-text-content text-right"> 
                            Bacong, Valencia Road, 6200 Negros Oriental
                            <span class="block ">Dumaguete City</span> 
                            </div>              
                             
                        </div> 
                    </div>   
                     <div class="w-full border border-red-500 p-24 bg-white-500 text-gray-500">  
                        <div class="mb-8 border-l-4 border-green-500">
                            <h2 class="brand-text-header font-bold text-5xl ml-5">Call Us Here</h2>
                            <h8 class="italic text-xl  brand-text-content ml-5">having trouble or don't have time? Call Us Any time!</h8>  
                        </div> 
                        <i class="fas fa-phone-alt text-green-500"></i><p class="italic text-xl  brand-text-content">0905-000-0000</p>              
                        <i class="fas fa-envelope text-green-500"></i><p class="italic text-xl  brand-text-content">client.gli@gmail.com</p> 
                    </div>                        
            </div>
            <div class="w-full lg:h-auto" >
                <div class="w-full lg:h-full h-96 bg-cover bg-top bg-local " style="background-image: url('/images/pages/map.png')">
                        &nbsp;
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