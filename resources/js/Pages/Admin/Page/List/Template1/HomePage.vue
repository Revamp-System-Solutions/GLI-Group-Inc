<template>
    <errors-and-messages :errors="errors"></errors-and-messages>
    <app-admin-header :current-user="user" @updatePage="onUpdatePage"/>
    
    
    <div class="w-full h-auto relative">
     <div class="py-8 px-8 w-full ">
	
	</div>
    
    <div class="w-full static">
	<app-header /><!-- CHANGE/MAKE ADMIN VIEW -->
	</div>
    <div class="rvmp-container h-full space-y-6 mb-8 ">
        <!-- rvmp-lead-section -->
        <div class="h-auto 2xl:px-40 xl:px-16 lg:px-8" id="rvmp-lead-section-1">
            <div class="flex lg:flex-row flex-col-reverse h-auto z-0 relative">
                <div class="lg:w-2/6 w-full lg:h-3/4 h-full lg:py-32 lg:pl-0 p-6 lg:static absolute lg:bg-transparent rvmp-bg-main lg:bg-opacity-0 bg-opacity-80">
                    <div class="lg:py-36 lg:my-12 lg:static">
                        <div class="lg:rvmp-bg-main lg:bg-opacity-70 lg:absolute lg:top-0 xl:pr-32 lg:pr-28 lg:py-16 lg:my-20 xl:w-2/5 lg:w-1/2 w-full lg:space-y-10 space-y-5">
                        <blockquote className="self-start border-l-8 rvmp-brand-border-highlight lg:my-2 group" id="rvmp-lead-heading">
                            <template  v-if="target ==='lead_text' ">
                                    <div class="relative flex flex-wrap box-border bg-gray-300">
                                    <span class="absolute -top-6 -right-2 space-x-2">
                                        <i class="fas fa-check text-2xl text-blue-400 cursor-pointer  hover:text-blue-700" id="rvmp-lead-text-btn" @click="target=null"></i>
                                        <i class="fas fa-times text-2xl text-red-400 cursor-pointer  hover:text-red-700" id="rvmp-lead-text-btn" @click="target=null"></i>   
                                    </span>
                                        
                                    <textarea v-model="pageSection.lead_banner.lead_text" class="static h-32 resize-none border-dashed border-gray-400 border-2 px-5 brand-text uppercase lg:mt-0 mt-8 xl:text-3xl text-xl font-bold bg-transparent"></textarea>
                
                                    </div>
                            </template>
                            <template  v-else>
                            <div class="relative">
                                <i class="fas fa-pen text-2xl text-blue-400 absolute -top-2 -right-2 cursor-pointer  group-hover:text-blue-700" id="rvmp-lead-text-btn" @click="editTarget('lead_text')"></i>
                                
                                <h1 class="static border-dashed border-gray-400 border-2 px-5 brand-text uppercase cursor-pointer lg:mt-0 mt-8 xl:text-3xl text-xl font-bold group-hover:bg-gray-200" id="rvmp-lead-text" @click="editTarget('lead_text')">
                                    {{pageSection.lead_banner.lead_text}}                                    
                                </h1>
                            </div>
                                
                            </template>
                                
                                
                                
                            </blockquote>
                            <template  v-if="target ==='lead_sub_text' ">
                                    <div class="relative flex flex-wrap box-border bg-gray-300">
                                    <span class="absolute -top-6 -right-2 space-x-2">
                                        <i class="fas fa-check text-2xl text-blue-400 cursor-pointer  hover:text-blue-700" id="rvmp-lead-sub-btn" @click="target=null"></i>
                                        <i class="fas fa-times text-2xl text-red-400 cursor-pointer  hover:text-red-700" id="rvmp-lead-sub-btn" @click="target=null"></i>   
                                    </span>
                                        
                                    <textarea v-model="pageSection.lead_banner.lead_sub_text" class="static h-24 resize-none border-dashed border-gray-400 border-2 w-full font-light italic bg-transparent"></textarea>
                
                                    </div>
                            </template>
                            <template  v-else>
                            <div class="relative group  ">
                                <i class="fas fa-pen text-2xl text-blue-400 absolute -top-2 -right-2 cursor-pointer  group-hover:text-blue-700" id="rvmp-lead-sub-btn" @click="editTarget('lead_sub_text')"></i>
                                
                                
                                <div class="static border-dashed border-gray-400 border cursor-pointer font-light italic lg:mb-10 group-hover:bg-gray-200" id="rvmp-lead-sub-text" @click="editTarget('lead_sub_text')">
                                    {{pageSection.lead_banner.lead_sub_text}} 
                                    
                                </div>
                            </div>
                                
                            </template>
                            <div class="space-x-5 flex lg:justify-start justify-center" id="rvmp-lead-cta">
                                <template  v-if="target ==='lead_btn1'">
                                    <div class="relative group  ">
                                        <span class="absolute -top-6 -right-2 space-x-2">
                                        <i class="fas fa-check text-2xl text-blue-400 cursor-pointer  hover:text-blue-700" id="lead_btn1_save_btn" @click="target=null;targetChangeUrl=false"></i>
                                        <i class="fas fa-times text-2xl text-red-400 cursor-pointer  hover:text-red-700" id="lead_btn1_discard_btn" @click="target=null;targetChangeUrl=false"></i>   
                                    </span>
                                    <textarea v-if="!targetChangeUrl" v-model="pageSection.lead_banner.lead_btn1_text" class="static h-14 resize-none border-dashed border-gray-400 border-2 w-full font-light italic bg-transparent"></textarea>
                                    <textarea v-else v-model="pageSection.lead_banner.lead_btn1_slug" class="static h-14 resize-none border-dashed border-gray-400 border-2 w-full font-light italic bg-transparent"></textarea>
                                    </div>
                                    
                                </template>
                                <template  v-else>
                                    <div class="relative group">
                                        
                                            <span class="absolute -top-3 -right-2 space-x-2">
                                                <i class="fas fa-link text-2xl text-blue-400 cursor-pointer  hover:text-blue-700" id="lead_btn1_slug_btn" @click="editTarget('lead_btn1');targetChangeUrl=true"></i>
                                                    <i class="fas fa-pen text-2xl text-blue-400  cursor-pointer  hover:text-blue-700" id="lead_btn1_btn" @click="editTarget('lead_btn1');targetChangeUrl=false"></i> 
                                            </span>

                                        <p class="static border-dashed border-gray-400 border-2 cursor-pointer rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300"  @click="editTarget('lead_btn1')">{{pageSection.lead_banner.lead_btn1_text}}</p>
                                    </div>
                                </template>
                                <template  v-if="target ==='lead_btn2'">
                                    <div class="relative group  ">
                                        <span class="absolute -top-6 -right-2 space-x-2">
                                            <i class="fas fa-check text-2xl text-blue-400 cursor-pointer  hover:text-blue-700" id="lead_btn1_save_btn" @click="target=null"></i>
                                            <i class="fas fa-times text-2xl text-red-400 cursor-pointer  hover:text-red-700" id="lead_btn1_discard_btn" @click="target=null"></i>   
                                        </span>
                                        <textarea v-if="!targetChangeUrl" v-model="pageSection.lead_banner.lead_btn2_text" class="static h-14 resize-none border-dashed border-gray-400 border-2 w-full font-light italic bg-transparent"></textarea>
                                        <textarea v-else v-model="pageSection.lead_banner.lead_btn2_slug" class="static h-14 resize-none border-dashed border-gray-400 border-2 w-full font-light italic bg-transparent"></textarea>
                                    </div>
                                    
                                </template>
                                <template  v-else>
                                    <div class="relative group  ">
                                            <span class="absolute -top-3 -right-2 space-x-2">
                                                <i class="fas fa-link text-2xl text-blue-400 cursor-pointer  hover:text-blue-700" id="lead_btn1_slug_btn" @click="editTarget('lead_btn2');targetChangeUrl=true"></i>
                                                    <i class="fas fa-pen text-2xl text-blue-400  cursor-pointer  hover:text-blue-700" id="lead_btn1_btn" @click="editTarget('lead_btn2');targetChangeUrl=false"></i> 
                                            </span>
                                    
                                        <p class="static px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300"  @click="editTarget('lead_btn2')">{{pageSection.lead_banner.lead_btn2_text}}</p>
                                    </div>
                                </template>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-4/6 w-full lg:h-auto h-96 static bg-origin-border h-full bg-cover bg-no-repeat bg-center bg-local relative overflow-hidden" :style="bgString"  id="rvmp-lead-image">
             
                <!-- <img :src="pageSection.lead_banner.lead_display_image" class="absolute w-full h-full"> -->
                <div class="w-full h-full bg-gray-400 bg-opacity-40 flex justify-center group hover:bg-opacity-75 items-center">

                    <label for="image" class="p-5 relative cursor-pointer bg-gray-100 rounded-full font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                <span><i class="fas fa-pen text-2xl text-blue-400 cursor-pointer group-hover:text-blue-700 "></i>   </span>
                    <input id="image" name="image" type="file" class="sr-only" @change="selectFile"/>
                        </label>

                </div>
                
                
                
                </div>
            
                <!-- <input type="file" id="image" name="image" class="w-full px-4 py-3 rounded absolute" @change="selectFile"> -->
            </div>
        </div>
        <!-- rvmp-services-section -->
        <div id="rvmp-services-section-1">
            <div class="uppercase text-center" id="rvmp-services-heading">
                <span class="border-b-4 rvmp-brand-border-highlight text-xl font-bold pb-2.5">Here's what we offer</span>
            </div>
            <div class="tab-container mt-10" id="rvmp-services-content">
                <TabGroup  :defaultIndex="0">
                    <TabList :selectedIndex="0" class="flex w-full">
                        <template v-for="(tab, index) in pageSection.services.tabList">
                            <Tab v-slot="{ selected }" :id="tab.tab_service_id" :tabindex="index"
                                class="w-1/3 bg-cover bg-center"  :style="`background-image: url(${tab.image_url})`">
                                <button class="w-full rvmp-brand-bg-main h-52 border-l-2 border-r-2 rvmp-brand-border-accent transition ease-in duration-300"
                                        :class="[selected ? 'text-white bg-opacity-0' : 'text-black bg-opacity-40']">
                                        <div class="w-full transition ease-in duration-300 py-2.5 brand-logo-text"
                                        :class="[selected?'rvmp-brand-bg-darker':'']">
                                <template  v-if="target ===tab.tab_service_id">
                                    <div class="relative box-border">
                                        <span class="absolute -top-6 -right-2 space-x-2">
                                            <i class="fas fa-check text-2xl text-blue-400 cursor-pointer  hover:text-blue-700" id="lead_btn1_save_btn" @click="target=null;targetChangeUrl=false"></i>
                                            <i class="fas fa-times text-2xl text-red-400 cursor-pointer  hover:text-red-700" id="lead_btn1_discard_btn" @click="target=null;targetChangeUrl=false"></i>   
                                        </span>
                                    
                                      
                                    <template v-if="!targetChangeUrl">
                                       <span><input type="text" v-model="tab.title.top" class="text-center border-dashed border-gray-400 border-2 text-4xl font-semibold bg-transparent"></span> 
                                       <span><input type="text" v-model="tab.title.bottom" class="text-center border-dashed border-gray-400 border-2 border-t-0 font-thin bg-transparent"></span> 
                                    </template>
                                    <textarea  v-else v-model="tab.tab_service_id" class="static h-14 resize-none border-dashed border-gray-400 border-2 w-full font-light italic bg-transparent"></textarea>
                                   </div>
                                    
                                </template>
                                <template  v-else>
                                    <div class="relative">
                                        
                                            <span class="absolute -top-4 -right-0 space-x-2">
                                                <i class="fas fa-link text-2xl bg-gray-100 border border-blue-400 rounded-full p-2 text-blue-400 cursor-pointer hover:text-blue-700" id="lead_btn1_slug_btn" @click="editTarget(tab.tab_service_id);targetChangeUrl=true"></i>
                                                <i class="fas fa-pen text-2xl bg-gray-100 border border-blue-400 rounded-full p-2  text-blue-400  cursor-pointer hover:text-blue-700" id="lead_btn1_btn" @click="editTarget(tab.tab_service_id);targetChangeUrl=false"></i> 
                                            </span>

                                            <div class="text-4xl font-semibold">{{tab.title.top}}</div>
                                            <div class="font-thin">{{tab.title.bottom}}</div>
                                    </div>
                                </template>
                                                
                                        </div>
                                </button>
                            </Tab>
                        </template>    
                    </TabList>
                    <TabPanels>
                        <template v-for="(panel, index) in pageSection.services.tabPanels">
                            <TabPanel class="flex lg:flex-row flex-col h-auto text-center lg:m-12 lg:space-x-10">
                                <div class="lg:w-1/2 w-full h-96 lg:block hidden bg-cover bg-no-repeat bg-center bg-local" :style="`background-image: url(${panel.feature_image_url})`"  id="service-feat-image">
                                    <div class="w-full h-full bg-gray-400 bg-opacity-40 flex justify-center group hover:bg-opacity-75 items-center">
                                        
                                        <label :for="`panel-feat-image-${index}`" class="p-5 relative cursor-pointer bg-gray-100 rounded-full font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span><i class="fas fa-pen text-2xl text-blue-400 cursor-pointer group-hover:text-blue-700 "></i></span>
                                        <input :id="`panel-feat-image-${index}`" :name="`panel-feat-image-${index}`" type="file" class="sr-only" @change="selectFile"/>
                                            </label>

                                    </div>
                
                                
                                    
                                </div>
                                <div class="lg:w-1/2 w-full h-auto lg:space-y-10 space-y-5 lg:px-0 px-8 relative border-gray-200 border-2">
                                    <template v-if="target === panel.panel_id">
                                        <span class="absolute -top-6 -right-2 space-x-2">
                                            <i class="fas fa-check text-2xl text-blue-400 cursor-pointer  hover:text-blue-700" id="lead_btn1_save_btn" @click="target=null;targetChangeUrl=false"></i>
                                            <i class="fas fa-times text-2xl text-red-400 cursor-pointer  hover:text-red-700" id="lead_btn1_discard_btn" @click="target=null;targetChangeUrl=false"></i>   
                                        </span>
                                        <ul class="border-l-4 rvmp-brand-border-highlight text-left pl-2.5 lg:mt-0 mt-8  font-bold">
                                                
                                                <li><input type="text" v-model="panel.title.top" class="border-dashed border-gray-400 border-2 font-bold bg-transparent"></li>
                                                
                                                <li><input type="text" v-model="panel.title.bottom" class="border-dashed border-gray-400 border-2 font-bold bg-transparent"></li>
                                            </ul>
                                            <div class="lg:text-3xl text-xl uppercase font-bold text-left">
                                                <span class="">
                                                    <input type="text" v-model="panel.tag_line.top" class="lg:text-3xl text-xl uppercase border-dashed border-gray-400 border-2 font-bold bg-transparent">
                                                </span>
                                                <span class="rvmp-brand-color-highlight">
                                                    <input type="text" v-model="panel.tag_line.bottom" class="rvmp-brand-color-highlight lg:text-3xl text-xl uppercase border-dashed border-gray-400 border-2 font-bold bg-transparent">
                                                </span>
                                            </div>
                                            <p class="text-left 2xl:pl-32 xl:pl-16 lg:pl-8">
                                                    <textarea v-model="panel.desc" class="static h-14 resize-none border-dashed border-gray-400 border-2 w-full font-light italic bg-transparent"></textarea>
                                            </p>
                                            <ul class="text-left grid grid-cols-2 gap-4">                                       
                                                <template v-for="(hl, i) in panel.service_highlights">
                                                <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent flex flex-row justify-start content-center space-x-4">
                                                    <label :for="`service-feature-icon-${index}-${i}`" class="p-4 relative cursor-pointer bg-gray-100 rounded-full font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span><i class="fas fa-pen text-lg text-blue-400 cursor-pointer group-hover:text-blue-700 "></i></span>
                                        <input :id="`service-feature-icon-${index}-${i}`" :name="`service-feature-icon-${index}-${i}`" type="file" class="sr-only" @change="selectFile"/>
                                            </label>
                                                    <img class="w-10 h-10 bg-cover bg-center"  :src="hl.icon_url" /> <span class="self-center"><input type="text" v-model="hl.title" class="border-dashed border-gray-400 border-2 font-normal bg-transparent"></span></li>
                                                </template>
                                            </ul>
                                            <div class="space-x-5 flex lg:justify-start justify-center">
                                                    <div class="">
                                                    <textarea v-if="!targetChangeUrl" v-model="panel.lead_btn1_text" class="static h-14 resize-none border-dashed border-gray-400 border-2 w-full font-light italic bg-transparent"></textarea>
                                                    <textarea v-else v-model="panel.lead_btn1_slug" class="static h-14 resize-none border-dashed border-gray-400 border-2 w-full font-light italic bg-transparent"></textarea>
                                                </div>
                                                <div class="">
                                                
                                                    <textarea v-if="!targetChangeUrl" v-model="panel.lead_btn2_text" class="static h-14 resize-none border-dashed border-gray-400 border-2 w-full font-light italic bg-transparent"></textarea>
                                                    <textarea v-else v-model="panel.lead_btn2_slug" class="static h-14 resize-none border-dashed border-gray-400 border-2 w-full font-light italic bg-transparent"></textarea>
                                                </div>
                                                
                                            </div>
                                    </template>
                                    <template v-else>
                                        
                                                <span class="absolute -top-4 -right-2 space-x-2">
                                                    <!-- <i class="fas fa-link text-2xl bg-gray-100 border border-blue-400 rounded-full p-2 text-blue-400 cursor-pointer hover:text-blue-700" id="lead_btn1_slug_btn" @click="editTarget(panel.panel_id);targetChangeUrl=true"></i> -->
                                                    <i class="fas fa-pen text-2xl bg-gray-100 border border-blue-400 rounded-full p-2  text-blue-400  cursor-pointer hover:text-blue-700" id="lead_btn1_btn" @click="editTarget(panel.panel_id);targetChangeUrl=false"></i> 
                                                </span>
                                    
                                        <ul class="border-l-4 rvmp-brand-border-highlight text-left pl-2.5 lg:mt-0 mt-8  font-bold">
                                            
                                            <li>{{panel.title.top}}</li>
                                            <li>{{panel.title.bottom}}</li>
                                        </ul>
                                        <div class="lg:text-3xl text-xl uppercase font-bold text-left">
                                            <span class="">
                                                {{panel.tag_line.top}}
                                            </span>
                                            <span class="rvmp-brand-color-highlight">
                                                &nbsp;{{panel.tag_line.bottom}}
                                            </span>
                                        </div>
                                        <p class="text-left 2xl:pl-32 xl:pl-16 lg:pl-8">
                                            {{panel.desc}}
                                        </p>
                                        <ul class="text-left grid grid-cols-2 gap-4">                                       
                                            <template v-for="hl in panel.service_highlights">
                                            <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent flex flex-row justify-start content-center space-x-4"><img class="w-10 h-10 bg-cover bg-center"  :src="hl.icon_url" /> <span class="self-center">{{hl.title}}</span></li>
                                            </template>
                                        </ul>
                                        <div class="space-x-5 flex lg:justify-start justify-center">
                                            <a :href="$route('guest.bookfree')" target="_blank" class="rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300">Book a FREE Consultation!</a>
                                            <inertia-link href="/portfolio" class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">Our Portfolio</inertia-link>
                                        </div>
                                        
                                    </template>
                                </div>
                            </TabPanel>
                        </template>
                    </TabPanels>
                </TabGroup>
            </div>
        </div>
    </div>

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
    AppFooterDefault,
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
         pageSection.lead_banner['lead_image'] = null
        //  for()
        $.each(pageSection.services.tabList, function(key, value) {
            pageSection.services.tabList[key]['tab_image'] = null
        });
        $.each(pageSection.services.tabPanels, function(key, value) {
            
            $.each(pageSection.services.tabPanels[key]['service_highlights'], function(key1, value1) {
                pageSection.services.tabPanels[key]['service_highlights'][key1]['icon_image'] = null
            });
        });

        const user = computed(() => usePage().props.value.auth.user);
        //  console.log(user.value) 
        const target = ref(null);
        const targetChangeUrl = ref(false);
        function selectFile($event) {
                        var evt_src = $event.target.id
                      
                        if(evt_src.startsWith("panel"))
                            pageSection.services.tabList[parseInt((evt_src.split('-'))[3])].tab_image = $event.target.files[0];
                        else if(evt_src.startsWith("service-feature")){
                             pageSection.services.tabPanels[parseInt((evt_src.split('-'))[3])].service_highlights[parseInt((evt_src.split('-'))[4])].icon_image = $event.target.files[0];
                             
                        }else
                            pageSection.lead_banner.lead_image = $event.target.files[0];
          
                       
                        var file = $event.target.files[0];
                               
                        var reader = new FileReader();
                        reader.onload = (function(currFile, x, total, evtsrc) {
                     
                            return function(event){
                                
                                if(evtsrc.startsWith("panel")){
                                    pageSection.services.tabList[parseInt((evtsrc.split('-'))[3])].image_url = event.target.result
                                    pageSection.services.tabPanels[parseInt((evtsrc.split('-'))[3])].feature_image_url = event.target.result
                                }else if(evtsrc.startsWith("service-feature")){
                                    pageSection.services.tabPanels[parseInt((evtsrc.split('-'))[3])].service_highlights[parseInt((evtsrc.split('-'))[4])].icon_url = event.target.result
                                }
                                else{
                                    pageSection.lead_banner.lead_display_image = event.target.result
                                }
                        
                            };
                        })(file, 0,$event.target.files.length, evt_src).bind(this);
                        reader.readAsDataURL($event.target.files[0]);
                  
        }

        function postUpdatePage(){
             Inertia.post(route('page.change.save', {'slug':'home'}), pageSection, {
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
