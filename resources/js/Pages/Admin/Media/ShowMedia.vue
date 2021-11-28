<template>
<errors-and-messages :errors="errors"></errors-and-messages>
   <div class="flex flex-row">
        <app-sidebar></app-sidebar>
        <div id="content-area" class="w-10/12 bg-gray-50">
        <app-header-small></app-header-small>
        <span class="text-xl inline-block p-3 font-semibold">  Media Library<inertia-link  class="ml-4 inline-block border py-1 px-3 rounded border-green-700 text-green-700 text-base font-normal" :href="$route('media.create')"><i class="fas fa-upload"></i> Add New</inertia-link> </span>
            <div class="flex flex-col justify-center px-4" >
                <div class="w-full bg-gray-400 flex  border rounded justify-end">
                  <label for="mediasearch " class="my-3 mr-2 align-middle"><i class="fas fa-search mr-1"></i> Search Media: </label>
                  <input type="text" id="mediasearch" v-model="fn" @keyup="search" class="m-3 px-2 py-1 txt-sm rounded">
                </div>
                 <template v-if="medias.data.length > 0">
                          
                  <div class="py-8 px-4 w-full">
                      <div class="flex flex-wrap -mx-4 -mb-8">
                        <div v-for="media in medias.data" :key="media.id" class="md:w-1/4 px-4 mb-8">
                          {{media.media_name }}
                          <img v-if="media.image_url" class="rounded shadow-md" :src="media.image_url" :alt="media.media_name">
                          <inertia-link :href="$route('post.edit', {id: media.id})" class="btn btn-primary pull-right action-btn" v-if="user" ><i class="fas fa-edit"></i> Edit Image</inertia-link>
                          <a href="javascript:void(0);" class="btn btn-warning pull-right action-btn" @click.prevent="openModal(post.id)" v-if="user"><i class="fas fa-trash-alt"></i> Delete Image</a>
                        </div>
                      </div>
                  </div>
                         
                        <!-- Pagination links-->
                      <nav aria-label="Page navigation" v-if="medias.total > medias.per_page" style="margin-top: 20px" class="w-1/5 mx-auto">
                        <ul class="pagination  flex flex-row justify-between">
                            <!-- Previous link -->
                            <li :class="'page-item' + (medias.links[0].url == null ? ' disabled' : '')">
                                <inertia-link :href="medias.links[0].url == null ? '#' : medias.links[0].url" class="page-link" v-html="medias.links[0].label"></inertia-link>
                            </li>
                            
                            <!-- Numbers -->
                            <li v-for="item in numberLinks" :class="'page-item' + (item.active ? ' disabled' : '')" :key="item">
                                <inertia-link :href="item.active ? '#' : item.url" class="page-link" v-html="item.label"></inertia-link>
                            </li>

                            <!-- Next link -->
                            <li :class="'page-item' + (medias.links[medias.links.length - 1].url == null ? ' disabled' : '')">
                                <inertia-link :href="medias.links[medias.links.length - 1].url == null ? '#' : medias.links[medias.links.length - 1].url" class="page-link" v-html="medias.links[medias.links.length - 1].label"></inertia-link>
                            </li>
                        </ul>
                    </nav>   
                    </template>
                    <div class="text-center" v-else>
                        No medias found! <inertia-link :href="$route('media.create')">Create Post</inertia-link>
                    </div>
                   
                   
                   
            </div>
            
        </div>
    </div>
<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-show="modalOpen">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
            <!-- Heroicon name: outline/exclamation -->
            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
              Delete Post
            </h3>
            <div class="mt-2">
              <p class="text-sm text-gray-500">
                Are you sure you want to this post? This action cannot be undone.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click.prevent="modalOpen=false;deletePost(target)">
          Delete
        </button>
        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click.prevent="modalOpen=false">
          Cancel
        </button>
      </div>
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
import _ from 'lodash';

export default {
    name: "Media",
    components: {
        ErrorsAndMessages,
        AppSidebar,
        AppHeaderSmall
    },
    props: {
        errors: Object
    },
    data: () => ({
    	modalOpen: false,
      target: '',
      fn: ''
  	}),
    methods: {
        openModal(id){
            this.target=id
            this.modalOpen = true
        },
        search: _.throttle(function(){
              Inertia.get(route('admin.media'), {fn: this.fn}, { preserveState: true })
        }, 200)
    },
    setup() {
        const route = inject('$route');

        const deletePost = (id) => {
           
            Inertia.delete(route('post.destroy', {id}));
        }

        const medias = computed(() => usePage().props.value.medias);

        const numberLinks = medias.value.links.filter((v, i) => i > 0 && i < medias.value.links.length - 1);

        const user = computed(() => usePage().props.value.auth.user);

        return {
            medias,
            deletePost,
            numberLinks,
            user
        }
    }
}
</script>

<style scoped>
    .action-btn {
        margin-left: 12px;
        font-size: 13px;
    }

    .article {
        margin-top: 20px;
        
    }
    .d-flex{
        display: flex !important;
        justify-content: flex-start;
    }

</style>
