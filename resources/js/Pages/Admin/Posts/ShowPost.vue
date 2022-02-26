<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<div class="flex bg-gray-100">
    <app-header-small></app-header-small>
    <!-- content -->
    <div id="content-area" class="max-w-7xl md:w-9/12 mx-auto ">
        <div class="flex flex-col justify-center px-4" >
            <!-- search box -->
            <div class="flex justify-between">
                <span class="text-xl inline-block p-3 font-semibold text-gray-700">
                    Blog Posts
                    <inertia-link  class="ml-4 inline-block border py-1 px-3 rounded border-green-700 text-green-700 text-base font-normal
                            transition ease-out duration-400 hover:bg-green-700 hover:text-white"
                            :href="$route('blog.create')">
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
                                <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
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
                                    Content
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
                                    <div class="text-sm text-gray-700">{{ post.short_text }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-700">{{ post.author }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap space-x-1 ">
                                    <inertia-link :href="$route('blog.edit', {id: post.slug})"
                                        class="text-sm text-white bg-blue-400 px-3 py-1 rounded-sm"
                                                        v-if="user" >
                                            <i class="fas fa-edit"></i> Edit
                                    </inertia-link>
                                    <a href="javascript:void(0);"
                                            @click.prevent="openModal(post.slug)"
                                            class="text-sm text-white bg-red-400 px-3 py-1 rounded-sm"
                                            v-if="user">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>

                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr class="text-center">
                                <td colspan="4" class="text-center px-6 py-4 whitespace-nowrap">
                                    <div class="mb-2">No posts found!</div>
                                    <inertia-link  class="inline-block border py-1 px-3 rounded border-green-700 text-green-700 text-base font-normal
                                                          hover:bg-green-700 hover:text-white transition ease-out duration-400"
                                                    :href="$route('blog.create')">
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
    <!-- modal -->
    <div class="fixed z-30 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-show="modalOpen">
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
</div>
</template>

<script>
import AppHeaderSmall from './../../../Partials/AppHeaderSmall';
import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject} from "vue";

export default {
    name: "Posts",
    components: {
        ErrorsAndMessages,
        AppHeaderSmall
    },
    props: {
        errors: Object
    },
    data: () => ({
    	modalOpen: false,
        target: ''
  	}),
    methods: {
        openModal(id){
            this.target=id
            this.modalOpen = true
        }
    },
    setup() {
        const route = inject('$route');

        const deletePost = (id) => {

            Inertia.delete(route('blog.destroy', {id}));
        }

        const posts = computed(() => usePage().props.value.posts);

        const numberLinks = posts.value.links.filter((v, i) => i > 0 && i < posts.value.links.length - 1);

        const user = computed(() => usePage().props.value.auth.user);

        return {
            posts,
            deletePost,
            numberLinks,
            user
        }
    }
}
</script>
