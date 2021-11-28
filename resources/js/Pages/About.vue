<template>
    <app-header></app-header>

    <div  class="mx-auto h-screen lg:px-36 px-2" >

    <section class="h-5/6">
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
    </section>
    <section class="h-32 bg-center bg-contain bg-no-repeat" >
     <div class="grid justify-items-center py-4">
         <h2 class="ml-5 brand-text-header text-3xl font-semibold">We Build as One here in</h2>
         <h2 class="ml-5 brand-logo-bold text-3xl font-semibold">GLI <span class="brand-logo-light font-thin">GROUP INC.</span></h2>    
    </div> 

        
    </section>


        
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
<style scoped>
.bgcol{
  background: grey;
  height: 300px;
}
.testimg{
  width:15%;
  height:20%;
  border-radius: 50%;
}
.card{
  box-shadow:10px 10px 26px -15px rgba(0, 0, 0, 0.75)
}
.card-body{
  height:350px;
}
.bgcol{
  
}
</style>