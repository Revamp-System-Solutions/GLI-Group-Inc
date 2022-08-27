<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<div class="flex">
    <app-header-small :user="user" :menu-links="menuLinks" :menu-sub-links="menuSubLinks" />
    <div class="flex flex-row w-full ">
        <div id="content-area" class="w-full  h-auto bg-gray-50 ">

            <div class="h-auto  w-auto flex flex-wrap">
               <div class="w-full h-auto p-4 pb-0 self-center">
                    <span class="flex flex-row justify-around w-auto h-auto">
                        <span class="bg-blue-600 text-gray-100 rounded-md w-96 h-52 filter shadow text-center p-2 flex flex-col justify-center">
                            <span class="title font-bold text-xl justify-self-start p-3">
                                {{stats.filesusage.description}}
                               
                            </span>
                            <span class="m-6 mt-3 space-y-4">
                                <div class=" w-full ">
                                    <!-- {{value}} % -->
                                     <LvProgressBar :value="filesusage" color="#38b2ac" class="filter shadow text-gray-800"/>
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
                                     <LvProgressBar :value="lvememphy" color="#38b2ac" class="filter shadow text-gray-800"/>
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
                <div class="w-full h-auto px-8"> 
                  
                    <div class="w-full h-auto mx-auto flex flex-col justify-center items-center"> 
                        <div class="w-2/3"><span class="text-left"><h2 class="text-xl font-semibold uppercase my-2">Contact Form Responses</h2></span></div>
                   <template v-if="frm_response.data.length > 0">
                 <table class="w-2/3 divide-y divide-gray-200 shadow-lg rounded-md">
                    <thead class="bg-gray-400 ">
                        
                        <tr class="">
                        <th
                            scope="col"
                            class="
                            rounded-tl-md
                            px-6
                            py-3
                            text-left text-xs
                            font-medium
                            text-gray-900
                            uppercase
                            tracking-wider
                            "
                        >
                            Name
                        </th>
                        <th
                            scope="col"
                            class="
                            px-6
                            py-3
                            text-left text-xs
                            font-medium
                            text-gray-900
                            uppercase
                            tracking-wider
                            "
                        >
                            Message
                        </th>
                        
                        <th
                            scope="col"
                            class="
                            rounded-tr-md
                            px-6
                            py-3
                            text-left text-xs
                            font-medium
                            text-gray-900
                            uppercase
                            tracking-wider
                            "
                        >
                            date
                        </th>
                        </tr>
                    </thead>
                    <tbody
                        
                        class="bg-white divide-y divide-gray-200"
                    >
                        <tr v-for="itm of frm_response.data">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-md font-bold text-gray-700">
                            {{itm.response.fullName}}
                            </div>
                            <div class="text-xs font-semibold text-gray-700 italic">
                            {{itm.response.email}}
                            </div>
                        
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap w-2/5">
                            <div class="text-xs italic text-gray-500">
                            {{itm.response.message}}
                            </div>
                        </td>
                    
                        <td class="px-6 py-4 whitespace-nowrap space-x-1">
                          <div class="text-xs italic text-gray-500">
                            {{itm.created_at}}
                            </div>
                        </td>
                        </tr>
                       
                    </tbody>
                    <!-- <tbody v-else>
                        <tr class="text-center">
                        <td colspan="4" class="text-center px-6 py-4 whitespace-nowrap">
                            <div class="mb-2">No posts found!</div>
                            <inertia-link
                            class="
                                inline-block
                                border
                                py-1
                                px-3
                                rounded
                                border-green-700
                                text-green-700 text-base
                                font-normal
                                hover:bg-green-700 hover:text-white
                                transition
                                ease-out
                                duration-400
                            "
                            :href="$route('portfolio.create')"
                            >
                            <i class="fas fa-plus"></i> Add New
                            </inertia-link>
                        </td>
                        </tr>
                    </tbody> -->
                    </table>
                    
                     <nav aria-label="Page navigation" v-if="frm_response.total > frm_response.per_page" style="margin-top: 20px" class="w-1/5 mx-auto">
                        <ul class="pagination  flex flex-row justify-between">
                            <!-- Previous link -->
                            <li :class="'page-item' + (frm_response.links[0].url == null ? ' disabled' : '')">
                                <inertia-link :href="frm_response.links[0].url == null ? '#' : frm_response.links[0].url" class="page-link" v-html="frm_response.links[0].label"></inertia-link>
                            </li>

                            <!-- Numbers -->
                            <li v-for="item in numberLinks" :class="'page-item' + (item.active ? ' disabled' : '')" :key="item">
                                <inertia-link :href="item.active ? '#' : item.url" class="page-link" v-html="item.label"></inertia-link>
                            </li>

                            <!-- Next link -->
                            <li :class="'page-item' + (frm_response.links[frm_response.links.length - 1].url == null ? ' disabled' : '')">
                                <inertia-link :href="frm_response.links[frm_response.links.length - 1].url == null ? '#' : frm_response.links[frm_response.links.length - 1].url" class="page-link" v-html="frm_response.links[frm_response.links.length - 1].label"></inertia-link>
                            </li>
                        </ul>
                    </nav>
                    </template>
                     <div class="text-center mt-4" v-else>
                        No Responses Yet!
                    </div>
                    </div>
                    
                    
                </div>  
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
        const frm_response = computed(() => usePage().props.value.frm_response);
        const numberLinks = frm_response.value.links.filter((v, i) => i > 0 && i < frm_response.value.links.length - 1);
        const stats = computed(() => usePage().props.value.statistics);
        const user = computed(() => usePage().props.value.auth.user);
		const menuLinks = computed(() => usePage().props.value.page_links.parentLinks);
		const menuSubLinks = computed(() => usePage().props.value.page_links.subLinks);
        console.log(frm_response)
        for (let n  of frm_response.value['data']) {
           n.response = JSON.parse(n.response)
            // console.log(index)
        }
	
        const filesusage = ((Number(stats.value.filesusage.usage)/Number(stats.value.filesusage.maximum))*100).toFixed(1)
        const lvememphy = ((Number(stats.value.lvememphy.usage)/Number(stats.value.lvememphy.maximum))*100).toFixed(1)
        
        return {
            user,
			menuLinks,
			menuSubLinks,
            stats,
            filesusage,
            lvememphy,
            frm_response,
            numberLinks
        }
    },
    methods:{
        filter_bytes: (value)=>{
            return prettyBytes(value, {binary:true})
        }
    }

}
</script>

