<template>
    <errors-and-messages :errors="errors"></errors-and-messages>
    <app-admin-header :current-user="user" @updatePage="onUpdatePage"/>
    
    
    <div class="w-full h-auto relative">
     <div class="py-8 px-8 w-full ">
	
	</div>
    
    <div class="w-full w-full text-black antialiased flex flex-col  items-center  max-h-full h-screen">
      
     
        <img
          class="max-w-xs w-28"
          src="/images/brand-logo-small.png"
          alt="Revamp Logo"
          style=""
        />
    
    
        <h1 class="font-bold md:text-8xl text-4xl ">THANK YOU!</h1>
     
   
       <img
          src="/images/smiley.png"
          alt="Smiley face"
          class="lg:m-2 md:h-auto h-32"
          style=""
        />
  


  <span class="h-full w-full flex flex-col justify-center items-center">  
    <template v-if="target === 'ty_msg'">
             <div class="relative flex max-w-max bg-gray-300 ">
                    <span class="absolute -top-6 -right-2 space-x-2">
                        <i
                        class="
                            fas
                            fa-check
                            text-2xl text-blue-400
                            cursor-pointer
                            hover:text-blue-700
                        "
                        id="about-lead-text-btn"
                        @click="target = null"
                        ></i>
                        <i
                        class="
                            fas
                            fa-times
                            text-2xl text-red-400
                            cursor-pointer
                            hover:text-red-700
                        "
                        id="about-lead-text-btn"
                        @click="target = null"
                        ></i>
                    </span>
                    <textarea
                        v-model="pageSection.thank_u_msg"
                        class="
                        static
                        h-14
                        w-full
                        resize-none
                        border-gray-400 border-2
                        px-5
                        
                        lg:mt-0
                        mt-8
                        
                        bg-transparent
                        "
                    ></textarea>
                    </div>
                </template>
                <template v-else>
                    <div class="relative max-w-max flex justify-center">
                    <i
                        class="
                        fas
                        fa-pen
                        text-2xl text-blue-400
                        absolute
                        -top-4
                        -right-2
                        cursor-pointer
                        group-hover:text-blue-700
                        "
                        id="about-lead-text-btn"
                        @click="editTarget('ty_msg')"
                    ></i>
 
                    <p class="m-1 text-center"  @click="editTarget('ty_msg')">
                        {{pageSection.thank_u_msg}}
                        </p>
                       </div>
          </template>    
      
      <p class="m-1 text-center">You will be automatically redirected to the homepage.</p>
  </span>
       
       <app-footer-small />
    </div>
    </div>
</template>

<script>

import AppHeader from "./../../../../../Partials/AppHeader";
import AppAdminHeader from "./../../../../../Partials/AppAdminHeader";
import AppFooterSmall from "./../../../../../Partials/AppFooterSmall";
import ErrorsAndMessages from "./../../../../../Partials/ErrorsAndMessages";
import { usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed, inject, ref, reactive} from "vue";
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'

//sections import
// import LeadBanner from "./LeadBanner";
// import Services from './Services';
// import Testimonial from './Testimonial';


export default {
    name: "HomeAdmin",
    components: {
    ErrorsAndMessages,
    AppHeader,
    AppAdminHeader,
    AppFooterSmall,
    TabGroup,
    TabList,
    Tab,
    TabPanels,
    TabPanel,
    // LeadBanner,
    // Services,
    // Testimonial,
},
    props: {
        errors: Object,
        carouselSettings: {
                Type: Object,
                default: null
            },
        carouselBreakpoints: {
                Type: Object,
                default: null
            },
        carouselTestimonials: {
                Type: Object,
                default: null
            },
        currentUser: {
                Type: Object,
                default: null
            }, 
   },
    setup() {
        const page_data = computed(() => usePage().props.value.page.data);
        const data = JSON.parse(page_data.value.page_content)
      
        const pageSection = reactive(data);
        //  pageSection.lead_banner['lead_image'] = null
        // //  for()
        // $.each(pageSection.services.tabList, function(key, value) {
        //     pageSection.services.tabList[key]['tab_image'] = null
        // });
        // $.each(pageSection.services.tabPanels, function(key, value) {
            
        //     $.each(pageSection.services.tabPanels[key]['service_highlights'], function(key1, value1) {
        //         pageSection.services.tabPanels[key]['service_highlights'][key1]['icon_image'] = null
        //     });
        // });

        const user = computed(() => usePage().props.value.auth.user);
        //  console.log(user.value) 
        const target = ref(null);
        const targetChangeUrl = ref(false);
            function selectFile($event) {
                       
                        var file = $event.target.files[0];
                        pageSection.head_banner.image = file
                        var reader = new FileReader();
                        reader.onload = (function(currFile, x, total) {
                     
                            return function(event){
                                
                                    pageSection.head_banner.img_url = event.target.result
                        
                            };
                        })(file, 0,$event.target.files.length).bind(this);
                        reader.readAsDataURL($event.target.files[0]);
                  
        }

        function postUpdatePage(){
             Inertia.post(route('page.change.save', {'slug':'thank-you'}), pageSection, {
                forceFormData: true,
            });
        }
		return {
            user,
			pageSection,
            target,
            targetChangeUrl,
            editTarget(data){
                // console.log(target.value)
                target.value = data
                // console.log('new '+target.value)
            },
            selectFile,
            postUpdatePage,
			settings: {
				itemsToShow: 1,
				snapAlign: "center",
			},
			breakpoints: {
				// md
				768: {
					itemsToShow: 1.95,
					snapAlign: "center-odd",

				},
				// lg
				1024: {
					itemsToShow: 2.95,
					snapAlign: "center-odd",

				},
                //custom
                1440: {
					itemsToShow: 3.95,
					snapAlign: "center-odd",

				}
			}
		};
	},
    methods:{
         onUpdatePage() {
            this.postUpdatePage()
        },
    },
    computed:{
        bgString(){
           return `background-image: url('${this.pageSection.lead_banner.lead_display_image}')`
        }
    }
}
</script>
