<template>
    <app-header></app-header>
    <div class="rvmp-container h-full  flex">
        <div class="w-3/5 px-10 py-20 shadow-lg z-10 bg-white">
            <div class="h-auto">
                <form action="#" class="grid grid-cols-6 gap-y-5 overflow-hidden bg-transparent" >
                    <div class="col-span-6">
                    <h2 class="text-2xl font-semibold leading-6 mb-5 brand-text rvmp-footer-text capitalize">Get in touch</h2>
                    <p class="brand-text text-lg mb-5 font-light">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur purus magna, rutrum nec arcu nec, fringilla scelerisque nisl.
                    </p>
                    </div>
                    <div class="col-span-6">
                        <label for="first-name" class="text-sm font-medium rvmp-footer-text capitalize hidden">
                            Full name
                        </label>
                        <input type="text" name="first-name" id="first-name" placeholder="Full name" autocomplete="off" class="rounded-md focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 " />
                    </div>
                    <div class="col-span-6">
                        <label for="email-address" class="text-sm font-medium rvmp-footer-text capitalize hidden">
                            Email address
                        </label>
                        <input type="text" name="email-address" id="email-address" placeholder="Email Address" autocomplete="off" class="rounded-md focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 " />
                    </div>
                    <div class="col-span-6">
                        <label for="street-address" class="text-sm font-medium rvmp-footer-text capitalize hidden">
                            Message
                        </label>
                        <textarea type="text" rows="7" name="street-address" id="street-address" placeholder="Message" autocomplete="off" class="rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 resize-none" ></textarea>
                    </div>
                    <div class="col-span-6">
                    <button class="bg-green-600 text-white px-4 py-1.5 rounded-md hover:bg-green-700 w-full transition ease-in-out duration-300">Sumbit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-2/5 h-full">
            <div class="w-full h-screen bg-cover bg-top bg-local" style="background-image: url('/images/pages/map.png')">
                &nbsp;
            </div>
        </div>
    </div>
    <div class="h-auto w-3/5 mx-auto flex lg:flex-row flex-col py-10 space-x-5">
        <div class="lg:w-1/3 w-full bg-gray-100 shadow-md rounded-md bg-white text-center flex flex-col space-y-3 lg:p-10 p-6">
            <i class="fas fa-map-marker-alt rvmp-brand-color-main 2xl:text-3xl text-2xl mb-8">
                <span class="text-xl ml-2 font-semibold leading-6 mb-2 brand-text rvmp-footer-text uppercase ">our location</span>
            </i>
            <p class="brand-text italic 2xl:text-base text-xs text-center">
                <span class="block">Unit 3, Uypitching Building</span>
                <span lass="block">Km. 8, Jose Romero Road</span>
                <span class="block">6215 Valencia, Negros Oriental</span> <span class="block">Philippines</span>
            </p>
        </div>
        <div class="lg:w-1/3 w-full bg-gray-100 shadow-md rounded-md bg-white text-center flex flex-col space-y-3 lg:p-10 p-6">
            <i class="fas fa-phone-alt transform rvmp-brand-color-main 2xl:text-3xl text-2xl mb-8">
                <span class="text-xl ml-2 font-semibold leading-6 mb-2 brand-text rvmp-footer-text uppercase ">let's talk</span>
            </i>

            <p class="brand-text italic 2xl:text-base text-xs text-center">
                <span class="block">0905-000-0000</span>
            </p>
        </div>
        <div class="lg:w-1/3 w-full bg-gray-100 shadow-md rounded-md bg-white text-center flex flex-col space-y-3 lg:p-10 p-6">
            <i class="fas fa-envelope-open rvmp-brand-color-main 2xl:text-3xl text-2xl mb-8">
                <span class="text-xl ml-2 font-semibold leading-6 mb-2 brand-text rvmp-footer-text uppercase ">email us</span>
            </i>

            <p class="brand-text italic 2xl:text-base text-xs text-center">
                <span class="block">support@gligroupinc.com</span>
            </p>
        </div>
    </div>
    <div class="h-auto">
        <div class="uppercase text-center" id="rvmp-testimonial-heading">
                <span class="border-b-4 rvmp-brand-border-highlight text-xl font-bold pb-2.5">More of Us Here!</span>
            </div>
        <div class="w-full my-10 flex md:flex-row flex-col lg:space-x-6 justify-center overflow-hidden bg-transparent 2xl:px-40 xl:px-16 px-16" id="social-links">
            <a href="https://www.facebook.com/gligroupinc" target="_blank" class="fab fa-facebook text-blue-600 group hover:rvmp-brand-color-main 2xl:text-2xl xl:text-xl text-base text-left social-link"><span class="px-2 text-sm brand-logo-text group-hover:rvmp-brand-color-main rvmp-footer-text"><span class="font-semibold">GLI</span> <span class="font-thin">Group Inc.</span> </span></a>
            <a href="https://www.facebook.com/GLidesignstudio" target="_blank" class="fab fa-facebook text-blue-600 group hover:rvmp-brand-color-main 2xl:text-2xl xl:text-xl text-base text-left social-link"><span class="px-2 text-sm brand-logo-text group-hover:rvmp-brand-color-main rvmp-footer-text"><span class="font-thin">Design Studio</span></span></a>
            <a href="https://www.facebook.com/GLI-Builders-102946945203186" target="_blank" class="fab fa-facebook text-blue-600 group hover:rvmp-brand-color-main 2xl:text-2xl xl:text-xl text-base text-left social-link"><span class="px-2 text-sm brand-logo-text group-hover:rvmp-brand-color-main rvmp-footer-text"><span class="font-thin">Builders</span></span></a>
            <a href="https://www.facebook.com/glimodularcabinets" target="_blank" class="fab fa-facebook text-blue-600 group hover:rvmp-brand-color-main 2xl:text-2xl xl:text-xl text-base text-left social-link"><span class="px-2 text-sm brand-logo-text group-hover:rvmp-brand-color-main rvmp-footer-text"><span class="font-thin">Modular Cabinets</span></span></a>
        </div>
    </div>
  <app-footer-small></app-footer-small>
</template>

<script>
import AppHeader from "../Partials/AppHeader";
import AppFooterSmall from "../Partials/AppFooterSmall";
import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import { usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed, inject } from "vue";
export default {
  name: "Home",
  components: {
    ErrorsAndMessages,
    AppHeader,
    AppFooterSmall,
  },
  props: {
    errors: Object,
  },
};
</script>
