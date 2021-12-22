<template>
  <app-header></app-header>
  <div class="rvmp-container h-full bg-gray-100">
     <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28 pt-9">
        <form action="#" method="POST" class="grid grid-cols-6 gap-y-3 overflow-hidden bg-transparent 2xl:px-40 xl:px-16 lg:px-8" >
            <div class="col-span-6">
              <h2 class="text-3xl font-semibold leading-6 mb-2 brand-text rvmp-footer-contact-text capitalize text-center">Tell us about your project</h2>
              <p class="brand-text text-center text-lg px-10 ">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur purus magna, rutrum nec arcu nec, fringilla scelerisque nisl.
              </p>
            </div>
            <div class="col-span-6">
              <label for="first-name" class="text-sm font-medium rvmp-footer-contact-text capitalize hidden">Full name</label>
              <input type="text" name="first-name" id="first-name" placeholder="Full name" autocomplete="off" class="rounded-md focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 " />
            </div>
            <div class="col-span-6">
              <label for="email-address" class="text-sm font-medium rvmp-footer-contact-text capitalize hidden">Email address</label>
              <input type="text" name="email-address" id="email-address" placeholder="Email Address" autocomplete="off" class="rounded-md focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 " />
            </div>
            <div class="col-span-6">
              <label for="street-address" class="text-sm font-medium rvmp-footer-contact-text capitalize hidden">Message</label>
              <textarea type="text" name="street-address" id="street-address" placeholder="Message" autocomplete="off" class="rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 resize-none" ></textarea>
            </div>
            <div class="col-span-6">
              <button class="bg-green-600 text-white px-4 py-1.5 rounded-md hover:bg-green-700 w-full transition ease-in-out duration-300">Sumbit</button>
            </div>
        </form>
    </div>
    <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28 py-9 flex lg:flex-row flex-col space-x-6">
      <div class="w-1/3 lg:h-48 h-36 shadow-md rounded-md bg-white text-center flex flex-col space-y-3 justify-center place-content-center p-10">
          <i class="fas fa-map-marker-alt rvmp-brand-color-main 2xl:text-3xl xl:text-2xl text-lg "></i>
          <h3 class="text-xl font-semibold leading-6 mb-2 brand-text rvmp-footer-contact-text uppercase ">our location</h3>
          <p class="brand-text italic 2xl:text-base text-xs text-center">
              <span class="block">Unit 3, Uypitching Building</span><span class="block">Km. 8, Jose Romero Road</span> <span class="block">6215 Valencia, Negros Oriental</span> <span class="block">Philippines</span>
          </p>
      </div>
      <div class="w-1/3 lg:h-48 h-36 shadow-md rounded-md bg-white text-center flex flex-col space-y-3 justify-center place-content-center p-10">
          <i class="fas fa-phone-volume rvmp-brand-color-main 2xl:text-3xl xl:text-2xl text-lg "></i>
          <h3 class="text-xl font-semibold leading-6 mb-2 brand-text rvmp-footer-contact-text uppercase ">let's talk</h3>
          <p class="brand-text italic 2xl:text-base text-xs text-center">
              <span class="block">0905-000-0000</span>
          </p>
      </div>
      <div class="w-1/3 lg:h-48 h-36 shadow-md rounded-md bg-white text-center flex flex-col space-y-3 justify-center place-content-center p-10">
          <i class="fas fa-envelope-open rvmp-brand-color-main 2xl:text-3xl xl:text-2xl text-lg "></i>
          <h3 class="text-xl font-semibold leading-6 mb-2 brand-text rvmp-footer-contact-text uppercase ">email us</h3>
          <p class="brand-text italic 2xl:text-base text-xs text-center">
              <span class="block">support@gligroupinc.com</span>
          </p>
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