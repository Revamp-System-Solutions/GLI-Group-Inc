<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<app-header-small></app-header-small>
   <div class="flex flex-row">
         
        <div id="content-area" class="w-full h-auto bg-gray-50">
            <div class="h-screen"> 
                STATICS, BRAND COLORSs

                <table class="table-fixed w-full border-collapse border border-gray-700 mt-2">
                                  <thead>
                                      <tr>
                                      <th class="w-1/4 border border-gray-600">Name</th>
                                      <th class="w-1/4 border border-gray-600">Color</th>
                                      <th class="w-1/4 border border-gray-600">Description</th>
                                      
                                      </tr>
                                  </thead>
                            <tbody>
                                      <tr v-for="system_color in system_colors" :key="system_color.alias" class="">
                                          <td class="border border-gray-600">{{system_color.alias}}</td>
                                          <td class="border border-gray-600"> {{ system_color.value }}
                                                
                                              <input type="color" :value="rgba2hex('rgba('+system_color.value+')')"> 
                                          </td>
                                          <td class="border border-gray-600">{{ system_color.description }}</td>
                                          
                                      </tr>
                                  </tbody>
                         
                            </table>
            </div>
        </div>
    </div>
</template>

<script>
import AppHeaderSmall from './../../../Partials/AppHeaderSmall';
import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject} from "vue";

export default {
    name: "SiteSetting",
    components: {
        ErrorsAndMessages,     
        AppHeaderSmall,
        
    },
    props: {
        errors: Object
    },
    data: () => ({
    
  	}),
    methods: {
       rgba2hex(rgba) {
        rgba = rgba.match(
            /^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i
        );
        return rgba && rgba.length === 4
            ? "#" +
                ("0" + parseInt(rgba[1], 10).toString(16)).slice(-2) +
                ("0" + parseInt(rgba[2], 10).toString(16)).slice(-2) +
                ("0" + parseInt(rgba[3], 10).toString(16)).slice(-2)
            : "";
        }
    },
    setup() {
        const route = inject('$route');

        const system_colors = computed(() => usePage().props.value.system_colors);
    console.log(system_colors)
        const user = computed(() => usePage().props.value.auth.user);

        return {
            system_colors,
            user
        }
    }
}
</script>