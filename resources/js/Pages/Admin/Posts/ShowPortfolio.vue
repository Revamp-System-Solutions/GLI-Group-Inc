<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<app-header-small></app-header-small>

        <div id="content-area" class="w-full h-auto 2xl:px-80 xl:px-56 lg:px-28">

          <span class="text-xl inline-block p-3 font-semibold"> Portfolio<inertia-link  class="ml-4 inline-block border py-1 px-3 rounded border-green-700 text-green-700 text-base font-normal hover:bg-green-700 hover:text-white" :href="$route('portfolio.create')"><i class="fas fa-plus"></i> Add New</inertia-link> </span>
            
              <div class="flex flex-col justify-center px-4" >
                      <div class="w-full bg-gray-400 flex  border rounded justify-end">
                        <label for="mediasearch " class="my-3 mr-2 align-middle"><i class="fas fa-search mr-1"></i> Search Posts: </label>
                        <input type="text" id="postsearch"  class="m-3 px-2 py-1 txt-sm rounded">
                      </div>

                            <table class="table-fixed w-full border-collapse border border-gray-700 mt-2">
                                  <thead>
                                      <tr>
                                      <th class="w-1/5 border border-gray-600">Title</th>
                                      <th class="w-1/5 border border-gray-600"># of Images</th>
                                      <th class="w-1/5 border border-gray-600">Author</th>
                                      <th class="w-1/5 border border-gray-600">Last Update</th>
                                      <th class="w-1/5 border border-gray-600">Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody v-if="posts.data.length > 0">
                                      <tr v-for="post in posts.data" :key="post.id" class="text-center ">
                                          <td class="border border-gray-600" v-html="post.title"></td>
                                          <td class="border border-gray-600">{{ post.images_url.length  }}</td>
                                          <td class="border border-gray-600">{{ post.author }}</td>
                                          <td class="border border-gray-600">{{ post.updated_at.split("T")[0] }}</td>
                                          <td class="border border-gray-600">
                                              <inertia-link :href="$route('portfolio.edit', {slug: post.slug})" class="btn btn-primary pull-right action-btn" v-if="user" ><i class="fas fa-edit"></i> Edit Post</inertia-link>
                                              <a href="javascript:void(0);" class="btn btn-warning pull-right action-btn" @click.prevent="openModal(post.slug)" v-if="user"><i class="fas fa-trash-alt"></i> Delete Post</a>
                                          </td>
                                      </tr>
                                  </tbody>
                                  <tbody v-else>
                                      <tr class="text-center " >
                                          <td colspan="4" class="text-center py-2 w-full border border-gray-600">
                                            No posts found! 
                                            <inertia-link  class="ml-4 inline-block border py-1 px-3 rounded border-green-700 text-green-700 text-base font-normal hover:bg-green-700 hover:text-white" :href="$route('portfolio.create')"><i class="fas fa-upload"></i> Add New</inertia-link>
                                          </td>
                                      </tr>
                                  </tbody>
                            </table>

                      
                    
                      <nav aria-label="Page navigation" v-if="posts.total > posts.per_page" style="margin-top: 20px" class="w-1/5 mx-auto">
                          <ul class="pagination  flex flex-row justify-between">
                              <!-- Previous link -->
                              <li :class="'page-item' + (posts.links[0].url == null ? ' disabled' : '')">
                                  <inertia-link :href="posts.links[0].url == null ? '#' : posts.links[0].url" class="page-link" v-html="posts.links[0].label"></inertia-link>
                              </li>
                              
                              <!-- Numbers -->
                              <li v-for="item in numberLinks" :class="'page-item' + (item.active ? ' disabled' : '')" :key="item">
                                  <inertia-link :href="item.active ? '#' : item.url" class="page-link" v-html="item.label"></inertia-link>
                              </li>

                              <!-- Next link -->
                              <li :class="'page-item' + (posts.links[posts.links.length - 1].url == null ? ' disabled' : '')">
                                  <inertia-link :href="posts.links[posts.links.length - 1].url == null ? '#' : posts.links[posts.links.length - 1].url" class="page-link" v-html="posts.links[posts.links.length - 1].label"></inertia-link>
                              </li>
                          </ul>
                      </nav>
                    
              </div>

        </div>


 <TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" @close="closeModal" >
      <div class="fixed inset-0 z-10 overflow-y-auto bg-gray-900 bg-opacity-70">
        <div class="min-h-screen px-4 text-center">
          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0"
          >
            <DialogOverlay class="fixed inset-0" />
          </TransitionChild>

          <span class="inline-block h-screen align-middle" aria-hidden="true">
            &#8203;
          </span>

          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95"
          >
            <div
              class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl"
            >
            
              <DialogTitle
                as="h3"
                class="text-lg font-medium leading-6 text-gray-900"
              >
                <i class="fas fa-trash-alt text-red-700"></i>  Delete Portfolio: {{(targetPort.split('-')).join(" ")}}
              </DialogTitle>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                 Are you sure you want to this portfolio? This action will not affect Media used.
                </p>
              </div>

              <div class="mt-4">
                 <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click.prevent="closeModal;deletePost(targetPort)">
                  Delete
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click.prevent="closeModal">
                  Cancel
                </button>
              </div>
            </div>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>

</template>

<script>
import AppHeaderSmall from './../../../Partials/AppHeaderSmall';
import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject,ref} from "vue";
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogOverlay,
  DialogTitle,
} from '@headlessui/vue'
export default {
    name: "Posts",
    components: {
        ErrorsAndMessages, 
        AppHeaderSmall,
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
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

        const deletePost = (id) => {
           
            Inertia.delete(route('portfolio.destroy', {id}),{
              onSuccess:  () =>{
                    isOpen.value = false
                }
            });
        }

        const posts = computed(() => usePage().props.value.posts);

        const numberLinks = posts.value.links.filter((v, i) => i > 0 && i < posts.value.links.length - 1);

        const user = computed(() => usePage().props.value.auth.user);
         const isOpen = ref(false)
         const targetPort = ref(null)
        return {
            posts,
            deletePost,
            numberLinks,
            user,
            isOpen,
            closeModal() {
              targetPort.value = null
              isOpen.value = false
            },
            openModal(id) {
               targetPort.value = id
              isOpen.value = true
            },
            targetPort
        }
    }
}
</script>
