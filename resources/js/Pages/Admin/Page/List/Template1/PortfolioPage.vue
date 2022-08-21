<template>
    <errors-and-messages :errors="errors"></errors-and-messages>
    <app-admin-header :current-user="user" @updatePage="onUpdatePage"/>
    
    
    <div class="w-full h-auto relative">
     <div class="py-8 px-8 w-full ">
	
	</div>
    
    <div class="w-full static">
	<app-header /><!-- CHANGE/MAKE ADMIN VIEW -->
	</div>
    <div class="rvmp-container h-full space-y-6 mb-8">
        <div class="w-full bg-origin-border bg-cover bg-center bg-local" :style="`background-image: url('${pageSection.head_banner.img_url}')`">
            <div class="h-40 mx-auto 2xl:px-40 xl:px-16 px-8 flex lg:flex-wrap lg:content-center justify-center rvmp-banner-bg bg-opacity-80 relative">
                 <span class="absolute  bottom-0 right-0 ">
                        <label for="image-hb" class="p-5 relative cursor-pointer bg-gray-100 rounded-full font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span><i class="fas fa-file-image text-2xl text-blue-400 cursor-pointer group-hover:text-blue-700 "></i>   </span>
                            <input id="image-hb" name="image-hb" type="file" class="sr-only" @change="selectFile"/>
                        </label>
                </span>
                <div class="lg:w-full lg:self-start self-center">
                   <template v-if="target === 'head_banner'">
                    <div class="relative flex flex-wrap box-border bg-gray-300">
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
                        v-model="pageSection.head_banner.text"
                        class="
                        static
                        h-14
                        w-full
                        resize-none
                        border-gray-400 border-2
                        px-5
                        brand-text
                        uppercase
                        lg:mt-0
                        mt-8
                        xl:text-3xl
                        text-xl
                        font-bold
                        bg-transparent
                        "
                    ></textarea>
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
                        id="about-lead-text-btn"
                        @click="editTarget('head_banner')"
                    ></i>

                    <h1
                        class="
                        static
                        border-gray-400 border-2
                        px-5
                        brand-text
                        capitalize
                        cursor-pointer
                        lg:mt-0
                        mt-8
                        xl:text-3xl
                        text-xl
                        font-bold
                        group-hover:bg-gray-200
                        rvmp-banner-text-color
                        "
                        id="about-lead-text"
                        @click="editTarget('head_banner')"
                    >
                        {{ pageSection.head_banner.text }}
                    </h1>
            </div>
          </template>
                </div>
            </div>
        </div>
            <div class="max-w-2xl mx-auto  px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8 bg-transparent">
                          <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8">
                            <template  v-for="(post) in posts.data" :key="post.id" >
                              <span @click="openModal();selectedPost=post" class="group cursor-pointer">
                                <div class="w-full aspect-w-1 aspect-h-1 overflow-hidden xl:aspect-w-7 xl:aspect-h-8 shadow-lg bg-white rounded-md h-18">
                                <div class="w-full h-96"><img :src="`/rvmp-content/rvmp-uploads/${JSON.parse(post.images)[0]}`" :alt="post.title" class="w-full h-full object-center object-cover group-hover:opacity-75" /></div>
                                </div>
                                <h3 class="mt-4 text-sm text-gray-700">
                                  {{ post.title }}  
                                </h3>
                              </span>
                            </template>
                          </div>
                          <!-- Pagination links-->
                          <nav class="w-20" aria-label="Page navigation" v-if="posts.total > posts.per_page" style="margin-top: 20px">
                              <ul class="pagination flex flex-row justify-between space-x-2">
                                  <!-- Previous link -->                                
                                  <li v-if="posts.links[1].active != true" :class="'page-item' + (posts.links[0].url == null ? ' disabled' : '')">
                                      <inertia-link :href="posts.links[0].url == null ? '#' : posts.links[0].url" class="page-link" v-html="posts.links[0].label"></inertia-link>
                                  </li>
                                  
                                  <!-- Numbers -->
                                  <li v-for="item in numberLinks"  :class="'page-item ' + (item.active ? 'rvmp-brand-color-main font-bold text-lg' : 'rvmp-brand-color-darker font-semibold text-base')" :key="item">
                                      <inertia-link :href="item.active ? '#' : item.url" class="page-link" v-html="item.label"></inertia-link>
                                  </li>

                                  <!-- Next link -->
                                  <li v-if="posts.current_page != posts.last_page"  :class="'page-item' + (posts.links[posts.links.length - 1].url == null ? ' disabled' : '')">
                                      <inertia-link :href="posts.links[posts.links.length - 1].url == null ? '#' : posts.links[posts.links.length - 1].url" class="page-link" v-html="posts.links[posts.links.length - 1].label"></inertia-link>
                                  </li>
                              </ul>
                          </nav>
                      </div>
    </div>
    <app-footer-contact-form />
    <TransitionRoot appear :show="isOpen">
    <Dialog as="div" @close="closeModal">
      <div class="fixed inset-0 z-50 overflow-y-auto bg-gray-600 bg-opacity-30 ">
        <div class="min-h-screen px-4 text-center">
          <TransitionChild  
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0">
            <DialogOverlay class="fixed inset-0" />
          </TransitionChild>
          <span class="inline-block h-full align-middle" aria-hidden="true">
            &#8203;
          </span>
          <TransitionChild
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95">
   
            <div class="inline-block w-full h-auto text-left align-middle transition-all transform bg-white shadow-xl rounded-md">              
              <div class="p-8 grid lg:grid-cols-6 grid-cols-1 space-x-5">
                  <div class="lg:col-span-4 col-span-1 mt-6 grid grid-cols-1 gap-8 px-8">
                    <div class="aspect-w-2 aspect-h-3 rounded-md overflow-hidden shadow-md">
                      <img :src="`/rvmp-content/rvmp-uploads/${JSON.parse(selectedPost.images)[0]}`" class="w-full h-full object-center object-cover" />
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                      <div class="aspect-w-3 aspect-h-2 rounded-md overflow-hidden shadow-md">
                        <img :src="`/rvmp-content/rvmp-uploads/${JSON.parse(selectedPost.images)[1]}`" class="w-full h-full object-center object-cover" />
                      </div>
                      <div class="aspect-w-3 aspect-h-2 rounded-md overflow-hidden shadow-md">
                        <img :src="`/rvmp-content/rvmp-uploads/${JSON.parse(selectedPost.images)[2]}`" class="w-full h-full object-center object-cover" />
                      </div>
                       <template v-for="index in Object.keys(JSON.parse(selectedPost.images)).length-1" :key="index" >
                        <div class="aspect-w-3 aspect-h-2 rounded-md overflow-hidden shadow-md" v-if="index>=3">
                          <img :src="`/rvmp-content/rvmp-uploads/${JSON.parse(selectedPost.images)[index]}`" class="w-full h-full object-center object-cover" />
                        </div>
                       </template>
                    </div>

                  </div>
                  <div class="lg:col-span-2 col-span-1 mt-6">
                      <div class="w-full lg:space-y-10 space-y-3 lg:px-0">
                            <ul class="border-l-4 rvmp-brand-border-highlight brand-logo-text text-xl text-left pl-2.5 font-semibold">
                                <li>{{selectedPost.category_name}}</li>
                            </ul>
                            <div class="lg:text-3xl text-xl uppercase brand-text font-bold text-left" v-html="selectedPost.styled_title"></div>
                            <div class="text-left px-8" v-html="selectedPost.content"></div>
                      </div>
                  </div>
              </div>
            </div>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>

    <app-footer-default/>
    </div>
