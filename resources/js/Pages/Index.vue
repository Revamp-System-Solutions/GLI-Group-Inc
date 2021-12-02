<template>
    <app-header></app-header>
    <div  class="flex lg:flex-row flex-col-reverse mx-auto h-full lg:px-36 md:px-2">
        <div class="lg:w-2/5 my-auto p-5 py-10 lg:-mr-28 z-10 bg-white opacity-75 ">
            <ul class="border-l-4 px-5 uppercase text-lg font-bold">
                <li>simple</li>
                <li>modern</li>
                <li>innovative</li>
                <li>residential architecture</li>
            </ul>
            <div class="font-light italic mt-20 mb-10">
                Our team of professionals will help you turn your dream house into reality fast.
            </div>
            <div class="space-x-5">
                <button class="bg-green-600 text-white px-4 py-1.5 hover:bg-green-700 transition ease-in-out duration-300">Give us a Call!</button>
                <button class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">Our Portfolio</button>
            </div>
        </div>
        <div class="lg:w-4/6 lg:right-0 bg-cover bg-center"><img src="/images/pages/section-1.jpg"></div>
    </div>
    <div>
        <div class=" uppercase text-center my-10">
            <span class="border-b-4 text-xl font-bold pb-2.5">Here's what we can offer</span>
        </div>
        <div class="flex bg-green-600">
            <button class="w-1/3 bg-cover h-96 bg-center text-black hover:text-white transition ease-in duration-300 opacity-25 hover:opacity-75"
                    style="background-image: url('/images/pages/CABINETS.jpg')">
                <div class="bg-green-800 w-full">
                    <div class=" text-4xl font-bold">GLI</div>
                    <div>MODULAR CABINETS</div>
                </div>
            </button>
            <button class="w-1/3 bg-cover h-96 bg-center text-black hover:text-white transition ease-in duration-300 opacity-25 hover:opacity-75"
                    style="background-image: url('/images/pages/BUILDERS-1.jpg')">
                <div class=" text-4xl font-bold">GLI</div>
                <div>BUILDERS</div>
            </button>
            <button class="w-1/3 bg-cover h-96 bg-center text-black hover:text-white transition ease-in duration-300 opacity-25 hover:opacity-75"
                    style="background-image: url('/images/pages/STUDIO.jpg')">
                <div class=" text-4xl font-bold">GLI</div>
                <div>DESIGN STUDIO</div>
            </button>
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
