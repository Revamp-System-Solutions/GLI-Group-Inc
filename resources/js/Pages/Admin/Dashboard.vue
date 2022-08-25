<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<div class="flex">
    <app-header-small :user="user" :menu-links="menuLinks" :menu-sub-links="menuSubLinks" />
    <div class="flex flex-row w-full ">
        <div id="content-area" class="w-full  h-auto bg-gray-50 ">

            <div class="h-auto  w-auto grid grid-rows-2  grid-flow-col">
               <div class="w-auto h-auto p-4">
                    <span class="flex flex-row justify-around w-auto h-auto">
                        <span class="bg-blue-600 text-gray-100 rounded-md w-96 h-52 filter shadow text-center p-2 flex flex-col justify-center">
                            <span class="title font-bold text-xl justify-self-start p-3">
                                {{stats.filesusage.description}}
                               
                            </span>
                            <span class="m-6 mt-3 space-y-4">
                                <div class=" w-full ">
                                    <!-- {{value}} % -->
                                     <LvProgressBar :value="filesusage" color="#38b2ac" class="filter shadow"/>
                                </div>
                                <span class="subtitle font-semibold text-xl block">{{Number(stats.filesusage.usage).toLocaleString()}} / {{Number(stats.filesusage.maximum).toLocaleString()}}</span>
                            </span>
                       </span>
                        <span class="bg-blue-600 text-gray-100 rounded-md w-96 h-52 filter shadow text-center p-2 flex flex-col justify-center">
                            <span class="title font-bold text-xl justify-self-start p-3">
                                {{stats.lvememphy.description}}
                            </span>
                            <span class="m-6 mt-3 space-y-4">
                                <div class=" w-full ">
                                    <!-- {{value}} % -->
                                     <LvProgressBar :value="lvememphy" color="#38b2ac" class="filter shadow"/>
                                </div>
                                <span class="subtitle font-semibold text-xl block">{{filter_bytes(stats.lvememphy.usage)}} / {{filter_bytes(stats.lvememphy.maximum)}}</span>
                            </span>
                       </span>
                        <span class="w-96 h-52 place-self-stretch max-w-max">
                            <span class="inline-grid grid-cols-2 gap-y-3 gap-x-4 w-full h-auto place-content-center">
                               <span class="bg-blue-600 text-gray-100 rounded-md w-36 h-24 filter shadow text-center p-2 flex flex-col justify-center">
                                    <span class="title font-bold text-lg justify-self-start p-1.5">
                                        {{stats.disk_usage.description}}
                                    </span>
                                    <span class="m-3 mt-1.5">
                                        <span class="subtitle font-semibold text-lg block">{{filter_bytes(stats.disk_usage.usage)}} / {{ stats.disk_usage.maximum !== null ? filter_bytes(stats.disk_usage.maximum):'∞' }}</span>
                                    </span>
                                </span>
                                <span class="bg-blue-600 text-gray-100 rounded-md w-36 h-24 filter shadow text-center p-2 flex flex-col justify-center">
                                    <span class="title font-bold text-normal justify-self-start p-1.5">
                                        {{stats.lvenproc.description}}
                                    </span>
                                    <span class="m-3 mt-1">
                                        <span class="subtitle font-semibold text-lg block">{{stats.lvenproc.usage}} / {{ stats.lvenproc.maximum }}</span>
                                    </span>
                                </span>
                                <span class="bg-blue-600 text-gray-100 rounded-md w-36 h-24 filter shadow text-center p-2 flex flex-col justify-center">
                                    <span class="title font-bold text-normal justify-self-start p-1.5">
                                        {{stats.cachedmysqldiskusage.description}}
                                    </span>
                                    <span class="m-3 mt-1.5">
                                        <span class="subtitle font-semibold text-lg block">{{filter_bytes(stats.cachedmysqldiskusage.usage)}} / {{ stats.cachedmysqldiskusage.maximum !== null ? filter_bytes(stats.cachedmysqldiskusage.maximum):'∞' }}</span>
                                    </span>
                                </span>
                                <span class="bg-blue-600 text-gray-100 rounded-md w-36 h-24 filter shadow text-center p-2 flex flex-col justify-center">
                                    <span class="title font-bold text-lg justify-self-start p-1.5">
                                        {{stats.bandwidth.description}}
                                    </span>
                                    <span class="m-3 mt-1.5 space-y-4">
                                        <span class="subtitle font-semibold text-lg block">{{filter_bytes(Number(stats.bandwidth.usage))}} / {{ stats.bandwidth.maximum !== null ? filter_bytes(stats.bandwidth.maximum):'∞' }}</span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </span>
               </div>
                <div class="w-full h-auto bg-gray-300">display contact form response here</div>  
                <!-- <div class="w-full h-96 bg-gray-300">3</div> -->
            </div>
        </div>
    </div>
</div>
</template>

<script>
import AppHeaderSmall from '../../Partials/AppHeaderSmall';
import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import LvProgressBar from 'lightvue/progress-bar';
import prettyBytes from 'pretty-bytes';

export default {
    name: "Admin",
    components: {
        ErrorsAndMessages,
        AppHeaderSmall,
        LvProgressBar,
    },
    props: {
        errors: Object
    },	 
    setup() {
        const stats = computed(() => usePage().props.value.statistics);
        const user = computed(() => usePage().props.value.auth.user);
		const menuLinks = computed(() => usePage().props.value.page_links.parentLinks);
		const menuSubLinks = computed(() => usePage().props.value.page_links.subLinks);
		console.log(stats.value)
        const filesusage = ((Number(stats.value.filesusage.usage)/Number(stats.value.filesusage.maximum))*100).toFixed(1)
        const lvememphy = ((Number(stats.value.lvememphy.usage)/Number(stats.value.lvememphy.maximum))*100).toFixed(1)
        
        return {
            user,
			menuLinks,
			menuSubLinks,
            stats,
            filesusage,
            lvememphy
        }
    },
    methods:{
        filter_bytes: (value)=>{
            return prettyBytes(value, {binary:true})
        }
    }

}
</script>