</template>

<script>

import AppHeader from "./../../../../../Partials/AppHeader";
import AppAdminHeader from "./../../../../../Partials/AppAdminHeader";
import AppFooterDefault from "./../../../../../Partials/AppFooterDefault";
import ErrorsAndMessages from "./../../../../../Partials/ErrorsAndMessages";
import { usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed, inject, ref, reactive} from "vue";
import { TransitionRoot, TransitionChild, Dialog, DialogOverlay, DialogTitle, TabGroup, TabList, Tab, TabPanels, TabPanel} from '@headlessui/vue'

//sections import
// import LeadBanner from "./LeadBanner";
// import Services from './Services';
// import Testimonial from './Testimonial';


export default {
    name: "PortfolioPage",
    components: {
    ErrorsAndMessages,
    AppHeader,
    AppAdminHeader,
    AppFooterDefault,
      TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
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
      pageSection.head_banner.image = null
   

        //  for()
      
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
             Inertia.post(route('page.change.save', {'slug':'portfolio'}), pageSection, {
                forceFormData: true,
            });
        }
         const isOpen = ref(false)

        const posts = computed(() => usePage().props.value.posts.portfolio);
         const numberLinks = posts.value.links.filter((v, i) => i > 0 && i < posts.value.links.length - 1);
         const selectedPost = ref(null)
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
			},
            isOpen,
            closeModal() {
                isOpen.value = false             
            },
            openModal() {
                isOpen.value = true
        
            },
            posts,
            numberLinks,
            selectedPost
		};
	},
    methods:{
         onUpdatePage() {
            this.postUpdatePage()
        },
    },
    computed:{
        bgString(){
           return `background-image: url('${this.pageSection.head.img_url}')`
        }
    }
}
</script>
