<template>
    <errors-and-messages :errors="errors"></errors-and-messages>
    <app-header-small></app-header-small> 
    <div id="content-area" class="w-full h-auto bg-gray-50">
        <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28"> 
            <span class="text-xl inline-block p-3 font-semibold">Create Testimonials</span>
            <form method="post" @submit.prevent="submit">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="rating" class="block text-sm font-medium text-gray-700">Customer Rating</label>
                                <input type="number"  name="rating" id="rating" min="0" max="5" step="0.5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="form.ratings" @change="showStars">
                                <!-- <span v-if="form.ratings>0" class="text-yellow-400 space-x-2" v-html="form.stars"></span> -->
                            </div>
                            <div class="col-span-6 ">
                                <label for="categories" class="block text-sm font-medium text-gray-700">Category</label>
                                <Listbox v-model="form.category" >
                                    <div class="relative">
                                        <ListboxButton disabled v-slot="{open}" class="flex items-center justify-between relative w-full mt-1 p-3  text-left  border border-gray-300 bg-white rounded-md cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-orange-300 focus-visible:ring-offset-2 focus-visible:border-green-500 sm:text-sm">
                                            <span class="block truncate">{{ categories[form.category] }}</span>
                                            <span class="fas " :class="[open ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-gray-500 ', 'h-5 w-5 justify-self-end']" aria-hidden="true"></span>   
                                        </ListboxButton>
                                        <transition leave-active-class="transition duration-100 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                            <ListboxOptions class="absolute w-full py-2 mt-1 overflow-auto text-base bg-white rounded-md shadow-sm max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                                <ListboxOption v-for="(category, index) in categories" :key="category" :value="index">
                                                    <li :class="[index==form.category ? 'text-green-900 bg-green-100' : 'text-gray-900','cursor-default select-none relative py-2 pl-10 pr-4 flex flex-row',]">
                                                        <span :class="[index==form.category ? 'font-medium' : 'font-normal','block truncate',]">{{ category }}</span>              
                                                        <span :class="[index==form.category ? 'fas fa-check' : '', 'h-5 w-5  pl-3 text-green-600']" aria-hidden="true"></span> 
                                                    </li> 
                                                </ListboxOption>
                                            </ListboxOptions>
                                        </transition>
                                    </div>
                                </Listbox>
                            </div>
                            <div class="col-span-6">
                                <label for="client_name" class="block text-sm font-medium text-gray-700">Client Name</label>
                                <input type="text" id="client_name" name="client_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md resize-none" v-model="form.client_name">
                            </div>
                            <div class="col-span-6">
                                <label for="client_org" class="block text-sm font-medium text-gray-700">Client Organization</label>
                                <input type="text" id="client_org" name="client_org" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md resize-none" v-model="form.client_org">
                            </div>
                            <div class="col-span-6">
                                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                                <ckeditor :editor="editor" v-model="form.content"  :config="editorConfig"  tag-name="textarea" ></ckeditor>
                            </div>
                            <div class="col-span-6">
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <i class="fas fa-image mx-auto text-2xl text-gray-400" v-if="form.image==null&&form.from_library==null"></i>
                                        <div class="images-preview-div" v-else>
                                        </div>
                                        <div class="flex text-sm text-gray-600 justify-center">  
                                            <p class="pl-1 text-center">
                                                <label for="image" class="px-5 relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload Image </span>
                                                    <input id="image" name="image" type="file" class="sr-only" @change="selectFile"/>
                                                </label>
                                                or 
                                                <span class="text-indigo-600 hover:text-indigo-500  cursor-pointer" >
                                                    <a :href="chooseLibrary ? '#library': '#'" @click="openLibrary" class="px-5 py-3 font-medium transition duration-500 ease-in-out bg-transparent transform hover:-translate-y-1 hover:scale-110 ">
                                                        {{ !chooseLibrary ? 'Choose from Media Library':'Close Media Library' }}
                                                    </a>
                                                </span>
                                            </p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            Only PNG, JPG are allowed, must be not more than 1MB/1,024KB.
                                        </p>
                                        <div id="library" class="py-8 px-4 w-full h-auto  bg-gray-100 overflow-x-auto" v-if="chooseLibrary">
                                            <span v-if="form.from_library!=null" class="txt-lg font-semibold block"> {{form.from_library}} is selected</span>
                                            <div class="flex flex-wrap flex-row -mx-4 py-8 overflow-x-visible ">
                                                <div v-for="(media, index) in medias" :key="index" :index="index"  @click="setFrLib(index,media)" class="lg:w-1/4 m-w-1/4   m-4 p-4  bg-white relative">
                                                <i class="fas fa-check-circle absolute  top-0 right-0 inline-flex   m-2" :class="(index==form.from_library) ? 'text-green-700' : 'text-gray-400  opacity-75'"></i>
                                                    <img v-if="media" class="rounded shadow-md  mt-1 object-contain h-48 w-full" :src="media" :alt="index">
                                                    {{index }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                        </button>
                    </div>
                </div>
            </form>
        </div> 
    </div>
</template>

<script>
import AppHeaderSmall from "./../../../Partials/AppHeaderSmall";
import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
import {inject, reactive, computed, ref} from "vue";
import {Listbox, ListboxButton, ListboxOptions, ListboxOption,} from '@headlessui/vue';
import {Inertia} from "@inertiajs/inertia";
import {usePage} from "@inertiajs/inertia-vue3";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
    name: "Create",
    props: {
        errors: Object
    },
    components: {
        ErrorsAndMessages,
        AppHeaderSmall,
        Listbox,
        ListboxButton,
        ListboxOptions,
        ListboxOption

    },
    setup() {
        
        const user = computed(() => usePage().props.value.auth.user);
        const form = reactive({
            ratings: null,
            stars:null,
            client_name: null,
            client_org:null,
            content: null,
            image: null,
            category:null,
            from_library: null,
            _token: usePage().props.value.csrf_token
        });
        

        const route = inject('$route');

        function selectFile($event) {

             if ($event.target.files) {
                    for (let i = 0; i < $event.target.files.length; i++) {
                        var file = $event.target.files[i];
                               
                        var reader = new FileReader();
                        reader.onload = (function(currFile, x, total) {
                            var fileName = currFile.name
                            return function(event){
                                 $("div.images-preview-div").html("")
                                  $($.parseHTML(`
                                        <img src="${event.target.result}" class="object-contain h-48 w-full" alt="${fileName}">
                                        `))                            
                                    .appendTo("div.images-preview-div");
                            };
                        })(file, i,$event.target.files.length).bind(this);
                        reader.readAsDataURL($event.target.files[i]);
                    }
              }
            form.image = $event.target.files[0];
            form.from_library = null
        }

        function submit() {
            Inertia.post(route('testimonial.store'), form, {
                forceFormData: true,
            });
        }
        const categories = computed(() => usePage().props.value.categories);
        const medias = computed(() => usePage().props.value.medias);
        form.category = ref(2)
        return {
            form, categories,submit, selectFile,user,medias
        }
    },
    mounted(){
        this.form.author = this.user.name
        this.selected = this.form.category
    }, 
    methods: {
        openLibrary: function(){

           this.chooseLibrary = !this.chooseLibrary

           $("#image").val('')
           this.form.from_library =null
        },

        setFrLib(val,img){
            if(this.form.from_library == val)
                val = null

             $("div.images-preview-div").html($.parseHTML(`<img src="${img}" class="object-contain h-48 w-full">`))                            
            
             this.form.from_library = val
             this.form.image =null

        },
        showStars: function(){
            var ratings = parseInt(this.form.ratings.toString().split('.')[0]);

            let tmpStar = ''
            for(let s=0; s <= (ratings===0&&(this.form.ratings * 2)===1 ? ratings:ratings-1); s++){
                (ratings===0)? '' : tmpStar += '<i class="fas fa-star" aria-hidden="true"></i>';
            }
            if(this.form.ratings-ratings === 0.5){
                tmpStar += '<i class="fas fa-star-half" aria-hidden="true"></i>'
            }
            this.form.stars = tmpStar
        },
    },
    data: () => ({
            data: null,
            chooseLibrary : false,
            editor: ClassicEditor,
            
            editorConfig: {
           
                toolbar: ['heading', '|', 'bold',  'italic', 'bulletedList', 'numberedList', 'blockQuote', 'link', 'insertTable', 'tableColumn', 'tableRow','|' , 'undo', 'redo'],
                language: 'en',
                height: '30%',
                table: {
                    contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells',  ],
        
                }
            }

    }),
 
    
}

</script>

