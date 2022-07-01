<template>
    <app-header></app-header>
    <div class="rvmp-container h-auto space-y-6 mb-8">
    <div class="w-full bg-origin-border bg-cover bg-center bg-local" style="background-image: url('/images/pages/groups.jpeg')">
        <div class="h-40 mx-auto 2xl:px-40 xl:px-16 px-8 flex lg:flex-wrap lg:content-center justify-center rvmp-banner-bg bg-opacity-80">
            <div class="lg:w-full lg:self-start self-center">
                <h1 class="px-5 brand-text xl:text-3xl text-xl font-bold rvmp-banner-text-color capitalize">Latest Posts from GLI</h1>
            </div>
        </div>
    </div>
    <div  class="mx-auto sm:py-24 2xl:px-64 xl:px-56 lg:px-28 ">
            <div class="w-full flex lg:flex-row flex-col lg:space-x-8 space-x-0 lg:space-y-0 space-y-8" >
                <div class="w-full px-8 space-y-6">
                    <template v-if="posts.data.length > 0">

                                <div class="flex 2xl:flex-row flex-col 2xl:space-y-6 space-y-3" v-for="post in posts.data" :key="post.id">
                                    <div v-if="post.image_url" class="h-52 2xl:w-52 w-full rounded-md bg-content-border bg-cover bg-center bg-local" :style="makeBG(post.image_url)"></div>
                                    <div class="lg:w-96 w-full lg:max-h-52 2xl:h-52 lg:px-6 xl:py-4 space-y-3 brand-text">
                                        <inertia-link :href="$route('guest.blog.view', {id: post.slug})" class="rvmp-text-main hover:rvmp-brand-color-highlight"> <h4 class="lg:text-xl text-base font-semibold">{{post.title}}</h4></inertia-link>
                                        <div class="space-x-2"><span class="lg:text-sm text-xs font-extralight text-gray-400"><i class="fas fa-at"></i> {{post.author}}</span><span class="lg:text-sm text-xs font-extralight text-gray-400"><i class="far fa-folder-open"></i> {{post.name}}</span></div>
                                        <div class="xl:overflow-ellipsis overflow-hidden lg:text-sm text-xs font-light">  {{ post.short_text }} </div>
                                    </div>
                                </div>
                        <!-- Pagination links-->
                        <nav class="w-20" aria-label="Page navigation" v-if="posts.total > posts.per_page" style="margin-top: 20px">
                            <ul class="pagination flex flex-row justify-between space-x-2">
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
                <div class="w-full xl:px-7 px-4 lg:pb-0 pb-10">
                    <form method="POST" class="grid grid-cols-6 gap-y-3 p-6 rounded-md shadow-2xl" @submit.prevent="sendMessage()">
                        <div class="col-span-6">
                          <h3 class="text-lg leading-6 mb-0 brand-text rvmp-footer-text capitalize font-semibold text-center">Get started with a <span class="block rvmp-brand-color-highlight">Free Quotation</span></h3>
                        </div>
                        <div class="col-span-6">
                          <label for="full-name" class="text-sm font-medium rvmp-footer-text capitalize hidden">Full name</label>
                          <input type="text" name="full-name" id="full-name" placeholder="Full name" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full  rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.fullName"/>
                        </div>
                        <div class="col-span-6">
                          <label for="email-address" class="text-sm font-medium rvmp-footer-text capitalize hidden">Email address</label>
                          <input type="email" name="email-address" id="email-address" placeholder="Email Address" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.email"/>
                        </div>
                        <div class="col-span-6">
                          <label for="contact-number" class="text-sm font-medium rvmp-footer-text capitalize hidden">Contact Number</label>
                          <input type="tel" pattern="[0-99999999999]{11}" max="11" name="contact-number" id="contact-number" placeholder="Contact Number" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.contact"/>
                        </div>
                        <div class="col-span-6 ">
                          <label for="project" class="text-sm font-medium rvmp-footer-text capitalize hidden">Type of Project</label>
                              <Listbox v-model="selectedService">
                                <div class="relative mt-1">
                                    <ListboxButton
                                    class="relative w-full py-2 pl-3 pr-10 text-left bg-white rounded-md shadow-sm cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-orange-300 focus-visible:ring-offset-2 focus-visible:border-indigo-500 sm:text-sm border border-gray-300"
                                    >
                                    <span class="block truncate">{{ selectedService.name }}</span>
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
                                        v-for="service in services"
                                        :key="service.name"
                                        :value="service"
                                        :disabled="service.disabled"
                                        as="template"
                                        >
                                        <li
                                            :class="[
                                            active ?  (service.id===0 ? 'text-gray-400 bg-gray-600':'rvmp-brand-color-darker rvmp-brand-bg-highlight bg-opacity-50') : 'text-gray-900',
                                            'cursor-default select-none relative py-2 pl-10 pr-4',
                                            ]"
                                        >
                                            <span
                                            :class="[
                                                selected ? 'font-medium' : 'font-normal',
                                                'block truncate',
                                            ]"
                                            >{{ service.name }}</span
                                            >
                                            <span
                                            v-if="selected&& service.id!==0"
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
                          <label for="date_needed" class="text-sm font-medium rvmp-footer-text capitalize block">when</label>
                          <input type="date" name="date_needed" id="date_needed" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-md shadow-sm sm:text-sm border-gray-300" v-model="form.bookingDate"/>
                        </div>
                        <div class="col-span-6">
                          <label for="message" class="text-sm font-medium rvmp-footer-text capitalize hidden">Message</label>
                          <textarea type="text" name="message" id="message" placeholder="Project Details" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md  shadow-sm sm:text-sm border-gray-300 resize-none" v-model="form.details"></textarea>
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
         const form = reactive({
            fullName: null,
            email: null,
            contact: null,
            projectType: null,
            bookingDate: null,
            details: null,
            _token: usePage().props.value.csrf_token,
        });

        const route = inject('$route');

        const posts = computed(() => usePage().props.value.posts);
        const numberLinks = posts.value.links.filter((v, i) => i > 0 && i < posts.value.links.length - 1);
        const services = [
            { id: 0, name: 'Type of Project', disabled: true },
            { id: 1, name: 'Clean gutters', disabled: false },
            { id: 2, name: 'Demolition', disabled: false },
            { id: 3, name: 'Remodeling', disabled: false },
            { id: 4, name: 'Install drywall', disabled: false },
            { id: 5, name: 'Install fan', disabled: false },
            { id: 6, name: 'Install flooring', disabled: false },
            { id: 7, name: 'Install tile work', disabled: false },
            { id: 8, name: 'Install water fixtures', disabled: false },
            { id: 9, name: 'Mount TV', disabled: false },
            { id: 10, name: 'Paint indoors', disabled: false },
            { id: 11, name: 'Paint outdoors', disabled: false },
            { id: 12, name: 'Refurbishment', disabled: false },
            { id: 13, name: 'Repair Flooring', disabled: false },
            { id: 14, name: 'Repair water fixtures', disabled: false },
            { id: 15, name: 'Repair drywall', disabled: false },
            { id: 16, name: 'Repair fan', disabled: false },
            { id: 17, name: 'Repair tile work', disabled: false },
            { id: 18, name: 'Other', disabled: false },
            ]
              const selectedService = ref(services[0])
              function sendMessage() {
            const data = new FormData();

            data.append("formTitle", 'Book a Meeting')
            data.append("fullName", this.form.fullName);
            data.append("email", this.form.email);
            data.append("contact", this.form.contact);
            data.append("projectType", this.selectedService);
            data.append("bookingDate", this.form.bookingDate);
            data.append("details", this.form.details);

            Inertia.post(route("form.submission"), data, {
                forceFormData: true,
            });
              }
        return {
            form,
            posts,
            numberLinks,
            services,
            sendMessage,
            selectedService,
        }
    }
}
</script>
