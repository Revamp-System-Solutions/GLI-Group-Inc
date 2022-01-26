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
    <div  class="mx-auto sm:py-24 2xl:px-80 xl:px-56 lg:px-28 ">
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
                <div class="w-full xl:px-7 px-4 lg:pb-0 pb-10" v-html="fields">

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
        
        const numberLinks = posts.value.links.filter((v, i) => i > 0 && i < posts.value.links.length - 1);
        const form = computed(() => usePage().props.value.forms);
        const options = ref(JSON.parse(form.value[0].select_options))
        let opt_keys = Object.keys(options.value)
        let select_keys = {}
        opt_keys.forEach(function (key, index) {
             select_keys[key] = options.value[key][0]
            })
        const selected = ref(select_keys)
         const fields = form.value[0].fields
              console.log(select_keys)
        return {
            posts,
            numberLinks,
            options,
            selected,
            fields
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
