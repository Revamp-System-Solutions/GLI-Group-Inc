<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<app-header-small></app-header-small>
   <div class="flex flex-row">
        <app-sidebar></app-sidebar>
        <div id="content-area" class="w-full h-auto bg-gray-50">
            <div class="h-screen"> 
                STATICS, BRAND COLORS

                <table class="table-fixed w-full border-collapse border border-gray-700 mt-2">
                                  <thead>
                                      <tr>
                                      <th class="w-1/4 border border-gray-600">ID</th>
                                      <th class="w-1/4 border border-gray-600">Name</th>
                                      <th class="w-1/4 border border-gray-600">Description</th>
                                      <th class="w-1/4 border border-gray-600">Actions</th>
                                      </tr>
                                  </thead>
                            <tbody>
                                      <tr v-for="system_color in system_colors" :key="system_color.alias" class="text-center ">
                                          <td class="border border-gray-600">{{system_color.alias}}</td>
                                          <td class="border border-gray-600">{{ system_color.value }}</td>
                                          <td class="border border-gray-600">{{ system_color.description }}</td>
                                          <td class="border border-gray-600">
                                              <inertia-link :href="$route('post.edit', {id: system_color.alias})" class="btn btn-primary pull-right action-btn" v-if="user" ><i class="fas fa-edit"></i> Edit Post</inertia-link>
                                              <a href="javascript:void(0);" class="btn btn-warning pull-right action-btn" @click.prevent="openModal(system_color.alias)" v-if="user"><i class="fas fa-trash-alt"></i> Delete Post</a>
                                          </td>
                                      </tr>
                                  </tbody>
                         
                            </table>
            </div>
        </div>
    </div>
</template>

<script>
import AppHeaderSmall from './../../../Partials/AppHeaderSmall';
import AppSidebar from "./../../../Partials/AppSidebar";
import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject} from "vue";

export default {
    name: "SiteSetting",
    components: {
        ErrorsAndMessages,
        AppSidebar,
        AppHeaderSmall
    },
    props: {
        errors: Object
    },
    data: () => ({
    
  	}),
    methods: {
    
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