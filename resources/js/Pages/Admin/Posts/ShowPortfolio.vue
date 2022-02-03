<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<div class="flex bg-gray-100">
    <app-header-small></app-header-small>

    <div id="content-area" class="max-w-7xl md:w-9/12 mx-auto ">
            <div class="flex flex-col justify-center px-4" >
                <!-- search box -->
                <div class="flex justify-between">
                    <span class="text-xl inline-block p-3 font-semibold text-gray-700">
                        Portfolio Posts
                        <inertia-link  class="ml-4 inline-block border py-1 px-3 rounded border-green-700 text-green-700 text-base font-normal
                                    transition ease-out duration-400 hover:bg-green-700 hover:text-white"
                                    :href="$route('portfolio.create')">
                                <i class="fas fa-plus"></i> Add New
                        </inertia-link>
                    </span>
                    <div class="pt-2 relative text-gray-600">
                        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                type="search" name="search" placeholder="Search">
                            <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                    width="512px" height="512px">
                                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                <!-- table -->
                <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Qty of Images
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Author
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody  v-if="posts.data.length > 0" class="bg-white divide-y divide-gray-200">
                                <tr v-for="post in posts.data" :key="post.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-700">{{post.title}}</div>
                                        <div class="text-xs italic text-gray-500">{{ post.updated_at.split("T")[0] }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap w-2/5">
                                        <div class="text-sm text-gray-700">{{ post.images_url.length }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-700">{{ post.author }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap space-x-1 ">
                                        <inertia-link :href="$route('portfolio.edit', {slug: post.slug})" class="text-sm text-white bg-blue-400 px-3 py-1 rounded-sm" v-if="user" ><i class="fas fa-edit"></i> Edit Post</inertia-link>
                                        <a href="javascript:void(0);" class="text-sm text-white bg-red-400 px-3 py-1 rounded-sm" @click.prevent="openModal(post.slug)" v-if="user"><i class="fas fa-trash-alt"></i> Delete Post</a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr class="text-center">
                                    <td colspan="4" class="text-center px-6 py-4 whitespace-nowrap">
                                        <div class="mb-2">No posts found!</div>
                                        <inertia-link  class="inline-block border py-1 px-3 rounded border-green-700 text-green-700 text-base font-normal
                                                            hover:bg-green-700 hover:text-white transition ease-out duration-400"
                                                        :href="$route('portfolio.create')">
                                            <i class="fas fa-plus"></i> Add New
                                        </inertia-link>
                                    </td>
                                </tr>
                            </tbody>
                </table>
                <!-- pagination -->
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
</div>
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
