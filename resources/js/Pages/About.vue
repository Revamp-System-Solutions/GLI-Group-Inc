<template>
    <app-header></app-header>
   <div class="rvmp-container h-auto space-y-0">
        <div class="w-full bg-origin-border bg-cover bg-center bg-local" :style="`background-image: url('${page_content.head_banner.img_url}')`">
            <div class="h-40 mx-auto 2xl:px-40 xl:px-16 px-8 flex lg:flex-wrap lg:content-center justify-center rvmp-banner-bg bg-opacity-80">
                <div class="lg:w-full lg:self-start self-center">
                    <h1 class="px-5 brand-text xl:text-3xl text-xl font-bold rvmp-banner-text-color capitalize">{{page_content.head_banner.text}}.</h1>
                </div>
            </div>
        </div>
    <div  class="h-auto 2xl:px-64 xl:px-56 lg:px-24">
        <div class="flex lg:flex-row flex-col-reverse h-auto z-0 relative">
            <div class="w-full h-2/3 lg:py-12 lg:pl-0 p-6 static" >
                <div class="lg:py-36 lg:my-12 static">
                    <div class="rvmp-bg-alt bg-opacity-75 box-border lg:absolute lg:top-0 xl:px-16 lg:pr-28 lg:py-16 lg:my-20  lg:w-7/12  w-full -left-24 xl:ml-0 lg:ml-12">  
                       <blockquote className="self-start border-l-8 rvmp-brand-border-highlight my-2">
                            <h2 class="ml-5 brand-text lg:text-3xl text-xl font-semibold"></h2>
                            <h2 class="ml-5 brand-logo-text text-3xl font-semibold">{{page_content.about_title.top}} <span class="brand-logo-text font-thin rvmp-brand-color-highlight">{{page_content.about_title.bottom}}</span></h2> 
                        </blockquote>
                        <p class="text-justify 2xl:text-lg text-sm brand-text font-light lg:pr-3" >{{page_content.about_caption}}</p> 
                    </div>            
                </div>               
            </div>
            <div class="w-full z-30 lg:h-auto lg:overflow-auto overflow-hidden static flex flex-wrap content-center justify-center xl:mr-0 lg:-mr-12"  >
                <YouTube 
                    
                    :src="page_content.video_url" 
                    
                    width="560"
                        height="314"
                    ref="youtube" />

                 <!-- <YouTube 
                   
                    :src="page_content.video_url" 
                    
                    width="375"
                    height="210"
                    ref="youtube" /> -->
            </div>
        </div>
    </div>
    <div class="h-auto w-full bg-transparent">
            <div class="flex lg:flex-row flex-col bg-cover bg-no-repeat bg-top bg-local " :style="`background-image: url('${page_content.banner.img_url}')`">
                <div class="w-full py-14 h-auto rvmp-banner-bg bg-opacity-70" >
                    <div class="h-44 text-center mt-auto w-full flex flex-col justify-center items-center rvmp-banner-text-color bg-transparent">
                        <h2 class="brand-logo-text lg:text-3xl text-xl py-2 uppercase"><span class="brand-logo-text" id="client-brand"><span class="font-semibold">{{page_content.banner.top}}</span> <span class="font-thin">{{page_content.banner.bottom}}</span></span></h2>   
                        <h2 class="brand-text lg:text-5xl text-xl font-light capitalize" v-html="page_content.banner.caption"></h2>
                         <a :href="page_content.banner.btn.slug" target="_blank" class="rvmp-brand-bg-main mt-5 text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300">{{page_content.banner.btn.text}}</a>
                    </div> 
                </div>
            </div>
    </div>
    <!-- <div  class="h-auto 2xl:px-80 xl:px-56 lg:px-28 rvmp-bg-main">
        <div class="flex lg:flex-row-reverse flex-col h-auto relative">
            <div class="w-full lg:h-2/3 h-full lg:py-20 lg:pl-10 lg:pr-0 p-6 lg:static absolute lg:bg-transparent rvmp-bg-alt lg:bg-opacity-0 bg-opacity-80">            
                    <div class="w-full h-full lg:static grid grid-cols-1 place-content-center">  
                        <div class="col-span-1 mb-4 text-3xl uppercase lg:text-left text-center">
                            <h2 class="brand-text font-light lg:block inline-block lg:mr-0 mr-2">OUR COMPANY'S</h2>
                            <h2 class="brand-text font-semibold rvmp-brand-color-highlight lg:block inline-block">MISSION</h2>  
                        </div>               
                        <p class="col-span-1 font-light text-justify 2xl:text-lg lg:text-sm text-xs brand-text ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque egestas nec ipsum ac mollis. Duis at lorem sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur felis lacus, venenatis non maximus vitae, laoreet sit amet risus. Vivamus id ex magna. Vestibulum nibh elit, vestibulum ac mauris a, ornare sodales lorem. Aenean turpis velit, hendrerit eget dui sed, accumsan molestie libero. Donec sapien magna, egestas vel congue vel, accumsan et erat. Etiam nisi odio, pretium sit amet nunc at, dapibus vehicula augue.</p> 
                    </div>                       
            </div>
            <div class="w-full lg:h-auto lg:py-10 lg:pr-10">
                <div class="w-full lg:h-full h-96 bg-origin-border bg-cover bg-no-repeat bg-center bg-local" style="background-image: url('/images/pages/mission.jpg')">
                        &nbsp;
                </div>    
            </div>
        </div>
    </div>
    <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28 rvmp-bg-alt">
         <div class="flex lg:flex-row flex-col h-auto relative">
            <div class="w-full lg:h-2/3 h-full lg:py-20 lg:pl-10 lg:pr-0 p-6 lg:static absolute lg:bg-transparent rvmp-bg-main lg:bg-opacity-0 bg-opacity-80">            
                    <div class="w-full h-full lg:static grid grid-cols-1 place-content-center"> 
                        <div class="col-span-1 mb-4 text-3xl uppercase lg:text-left text-center">
                            <h2 class="brand-text font-light  lg:block inline-block mr-2">OUR COMPANY'S</h2>
                            <h2 class="brand-text font-semibold rvmp-brand-color-highlight lg:block inline-block">Vision</h2>  
                        </div>               
                        <p class="col-span-1 font-light text-justify 2xl:text-lg lg:text-sm text-xs brand-text ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque egestas nec ipsum ac mollis. Duis at lorem sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur felis lacus, venenatis non maximus vitae, laoreet sit amet risus. Vivamus id ex magna. Vestibulum nibh elit, vestibulum ac mauris a, ornare sodales lorem. Aenean turpis velit, hendrerit eget dui sed, accumsan molestie libero. Donec sapien magna, egestas vel congue vel, accumsan et erat. Etiam nisi odio, pretium sit amet nunc at, dapibus vehicula augue.</p> 
                    </div>                       
            </div>
            <div class="w-full lg:h-auto lg:py-10 lg:pl-10">
                <div class="w-full lg:h-full h-96 bg-origin-border bg-cover bg-no-repeat bg-center bg-local" style="background-image: url('/images/pages/vision.jpg')">
                        &nbsp;
                </div>    
            </div>
        </div>
    </div>

   <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28 rvmp-bg-main">
         <div class="flex lg:flex-row-reverse flex-col h-auto relative">
            <div class="w-full lg:h-2/3 h-full lg:py-20 lg:pl-10 lg:pr-0 p-6 lg:static absolute lg:bg-transparent rvmp-bg-alt lg:bg-opacity-0 bg-opacity-80">            
                    <div class="w-full h-full lg:static grid grid-cols-1 place-content-center"> 
                        <div class="col-span-1 mb-4 text-3xl uppercase lg:text-left text-center">
                            <h2 class="brand-text font-light  lg:block inline-block mr-2">OUR COMPANY'S</h2>
                            <h2 class="brand-text font-semibold rvmp-brand-color-highlight lg:block inline-block">Values</h2>  
                        </div>               
                        <p class="col-span-1 font-light text-justify 2xl:text-lg lg:text-sm text-xs brand-text ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque egestas nec ipsum ac mollis. Duis at lorem sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur felis lacus, venenatis non maximus vitae, laoreet sit amet risus. Vivamus id ex magna. Vestibulum nibh elit, vestibulum ac mauris a, ornare sodales lorem. Aenean turpis velit, hendrerit eget dui sed, accumsan molestie libero. Donec sapien magna, egestas vel congue vel, accumsan et erat. Etiam nisi odio, pretium sit amet nunc at, dapibus vehicula augue.</p> 
                    </div>                       
            </div>
            <div class="w-full lg:h-auto lg:py-10 lg:pr-10">
                <div class="w-full lg:h-full h-96 bg-origin-border bg-cover bg-no-repeat bg-center bg-local" style="background-image: url('/images/pages/value.jpg')">
                        &nbsp;
                </div>    
            </div>
        </div>
    </div> -->
    <!-- <div class="h-auto w-full bg-transparent">
        <div class="flex lg:flex-row flex-col bg-cover bg-center bg-local" style="background-image: url('/images/pages/groups.jpeg')" >
            <div class="w-full relative py-10 h-auto " >
                <div class="py-4 h-56 text-center mt-auto w-full flex flex-col justify-center rvmp-text-alt bg-transparent">
                </div> 
            </div>
        </div>
    </div> -->
    </div>
    <app-footer-contact-form/>
</template>

<script>
import AppHeader from "../Partials/AppHeader";
import AppFooterContactForm from "../Partials/AppFooterContactForm";
import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject, reactive, onMounted} from "vue";




export default {
    name: "About",
    components: {
        ErrorsAndMessages,
        AppHeader,
        AppFooterContactForm,
    },
    props: {
        errors: Object
    },
    setup(){
        
        const pdata = computed(() => usePage().props.value.page.data);
        const page_content = JSON.parse(pdata.value.page_content)
        return{
            page_content
        }
    },
    mounted(){
        
    }
   
}
</script>
