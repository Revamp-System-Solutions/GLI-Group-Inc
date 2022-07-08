<template>
  
    <div class="rvmp-container h-auto">
    <div  class="">
            <div class="w-full flex lg:flex-row flex-col space-x-0 space-y-0 h-full relative" >
                <div class="w-full h-screen px-8 space-y-6 bg-origin-border bg-cover bg-no-repeat bg-center bg-local static" style="background-image: url('/images/pages/section-1.jpg')" >
              
                    <div class="text-center">
                       &nbsp;
                    </div>
                </div>
                <div class="w-full px-4 flex flex-wrap content-center lg:static absolute lg:bg-transparent bg-gray-100 lg:bg-opacity-100 bg-opacity-75 lg:h-auto h-full">
                    <form method="POST" class="grid grid-cols-6 gap-y-3 p-6 rounded-md shadow-2xl w-full bg-gray-50" @submit.prevent="sendMessage()">
                        <div class="col-span-6">
                          <h3 class="text-lg leading-6 mb-0 brand-text rvmp-footer-text capitalize font-semibold text-center">Get started with a <span class="block rvmp-brand-color-highlight">FREE Consultation</span></h3>
                        </div>
                        <div class="col-span-6">
                          <label for="full-name" class="text-sm font-medium rvmp-footer-text capitalize hidden">Full name</label>
                          <input type="text" name="full-name" id="full-name" placeholder="Full name" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full  rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.fullName"/>
                        </div>
                        <div class="col-span-6">
                          <label for="email-address" class="text-sm font-medium rvmp-footer-text capitalize hidden">Email address</label>
                          <input type="email" name="email-address" id="email-address" placeholder="Email Address" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.email"/>
                        </div>
                        <div class="col-span-6">
                          <label for="contact-number" class="text-sm font-medium rvmp-footer-text capitalize hidden">Contact Number</label>
                          <input type="tel" pattern="[0-99999999999]{11}" max="11" name="contact-number" id="contact-number" placeholder="Contact Number" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.contact"/>
                        </div>
                        <div class="col-span-6 ">
                          <label for="project" class="text-sm font-medium rvmp-footer-text capitalize hidden">Type of Project</label>
                              <Listbox v-model="selectedService">
                                <div class="relative mt-1">
                                    <ListboxButton
                                    class="relative w-full py-2 pl-3 pr-10 text-left bg-white rounded-md shadow-sm cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-orange-300 focus-visible:ring-offset-2 focus-visible:border-indigo-500 sm:text-sm border border-gray-300"
                                    >
                                    <span class="block truncate">{{ selectedService.name }}</span>
                                    <span
                                        class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none"
                                    >
                                        <i class="fas fa-chevron-down w-5 h-5 text-gray-400" aria-hidden="true" />
                                    </span>
                                    </ListboxButton>

                                    <transition
                                    leave-active-class="transition duration-100 ease-in"
                                    leave-from-class="opacity-100"
                                    leave-to-class="opacity-0"
                                    >
                                    <ListboxOptions
                                        class="absolute w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                    >
                                        <ListboxOption
                                        v-slot="{ active, selected }"
                                        v-for="service in services"
                                        :key="service.name"
                                        :value="service"
                                        :disabled="service.disabled"
                                        as="template"
                                        >
                                        <li
                                            :class="[
                                            active ?  (service.id===0 ? 'text-gray-400 bg-gray-600':'rvmp-brand-color-darker rvmp-brand-bg-highlight bg-opacity-50') : 'text-gray-900',
                                            'cursor-default select-none relative py-2 pl-10 pr-4',
                                            ]"
                                        >
                                            <span
                                            :class="[
                                                selected ? 'font-medium' : 'font-normal',
                                                'block truncate',
                                            ]"
                                            >{{ service.name }}</span
                                            >
                                            <span
                                            v-if="selected&& service.id!==0"
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 text-amber-600"
                                            >
                                            <i class="fas fa-check w-5 h-5" aria-hidden="true" />
                                            </span>
                                        </li>
                                        </ListboxOption>
                                    </ListboxOptions>
                                    </transition>
                                </div>
                                </Listbox>
                        </div>
                        <div class="col-span-6">
                          <label for="date_needed" class="text-sm font-medium rvmp-footer-text capitalize block">when</label>
                          <input type="date" name="date_needed" id="date_needed" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.bookingDate"/>
                        </div>
                        <div class="col-span-6">
                         
                       <a href="" @click.prevent="openCalendly"  class="text-sm font-medium rvmp-footer-text capitalize block"> Click to Schedule time with our Professionals </a>
                            <div id="calendly-popup" class=""></div>
                        </div>
                        <div class="col-span-6">
                          <label for="message" class="text-sm font-medium rvmp-footer-text capitalize hidden">Message</label>
                          <textarea type="text" name="message" id="message" placeholder="Project Details" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md  shadow-sm sm:text-sm border-gray-300 resize-none" v-model="form.details"></textarea>
                        </div>
                        <div class="col-span-6">
                          <button class="bg-green-600 text-white px-4 py-1.5  hover:bg-green-700 w-full rounded-md  transition ease-in-out duration-300">Book a Meeting</button>
                        </div>
                    </form>
                </div>
            </div>


    </div>

    </div>

