<template>
  <app-header></app-header>

<div class="mx-auto h-auto">
    <div class="flex lg:flex-row-reverse flex-col-reverse h-auto">
        <div class="lg:w-1/3 w-full h-auto flex flex-col">
            <div class="w-full 2xl:px-24 xl:px-12 lg:px-8 lg:py-0 p-6 lg:rvmp-bg-alt rvmp-bg-main lg:rvmp-text-alt rvmp-text-main h-1/2">
                <div class="w-full grid grid-cols-1 gap-5 place-content-center h-full">
                    <div class="w-full flex flex-col">
                        <blockquote className="self-end my-2 border-l-8 rvmp-brand-border-main quote">
                            <h2 class="brand-text-header font-bold text-right ml-4 2xl:text-6xl xl:text-4xl text-3xl whitespace-nowrap">Come and Visit us</h2>
                        </blockquote> 
                        <span class="self-end brand-text-content my-2 italic 2xl:text-lg  text-xs whitespace-nowrap">we're residing at the coziest place in Negros Oriental</span>
                        <div class="self-end my-2 grid grid-cols-3 sm:gap-x-5 gap-x-3.5 place-content-center">
                            <span class="fas fa-map-marker-alt rvmp-brand-color-main 2xl:text-5xl xl:text-3xl text-xl self-center text-right"></span>
                            <span class="brand-text-content italic text-right 2xl:text-lg text-xs col-span-2 self-center text-right xl:whitespace-nowrap whitespace-normal">
                              Unit 3, Uypitching Building<br>Km. 8, Jose Romero Road<br>6215 Valencia, Negros Oriental<br>Philippines
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full 2xl:px-24 xl:px-12 lg:px-8 lg:py-0 p-6 lg:rvmp-bg-main rvmp-bg-alt lg:rvmp-text-main rvmp-text-alt h-1/2">
                <div class="w-full grid grid-cols-1 gap-5 place-content-center h-full">
                    <div class="w-full flex flex-col">
                        <blockquote className="self-end my-2 border-l-8 rvmp-brand-border-main quote">
                            <h2 class="brand-text-header font-bold text-right ml-4 2xl:text-6xl xl:text-4xl text-3xl whitespace-nowrap">Call Us Here</h2>
                        </blockquote> 
                        <span class="self-end brand-text-content my-2 italic 2xl:text-lg  text-xs whitespace-nowrap">having trouble or don't have time? Call Us Any time!</span>
                        <div class="self-end my-2 grid grid-cols-3 sm:gap-x-5 gap-x-3.5 place-content-center">
                            <span class="fas fa-phone-alt rvmp-brand-color-main 2xl:text-5xl xl:text-3xl text-xl self-center text-right"></span>
                            <span class="brand-text-content italic text-right 2xl:text-lg text-xs col-span-2 self-center text-right xl:whitespace-nowrap whitespace-normal">
                               0905-000-0000
                            </span>
                            <span class="fas fa-envelope rvmp-brand-color-main 2xl:text-5xl xl:text-3xl text-xl self-center text-right"></span>
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
     <div  class="h-auto 2xl:px-80 xl:px-56 lg:px-28"  >
        <form action="#" method="POST">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
               <div class="col-span-6 ">
                 <h2 class="brand-text-header font-bold mb-4 2xl:text-6xl xl:text-4xl text-3xl whitespace-nowrap">Get in touch</h2>
                 <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec blandit erat. Proin sed arcu id ligula bibendum pretium. Morbi quis euismod mauris. Phasellus interdum leo metus, vel tristique dui aliquet vel. Integer vitae mauris quam. Vivamus tincidunt dignissim ligula, at pulvinar erat luctus vel. Vestibulum finibus vulputate eros, quis faucibus tortor dapibus vel. Phasellus vestibulum massa vel lorem rutrum, sed ultrices sem gravida. Nullam quis mi magna. Fusce tincidunt massa est, in dictum felis pellentesque mollis. Suspendisse fermentum, velit sed ultricies vulputate, massa ante tempor orci, sed pharetra justo sapien interdum lorem.</p>
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

               <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium text-gray-700">Subject</label>
                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 flex items-start">
                  <div class="flex items-center h-5">
                    <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="comments" class="font-medium text-gray-700">Need an Architect?</label>
                    <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                  </div>
                </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium text-gray-700">Message</label>
                <p class="text-gray-500 text-sm">Tell me about your project (timeline, scope, etc.)</p>
                <textarea name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
              </div>
             
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
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