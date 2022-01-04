<template>
    <app-header></app-header>
    <div class="rvmp-container h-full space-y-6 mb-8">
    <div class="w-full bg-origin-border bg-cover bg-center bg-local" style="background-image: url('/images/pages/groups.jpeg')">
        <div class="h-40 mx-auto 2xl:px-80 xl:px-56 lg:px-28 px-8 flex flex-wrap content-center rvmp-banner-bg bg-opacity-80">
                <div class="self-start">
                        <h1 class="px-5 brand-text xl:text-3xl text-xl font-bold rvmp-banner-text-color">Latest Posts from <span class="brand-logo-text">GLI</span></h1>
                </div>
        </div>
    </div>
    <div  class="mx-auto 2xl:px-80 xl:px-56 lg:px-28 ">
            <div class="w-full flex lg:flex-row flex-col lg:space-x-8 " >
                <div class="w-full lg:px-20 px-8 space-y-6">
                    <template v-if="posts.data.length > 0">
                        
                                <div class="flex lg:flex-row flex-col space-y-6" v-for="post in posts.data" :key="post.id">
                                    <div v-if="post.image_url" class="h-52 lg:w-52 w-full rounded-md bg-content-border bg-cover bg-center bg-local" :style="makeBG(post.image_url)"></div>
                                    <div class="lg:w-96 w-full lg:max-h-52 lg:h-52 lg:px-6 lg:py-4 space-y-3 brand-text">
                                        <inertia-link :href="$route('guest.blog.view', {id: post.slug})" class="rvmp-text-main hover:rvmp-brand-color-highlight"> <h4 class="lg:text-xl text-base font-semibold">{{post.title}}</h4></inertia-link>
                                        <div class="space-x-2"><span class="lg:text-sm text-xs font-extralight text-gray-400"><i class="fas fa-at"></i> {{post.author}}</span><span class="lg:text-sm text-xs font-extralight text-gray-400"><i class="far fa-folder-open"></i> {{post.name}}</span></div>
                                        <div class="overflow-ellipsis overflow-hidden lg:text-sm text-xs font-light">  {{ post.short_text }} </div>
                                    </div>
                                </div>
                        
                        <!-- Pagination links-->

                        <nav class="w-20" aria-label="Page navigation" v-if="posts.total > posts.per_page" style="margin-top: 20px">
                            <ul class="pagination flex flex-row justify-between">
                                <!-- Previous link -->
                                
                                <li v-if="posts.links[1].active != true" :class="'page-item' + (posts.links[0].url == null ? ' disabled' : '')">
                                    <inertia-link :href="posts.links[0].url == null ? '#' : posts.links[0].url" class="page-link" v-html="posts.links[0].label"></inertia-link>
                                </li>
                                
                                <!-- Numbers -->
                                <li v-for="item in numberLinks"  :class="'page-item ' + (item.active ? 'rvmp-brand-color-main font-bold text-lg' : 'rvmp-brand-color-darker font-semibold text-base')" :key="item">
                                    <inertia-link :href="item.active ? '#' : item.url" class="page-link" v-html="item.label"></inertia-link>
                                </li>

                                <!-- Next link -->
                                <li v-if="posts.current_page != posts.last_page"  :class="'page-item' + (posts.links[posts.links.length - 1].url == null ? ' disabled' : '')">
                                    <inertia-link :href="posts.links[posts.links.length - 1].url == null ? '#' : posts.links[posts.links.length - 1].url" class="page-link" v-html="posts.links[posts.links.length - 1].label"></inertia-link>
                                </li>
                            </ul>
                        </nav>
                    </template>
                    <div class="text-center" v-else>
                        No posts Yet!
                    </div>
                </div>
                <div class="w-full lg:px-14 px-4">
                    <form action="#" method="POST" class="grid grid-cols-6 gap-y-3 p-6 rounded-md shadow-2xl">
                        <div class="col-span-6">
                          <h3 class="text-lg leading-6 mb-0 brand-text rvmp-footer-text capitalize font-semibold text-center">Get started with a <span class="block rvmp-brand-color-highlight">Free Quotation</span></h3>
                        </div>
                        <div class="col-span-6">
                          <label for="first-name" class="text-sm font-medium rvmp-footer-text capitalize hidden">Full name</label>
                          <input type="text" name="first-name" id="first-name" placeholder="Full name" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full  rounded-md shadow-sm sm:text-sm border-gray-300" />
                        </div>
                        <div class="col-span-6">
                          <label for="email-address" class="text-sm font-medium rvmp-footer-text capitalize hidden">Email address</label>
                          <input type="text" name="email-address" id="email-address" placeholder="Email Address" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-md shadow-sm sm:text-sm border-gray-300" />
                        </div>
                        <div class="col-span-6 ">
                          <label for="project" class="text-sm font-medium rvmp-footer-text capitalize hidden">Type of Project</label>
                              <Listbox v-model="selectedPerson">
                                <div class="relative mt-1">
                                    <ListboxButton
                                    class="relative w-full py-2 pl-3 pr-10 text-left bg-white rounded-md shadow-sm cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-orange-300 focus-visible:ring-offset-2 focus-visible:border-indigo-500 sm:text-sm border border-gray-300"
                                    >
                                    <span class="block truncate">{{ selectedPerson.name }}</span>
                                    <span
                                        class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none"
                                    >
                                        <i class="fas fa-chevron-down w-5 h-5 text-gray-400" aria-hidden="true" />
                                    </span>
                                    </ListboxButton>

                                    <transition
                                    leave-active-class="transition duration-100 ease-in"
                                    leave-from-class="opacity-100"
                                    leave-to-class="opacity-0"
                                    >
                                    <ListboxOptions
                                        class="absolute w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                    >
                                        <ListboxOption
                                        v-slot="{ active, selected }"
                                        v-for="person in people"
                                        :key="person.name"
                                        :value="person"
                                        :disabled="person.disabled"
                                        as="template"
                                        >
                                        <li
                                            :class="[
                                            active ? 'text-amber-900 bg-amber-100' : 'text-gray-900',
                                            'cursor-default select-none relative py-2 pl-10 pr-4',
                                            ]"
                                        >
                                            <span
                                            :class="[
                                                selected ? 'font-medium' : 'font-normal',
                                                'block truncate',
                                            ]"
                                            >{{ person.name }}</span
                                            >
                                            <span
                                            v-if="selected"
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 text-amber-600"
                                            >
                                            <i class="fas fa-check w-5 h-5" aria-hidden="true" />
                                            </span>
                                        </li>
                                        </ListboxOption>
                                    </ListboxOptions>
                                    </transition>
                                </div>
                                </Listbox>
                        </div>
                        <div class="col-span-6">
                          <label for="date" class="text-sm font-medium rvmp-footer-text capitalize hidden">Message</label>
                          <input type="date" name="email-address" id="email-address" placeholder="Email Address" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-md shadow-sm sm:text-sm border-gray-300" />
                        </div>                        
                        <div class="col-span-6">
                          <label for="message" class="text-sm font-medium rvmp-footer-text capitalize hidden">Message</label>
                          <textarea type="text" name="message" id="message" placeholder="Message" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md  shadow-sm sm:text-sm border-gray-300 resize-none" ></textarea>
                        </div>
                        <div class="col-span-6">
                          <button class="bg-green-600 text-white px-4 py-1.5  hover:bg-green-700 w-full rounded-md  transition ease-in-out duration-300">Book a Meeting</button>
                        </div>
                    </form>
                </div>
            </div>
            
            
    </div>
    </div>
    <app-footer-contact-form/>
