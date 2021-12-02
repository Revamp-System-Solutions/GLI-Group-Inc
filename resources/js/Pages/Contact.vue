<template>
  <app-header></app-header>

<div class="mx-auto h-auto">
    <div class="flex lg:flex-row-reverse flex-col-reverse h-auto">

        <div class="w-full h-auto flex flex-col">
            <div class="w-full px-24 bg-gray-600 text-white h-1/2">
                <div class="w-full grid grid-cols-1 gap-5 place-content-center h-full">
                    <div class="w-full flex flex-col">
                        <blockquote className="my-2 p-4 self-end text-xl border-l-8 bg-transparent border-green-600 quote">
                            <h2 class="brand-text-header font-bold text-6xl ">Come and Visit us</h2>
                        </blockquote> 
                        <h8 class="my-2 self-end italic text-xl brand-text-content">we're residing at the coziest place in Negros Oriental</h8>
                        <div class="my-2 grid grid-cols-2 gap-0 place-content-center">
                            <span class="place-self-end">
                                <i class="fas fa-map-marker-alt text-5xl my-5 text-green-600"></i>
                            </span>
                            <span class="text-xl italic brand-text-content text-right">
                                Unit 3, Uypitching Building, Km. 8 Jose Romero Road, Valencia<br>6215 Negros Oriental
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full px-24 bg-white h-1/2">
                <div class="w-full grid grid-cols-1 gap-5 place-content-center h-full">
                    <div class="w-full flex flex-col">
                        <blockquote className="my-2 p-4 self-end text-xl border-l-8 bg-transparent border-green-600 quote">
                            <h2 class="brand-text-header font-bold text-6xl ">Call Us Here</h2>
                        </blockquote> 
                        <h8 class="my-2 self-end italic text-xl brand-text-content">having trouble or don't have time? Call Us Any time!</h8>
                        <div class="my-2 self-end grid grid-cols-2 gap-0 place-content-center">
                            <span class="place-self-end">
                                <i class="fas fa-phone-alt text-4xl text-green-600"></i>
                            </span>
                            <span class="my-3 mx-2 text-xl italic brand-text-content place-self-end">
                               0905-000-0000
                            </span>
                            <span class="place-self-end">
                                <i class="fas fa-envelope text-4xl text-green-600"></i>
                            </span>
                            <span class="my-3 mx-2 text-xl italic brand-text-content place-self-end">
                               client.gli@gmail.com
                            </span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:h-screen ">
            <div class="w-full lg:h-full h-96 bg-cover bg-top bg-local" style="background-image: url('/images/pages/map.png')">
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
import { usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed, inject } from "vue";
export default {
  name: "Home",
  components: {
    ErrorsAndMessages,
    AppHeader,
    AppFooter,
  },
  props: {
    errors: Object,
  },
};
</script>