</template>

<script>

import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject,ref, reactive} from "vue";
 import {
    Listbox,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
  } from '@headlessui/vue'
import CalendyPlugin from "../Components/Plugins/CalendyPlugin"
export default {
    name: "Home",
    components: {
    ErrorsAndMessages,
    Listbox,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
    CalendyPlugin
},
    props: {
        errors: Object
    },
    methods:{
        makeBG(url){
            return `background-image: url('${url}')`
        },
        openCalendly: ()=>{
            window.Calendly.initPopupWidget({
            url: 'https://calendly.com/rvmpsystemssolution/test-events?hide_event_type_details=1&hide_gdpr_banner=1',
            parentElement: document.getElementById('calendly-popup'),
            prefill: {
                name: 'Alamein',
                email: 'abc@gmaoil.com',
                customAnswers: {
                    a1:'yes'
                } 
            },
            utm: {}
            });
        
        }
    },
    setup() {
         const form = reactive({
            fullName: null,
            email: null,
            contact: null,
            projectType: null,
            bookingDate: null,
            details: null,
            _token: usePage().props.value.csrf_token,
        });

        const route = inject('$route');

       
      
        const services = [
            { id: 0, name: 'Type of Project', disabled: true },
            { id: 1, name: 'Clean gutters', disabled: false },
            { id: 2, name: 'Demolition', disabled: false },
            { id: 3, name: 'Remodeling', disabled: false },
            { id: 4, name: 'Install drywall', disabled: false },
            { id: 5, name: 'Install fan', disabled: false },
            { id: 6, name: 'Install flooring', disabled: false },
            { id: 7, name: 'Install tile work', disabled: false },
            { id: 8, name: 'Install water fixtures', disabled: false },
            { id: 9, name: 'Mount TV', disabled: false },
            { id: 10, name: 'Paint indoors', disabled: false },
            { id: 11, name: 'Paint outdoors', disabled: false },
            { id: 12, name: 'Refurbishment', disabled: false },
            { id: 13, name: 'Repair Flooring', disabled: false },
            { id: 14, name: 'Repair water fixtures', disabled: false },
            { id: 15, name: 'Repair drywall', disabled: false },
            { id: 16, name: 'Repair fan', disabled: false },
            { id: 17, name: 'Repair tile work', disabled: false },
            { id: 18, name: 'Other', disabled: false },
            ]
              const selectedService = ref(services[0])
            function sendMessage() {
                const data = new FormData();

                data.append("formTitle", 'Book a Meeting')
                data.append("fullName", this.form.fullName);
                data.append("email", this.form.email);
                data.append("contact", this.form.contact);
                data.append("projectType", this.selectedService);
                data.append("bookingDate", this.form.bookingDate);
                data.append("details", this.form.details);

                Inertia.post(route("form.submission"), data, {
                    forceFormData: true,
                });
              }
        return {
            form,
            services,
            sendMessage,
            selectedService,
        }
    }
}
</script>