</template>

<script>
import AppHeader from "../Partials/AppHeader";
import AppFooterContactForm from "../Partials/AppFooterContactForm";
import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject,ref} from "vue";
 import {
    Listbox,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
  } from '@headlessui/vue'


export default {
    name: "Home",
    components: {
        ErrorsAndMessages,
        AppHeader,
        AppFooterContactForm,
        Listbox,
        ListboxButton, 
        ListboxOptions, 
        ListboxOption
    },
    props: {
        errors: Object
    },
    methods:{
        makeBG(url){
            return `background-image: url('${url}')`
        }
    },
    setup() {
        const route = inject('$route');

     

        const posts = computed(() => usePage().props.value.posts);
        console.log(posts.value)

        const numberLinks = posts.value.links.filter((v, i) => i > 0 && i < posts.value.links.length - 1);
        const people = [
            { id: 0, name: 'Type of Project', disabled: true },
            { id: 1, name: 'Durward Reynolds', disabled: false },
            { id: 2, name: 'Kenton Towne', disabled: false },
            { id: 3, name: 'Therese Wunsch', disabled: false },
            { id: 4, name: 'Benedict Kessler', disabled: false },
            { id: 5, name: 'Katelyn Rohan', disabled: false },
            { id: 6, name: 'Katelyn1 Rohan', disabled: false },
            { id: 7, name: 'Katelyn2 Rohan', disabled: false },
            { id: 8, name: 'Katelyn3 Rohan', disabled: false },
            { id: 9, name: 'Benedict1 Kessler', disabled: false },
            { id: 10, name: 'Benedict2 Kessler', disabled: false },
            { id: 11, name: 'Benedict3 Kessler', disabled: false },

            ]
              const selectedPerson = ref(people[0])
        return {
            posts,
            numberLinks,
             people,
        selectedPerson,
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
