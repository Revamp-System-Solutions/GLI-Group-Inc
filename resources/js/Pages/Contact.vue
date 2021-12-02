<template>
  <app-header></app-header>

<div class="mx-auto h-auto">
    <div class="flex lg:flex-row-reverse flex-col-reverse h-auto">
        <div class="lg:w-1/3 w-full h-auto flex flex-col">
            <div class="w-full 2xl:px-24 xl:px-12 lg:px-8 lg:py-0 p-6 bg-gray-600 text-white h-1/2">
                <div class="w-full grid grid-cols-1 gap-5 place-content-center h-full">
                    <div class="w-full flex flex-col">
                        <blockquote className="self-end my-2 border-l-8 bg-transparent border-green-600 quote">
                            <h2 class="brand-text-header font-bold text-right ml-4 2xl:text-6xl xl:text-4xl text-3xl whitespace-nowrap">Come and Visit us</h2>
                        </blockquote> 
                        <span class="self-end brand-text-content my-2 italic 2xl:text-lg  text-xs whitespace-nowrap">we're residing at the coziest place in Negros Oriental</span>
                        <div class="self-end my-2 grid grid-cols-3 sm:gap-x-5 gap-x-3.5 place-content-center">
                            <span class="fas fa-map-marker-alt text-green-600 2xl:text-5xl xl:text-3xl text-xl self-center text-right"></span>
                            <span class="brand-text-content italic text-right 2xl:text-lg text-xs col-span-2 self-center text-right xl:whitespace-nowrap whitespace-normal">
                              Unit 3, Uypitching Building<br>Km. 8, Jose Romero Road<br>6215 Valencia, Negros Oriental<br>Philippines
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full 2xl:px-24 xl:px-12 lg:px-8 lg:py-0 p-6 bg-white text-gray-600 h-1/2">
                <div class="w-full grid grid-cols-1 gap-5 place-content-center h-full">
                    <div class="w-full flex flex-col">
                        <blockquote className="self-end my-2 border-l-8 bg-transparent border-green-600 quote">
                            <h2 class="brand-text-header font-bold text-right ml-4 2xl:text-6xl xl:text-4xl text-3xl whitespace-nowrap">Call Us Here</h2>
                        </blockquote> 
                        <span class="self-end brand-text-content my-2 italic 2xl:text-lg  text-xs whitespace-nowrap">having trouble or don't have time? Call Us Any time!</span>
                        <div class="self-end my-2 grid grid-cols-3 sm:gap-x-5 gap-x-3.5 place-content-center">
                            <span class="fas fa-phone-alt text-green-600 text-green-600 2xl:text-5xl xl:text-3xl text-xl self-center text-right"></span>
                            <span class="brand-text-content italic text-right 2xl:text-lg text-xs col-span-2 self-center text-right xl:whitespace-nowrap whitespace-normal">
                               0905-000-0000
                            </span>
                            <span class="fas fa-envelope text-green-600 text-green-600 2xl:text-5xl xl:text-3xl text-xl self-center text-right"></span>
                            <span class="brand-text-content italic text-right 2xl:text-lg text-xs col-span-2 self-center text-right xl:whitespace-nowrap whitespace-normal">
                               client.gli@gmail.com
                            </span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:w-2/3 w-full lg:h-screen ">
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