<template>
     <errors-and-messages :errors="errors"></errors-and-messages>
    <app-admin-header :current-user="user" @updatePage="onUpdatePage"/>
            
      
    <div class="rvmp-container h-auto relative">
    
          
    <div  class="">
      <div id="calendly-popup" class=""></div>
            <div class="w-full flex lg:flex-row flex-col space-x-0 space-y-0 h-full relative" >
                <div class="w-full h-screen space-y-6 bg-origin-border bg-cover bg-no-repeat bg-center bg-local static" :style="`background-image: url('${pageSection.img_url}')`" >
              
                      <div class="px-8 w-full h-full bg-gray-400 bg-opacity-40 flex justify-center group hover:bg-opacity-75 items-center">

                    <label for="image" class="p-5 relative cursor-pointer bg-gray-100 rounded-full font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                <span><i class="fas fa-pen text-2xl text-blue-400 cursor-pointer group-hover:text-blue-700 "></i>   </span>
                    <input id="image" name="image" type="file" class="sr-only" @change="selectFile"/>
                        </label>

                </div>
                
                </div>
                <div class="w-full px-4 flex flex-wrap content-center lg:static absolute lg:bg-transparent bg-gray-100 lg:bg-opacity-100 bg-opacity-75 lg:h-auto h-full">
                    <form method="POST" class="grid grid-cols-6 gap-y-3 p-6 rounded-md shadow-2xl w-full bg-gray-50" @submit.prevent="">
                        <div class="col-span-6">
                            <template v-if="target === 'form_title'">
            <div class="relative flex flex-col justify-center items-center mt-5">
              <span class="absolute -top-4 -right-2 space-x-2">
                <i
                  class="
                    fas
                    fa-check
                    text-2xl text-blue-400
                    cursor-pointer
                    hover:text-blue-700
                  "
                  id="contact-follow-text-btn"
                  @click="target = null"
                ></i>
                <!-- <i
                  class="
                    fas
                    fa-times
                    text-2xl text-red-400
                    cursor-pointer
                    hover:text-red-700
                  "
                  id="contact-follow-text-btn"
                  @click="target = null"
                ></i> -->
              </span>
                
              <input type="text" class=" text-lg leading-6 mb-0 brand-text rvmp-footer-text capitalize font-semibold text-center" v-model="pageSection.contact_form.title.top" @keydown.enter.prevent="">
              <input type="text" class="text-lg leading-6 mb-0 brand-text rvmp-brand-color-highlight capitalize font-semibold text-center" v-model="pageSection.contact_form.title.bottom" @keydown.enter.prevent="">
              
              <!-- <textarea
                v-model="pageSection.contact_form.title.top"
                class="
                  static
                  h-12
                  w-full
                  text-center
                  resize-none
                  border-2
                  px-5
                 
                  lg:mt-0
                  mt-8
                 text-3xl
                  font-semibold
                  leading-6
                  mb-2
                  brand-text
                  rvmp-footer-text
                  capitalize
                  bg-transparent
                "
              ></textarea> -->
            </div>
          </template>
                            <template v-else>
                                <div class="relative">
                                    <i
                                        class="
                                        fas
                                        fa-pen
                                        text-2xl text-blue-400
                                        absolute
                                        -top-2
                                        -right-2
                                        cursor-pointer
                                        group-hover:text-blue-700
                                        "
                                        id="contact-follow-text-btn"
                                    @click="editTarget('form_title')"
                                    ></i>

                                    <h3 class="text-lg leading-6 mb-0 brand-text rvmp-footer-text capitalize font-semibold text-center">
                                        {{pageSection.contact_form.title.top}} 
                                        <span class="block rvmp-brand-color-highlight"> {{pageSection.contact_form.title.bottom}}</span>
                                    </h3>
                                </div>
                            </template>

                        </div>
                        <div class="col-span-6">
                          <label for="full-name" class="text-sm font-medium rvmp-footer-text capitalize hidden">Full name</label>
                          <input disabled type="text" name="full-name" id="full-name" placeholder="Full name" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full  rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.fullName"/>
                        </div>
                        <div class="col-span-6">
                          <label for="email-address" class="text-sm font-medium rvmp-footer-text capitalize hidden">Email address</label>
                          <input disabled type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required name="email-address" id="email-address" placeholder="Email Address" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.email"/>
                        </div>
                        <div class="col-span-6">
                          <label for="contact-number" class="text-sm font-medium rvmp-footer-text capitalize hidden">Contact Number</label>
                          <input disabled type="tel" pattern="[9000000000-9999999999]{10}" min="10" max="10" name="contact-number" id="contact-number" placeholder="Contact Number e.g. 9123456789" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.contact"/>
                        </div>
                        <div class="col-span-6 ">
                          <label for="project" class="text-sm font-medium rvmp-footer-text capitalize hidden">Type of Project</label>
                              <Listbox v-model="selectedService" disabled>
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
                        <div class="col-span-6 hidden">
                          <label for="date_needed" class="text-sm font-medium rvmp-footer-text capitalize block">when</label>
                          <input type="date" name="date_needed" id="date_needed" disabled autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.bookingDate"/>
                        </div>
                        <!-- <div class="col-span-6">
                         
                       <a href="" @click.prevent="openCalendly"  class="text-sm font-medium rvmp-footer-text capitalize block"> Click to Schedule time with our Professionals </a>
                            
                        </div> -->
                        <div class="col-span-6">
                          <label for="message" class="text-sm font-medium rvmp-footer-text capitalize hidden">Message</label>
                          <textarea disabled type="text" name="message" id="message" placeholder="Project Details" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md  shadow-sm sm:text-sm border-gray-300 resize-none" v-model="form.details"></textarea>
                        </div>
                        <div class="col-span-6">
                          <button disabled class="bg-green-600 text-white px-4 py-1.5  hover:bg-green-700 w-full rounded-md  transition ease-in-out duration-300">Book a Meeting</button>
                        </div>
                    </form>
                </div>
            </div>


    </div>

    </div>

