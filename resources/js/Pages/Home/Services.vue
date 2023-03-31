<template>
   <div id="rvmp-services-section-1">
        <div class="uppercase text-center" id="rvmp-services-heading">
            <span class="border-b-4 rvmp-brand-border-highlight text-xl font-bold pb-2.5">Here's what we offer</span>
        </div>
        <div class="tab-container mt-10" id="rvmp-services-content">
            <TabGroup  :defaultIndex="0">
                <!-- <TabList :selectedIndex="selectedTab" class="flex w-full">
            
                    <Tab v-slot="{ selected }" id="builders"
                        class="w-1/3 bg-cover bg-center"  style="background-image: url('/images/pages/BUILDERS-1.jpg')">
                        <button class="w-full rvmp-brand-bg-main h-52  transition ease-in duration-300"
                                :class="[selected ? 'text-white bg-opacity-0' : 'text-black bg-opacity-40']">
                                <div class="w-full transition ease-in duration-300 py-2.5 brand-logo-text"
                                :class="[selected?'rvmp-brand-bg-darker':'']">
                                        <div class="text-4xl font-semibold">GLI</div>
                                        <div class="font-thin">BUILDERS</div>
                                </div>
                        </button>
                    </Tab>
                    <Tab v-slot="{ selected }" id="designstudio"
                    class="w-1/3  bg-cover bg-center" style="background-image: url('/images/pages/STUDIO.jpg')">
                        <button class="w-full rvmp-brand-bg-main h-52 transition ease-in duration-300"
                        :class="[selected ? 'text-white bg-opacity-0' : 'text-black bg-opacity-40']">
                            <div class="w-full transition ease-in duration-300 py-2.5 brand-logo-text"
                                :class="[selected?'rvmp-brand-bg-darker':'']">
                                <div class="text-4xl font-semibold">GLI</div>
                                <div class="font-thin">DESIGN STUDIO</div>
                            </div>
                        </button>
                    </Tab>
                    <Tab v-slot="{ selected }" id="modularcabinets"
                        class="w-1/3  bg-cover bg-center" style="background-image: url('/images/pages/CABINETS.jpg')">
                        <button class="w-full rvmp-brand-bg-main h-52  transition ease-in duration-300"
                                :class="[selected ? 'text-white bg-opacity-0' : 'text-black bg-opacity-40']">
                            <div class="w-full transition ease-in duration-300 py-2.5 brand-logo-text"
                            :class="[selected?'rvmp-brand-bg-darker':'']">
                                <div class="text-4xl font-semibold">GLI</div>
                                <div class="font-thin">MODULAR CABINETS</div>
                            </div>
                        </button>
                    </Tab>
                </TabList> -->
                <TabList :selectedIndex="0" class="flex w-full">
                        <template v-for="(tab, index) in page_data.tabList">
                            <Tab v-slot="{ selected }" :id="tab.tab_service_id" :tabindex="index"
                                class="w-1/3 bg-cover bg-center"  :style="`background-image: url('${tab.image_url}')`">
                                <button class="w-full rvmp-brand-bg-main h-52 border-l border-r rvmp-brand-border-accent transition ease-in duration-300"
                                        :class="[selected ? 'text-white bg-opacity-0' : 'text-black bg-opacity-40']">
                                        <div class="w-full transition ease-in duration-300 py-2.5 brand-logo-text"
                                        :class="[selected?'rvmp-brand-bg-darker':'']">

                                    <div class="relative">
                                            <div class="text-4xl font-semibold">{{tab.title.top}}</div>
                                            <div class="font-thin">{{tab.title.bottom}}</div>
                                    </div>
                           
                                                
                                        </div>
                                </button>
                            </Tab>
                        </template>    
                    </TabList>
                <TabPanels>
                    <!-- <TabPanel class="flex lg:flex-row flex-col items-center text-center lg:m-12 lg:space-x-10">
                        <div class="lg:w-1/2 w-full lg:block hidden">
                            <img src="/images/pages/BUILDERS-1.jpg">
                        </div>
                        <div class="lg:w-1/2 w-full lg:space-y-10 space-y-5 lg:px-0 px-8">
                                <ul class="border-l-4 rvmp-brand-border-highlight text-left pl-2.5 lg:mt-0 mt-8  font-bold">
                                    <li>Here at GLI Builders</li>
                                    <li>We offer you</li>
                                </ul>
                                <div class="lg:text-3xl text-xl uppercase font-bold text-left">
                                    <span class="">
                                        Better
                                    </span>
                                    <span class="rvmp-brand-color-highlight">
                                        Built
                                    </span>
                                </div>
                                <p class="text-left 2xl:pl-32 xl:pl-16 lg:pl-8">
                                    The Construction Division, caters to new construction, renovation, addition, repair of vertical buildings mainly residential commercial & institutional and other related buildings.
                                </p>
                                <ul class="text-left grid grid-cols-2 gap-4">                                       
                                    <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent flex flex-row justify-start content-center space-x-4"><img class="w-10 h-10 bg-cover bg-center"  src="/rvmp-content/rvmp-static/project.png" /> <span class="self-center">Project Management</span></li>
                                    <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent  flex flex-row justify-start content-center space-x-4"><img class="w-10 h-10 bg-cover bg-center"  src="/rvmp-content/rvmp-static/renovation.png" /> <span class="self-center">Renovations</span></li>
                                    <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent  flex flex-row justify-start content-center space-x-4"><img class="w-10 h-10 bg-cover bg-center"  src="/rvmp-content/rvmp-static/hook.png" /> <span class="self-center">Construction</span></li>
                                
                                </ul>
                                <div class="space-x-5 flex lg:justify-start justify-center">
                                    <a :href="$route('guest.bookfree')" target="_blank" class="rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300">Book a FREE Consultation!</a>
                            <inertia-link href="/portfolio" class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">Our Portfolio</inertia-link>
                                </div>
                        </div>
                    </TabPanel>
                    <TabPanel class="flex lg:flex-row flex-col items-center text-center lg:m-12 lg:space-x-10">
                        <div class="lg:w-1/2 w-full lg:block hidden">
                            <img src="/images/pages/STUDIO.jpg">
                        </div>
                        <div class="lg:w-1/2 w-full lg:space-y-10 space-y-5 lg:px-0 px-8">
                                <ul class="border-l-4 rvmp-brand-border-highlight text-left pl-2.5 lg:mt-0 mt-8  font-bold">
                                    <li>Here at GLI Design Studio</li>
                                    <li>We offer you</li>
                                </ul>
                                <div class="lg:text-3xl text-xl uppercase font-bold text-left">
                                    <span class="">
                                        Architectural & Engineering
                                    </span>
                                    <span class="rvmp-brand-color-highlight">
                                        design
                                    </span>
                                </div>
                                <p class="text-left 2xl:pl-32 xl:pl-16 lg:pl-8">
                                    The Design Division, caters to the Architectural & Engineering design requirements for clients
                                </p>
                                <ul class="text-left grid grid-cols-2 gap-4">                                       
                                    <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent flex flex-row justify-start content-center space-x-4"><img class="w-10 h-10 bg-cover bg-center"  src="/rvmp-content/rvmp-static/interior-design.png" /> <span class="self-center">Planning and Design</span></li>
                                    <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent  flex flex-row justify-start content-center space-x-4"><img class="w-10 h-10 bg-cover bg-center"  src="/rvmp-content/rvmp-static/blueprint.png" /> <span class="self-center">Drafting Services for US and AU clients</span></li>
                                    <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent  flex flex-row justify-start content-center space-x-4"><img class="w-10 h-10 bg-cover bg-center"  src="/rvmp-content/rvmp-static/animation.png" /> <span class="self-center">Animation</span></li>
                                    <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent  flex flex-row justify-start content-center space-x-4"><img class="w-10 h-10 bg-cover bg-center"  src="/rvmp-content/rvmp-static/3d-display.png" /> <span class="self-center">3D Rendering</span></li>
                                    <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent  flex flex-row justify-start content-center space-x-4"><img class="w-10 h-10 bg-cover bg-center"  src="/rvmp-content/rvmp-static/bim.png" /> <span class="self-center">Building Information Modeling (BIM)</span></li>
                                </ul>
                                <div class="space-x-5 flex lg:justify-start justify-center">
                                    <a :href="$route('guest.bookfree')" target="_blank" class="rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300">Book a FREE Consultation!</a>
                            <inertia-link href="/portfolio" class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">Our Portfolio</inertia-link>
                                </div>
                        </div>
                    </TabPanel>
                        <TabPanel class="flex lg:flex-row flex-col items-center text-center lg:m-12 lg:space-x-10">
                        <div class="lg:w-1/2 w-full lg:block hidden">
                            <img src="/images/pages/CABINETS.jpg">
                        </div>
                        <div class="lg:w-1/2 w-full lg:space-y-10 space-y-5 lg:px-0 px-8">
                                <ul class="border-l-4 rvmp-brand-border-highlight text-left pl-2.5 lg:mt-0 mt-8 font-bold">
                                    <li>Here at GLI Modular Cabinets</li>
                                    <li>We offer you</li>
                                </ul>
                                <div class="lg:text-3xl text-xl uppercase font-bold text-left">
                                    <span class="">
                                        tailored
                                    </span>
                                    <span class="rvmp-brand-color-highlight">
                                        structure design
                                    </span>
                                </div>
                                <p class="text-left 2xl:pl-32 xl:pl-16 lg:pl-8">
                                    The Cabinetry Fabrication Division, caters spaces, furnitures, and tailored product structures design.
                                </p>
                                    <ul class="text-left grid grid-cols-2 gap-4">                                       
                                    <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent flex flex-row justify-start content-center space-x-4"><img class="w-10 h-10 bg-cover bg-center"  src="/rvmp-content/rvmp-static/kitchen.png" /> <span class="self-center">Modular Cabinets Installation</span></li>
                                </ul>
                                <div class="space-x-5 flex lg:justify-start justify-center">
                                    <a :href="$route('guest.bookfree')" target="_blank" class="rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300">Book a FREE Consultation!</a>
                            <inertia-link href="/portfolio" class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">Our Portfolio</inertia-link>
                                </div>
                        </div>
                    </TabPanel> -->
                     <template v-for="(panel, index) in page_data.tabPanels">
                            <TabPanel class="flex lg:flex-row flex-col h-auto text-center lg:m-12 lg:space-x-10">
                                <div class="lg:w-1/2 w-full h-96 lg:block hidden bg-cover bg-no-repeat bg-center bg-local" :style="`background-image: url('${panel.feature_image_url}')`"  id="service-feat-image">
                                                 
                                </div>
                                <div class="lg:w-1/2 w-full h-auto lg:space-y-10 space-y-5 lg:px-4 lg:py-4 px-8 relative bg-gray-300 bg-opacity-60">
                                   
                              
                                                
                                    
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
                                        <ul class="text-left grid md:grid-cols-2 grid-cols-1 gap-4">                                       
                                            <template v-for="hl in panel.service_highlights">
                                            <li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent flex md:flex-row flex-col md:justify-start justify-center content-center md:space-x-4"><img class="w-10 h-10 bg-cover bg-center self-center"  :src="hl.icon_url" /><span class="self-center">{{hl.title}}</span></li>
                                            </template>
                                        </ul>
                                        <div class="space-x-5 flex lg:justify-start justify-center">
                                            <a :href="$route('guest.bookfree')" target="_blank" class="rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300">Book a FREE Consultation!</a>
                                            <inertia-link href="/portfolio" class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">Our Portfolio</inertia-link>
                                        </div>
                                        
                                    
                                </div>
                            </TabPanel>
                        </template>
                </TabPanels>
            </TabGroup>
        </div>
    </div>
</template>
<script>
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
import {usePage} from "@inertiajs/inertia-vue3";
import {computed,ref} from "vue";

export default {
    name: "Services",
    components: {
        TabGroup,TabList, Tab, TabPanels, TabPanel
    },
    props: ['url', 'servicesData'],
    setup(props, {}) {
        let uri = props.url
        let index = 0;
        if(uri.includes('#builders')){
            index = 0
        }else if(uri.includes('#designstudio')){
             index = 1
        }else if(uri.includes('#modularcabinets')){
             index = 2
        }
        const selectedTab = ref(index)

        function changeTab(index) {
            selectedTab.value = index
        }
        const page_data = props.servicesData
        console.log(page_data)
  return{
    page_data,
    selectedTab,
    changeTab
  }
      
	}
}
</script>