</template>

<script>
import AppAdminHeader from "./../../../../../Partials/AppAdminHeader";
import ErrorsAndMessages from "./../../../../../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject,ref, reactive} from "vue";
 import {
    Listbox,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
  } from '@headlessui/vue'
import CalendyPlugin from "./../../../../../Components/Plugins/CalendyPlugin"
export default {
    name: "BookFreePage",
    components: {
    ErrorsAndMessages,
    Listbox,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
    CalendyPlugin,
    AppAdminHeader
},
    props: {
        errors: Object
    },
    mounted(){
        function isCalendlyEvent(e) {
  return e.origin === "https://calendly.com" && e.data.event && e.data.event.indexOf("calendly.") === 0;
};
 
window.addEventListener("message", function(e) {
  if(isCalendlyEvent(e)) {
    /* Example to get the payload of the event */
    console.log("Event details:", e.data.payload);
  }
});
    },
    methods:{
        makeBG(url){
            return `background-image: url('${url}')`
        },
        // openCalendly: ()=>{
          
        // }
    },
    setup() {
   const page_data = computed(() => usePage().props.value.page.data);
      const data = JSON.parse(page_data.value.page_content)
      const pageSection = reactive(data);
      pageSection.image = null

    const form = reactive({
        fullName: null,
        email: null,
        contact: null,
        projectType: null,
        bookingDate: null,
        details: null,
        _token: usePage().props.value.csrf_token,
    });
    const target = ref(null)
    const route = inject('$route');
    const user = computed(() => usePage().props.value.auth.user);
       
      
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
                data.append("projectType", this.selectedService.name);
                data.append("bookingDate", this.form.bookingDate);
                data.append("details", this.form.details);

                Inertia.post(route("form.submission"), data, {
                    forceFormData: true,
                });
              }
                function openCalendly() {

                        // this.sendMessage()
                        window.Calendly.initPopupWidget({
                        url: 'https://calendly.com/gli-group-inc/free-consultation?hide_event_type_details=1&hide_gdpr_banner=1',
                        parentElement: document.getElementById('calendly-popup'),
                        prefill: {
                            name: this.form.fullName,
                            email: this.form.email,
                            customAnswers: {
                                a1:'+63'+this.form.contact,
                                a2: this.selectedService.name,
                                a3: this.form.details
                            } 
                        },
                        utm: {}
                        });
                    
                }

                function selectFile($event) { 
                        var file = $event.target.files[0];
                         pageSection.image = file      
                        var reader = new FileReader();
                        reader.onload = (function(currFile, x, total) {
                     
                            return function(event){

                                    pageSection.img_url = event.target.result
                        
                            };
                        })(file, 0,$event.target.files.length).bind(this);
                        reader.readAsDataURL($event.target.files[0]);
                }

                function postUpdatePage(){
                    Inertia.post(route('page.change.save', {'slug':'book-free'}), pageSection, {
                        forceFormData: true,
                    });
                }
        return {
            user,
            form,
            services,
            pageSection,
            selectFile,
             editTarget(data){
              // console.log(target.value)
              target.value = data
              // console.log('new '+target.value)
          },
            sendMessage,
            openCalendly,
            postUpdatePage,
            target,
            selectedService,
        }
    },
  methods: {
     onUpdatePage() {
            this.postUpdatePage()
        },
  },
}
</script>