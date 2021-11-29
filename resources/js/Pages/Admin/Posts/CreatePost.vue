<template>
  <errors-and-messages :errors="errors"></errors-and-messages>
<app-header-small></app-header-small>
   <div class="flex flex-row">
        <app-sidebar></app-sidebar>
        <div id="content-area" class="w-full h-auto bg-gray-50">
          <div class="h-auto"> 
          <span class="text-xl inline-block p-3 font-semibold">Create Blog Posts</span>
            
              <div class="flex flex-col justify-center px-4 py-2" >

                    <form method="post" @submit.prevent="submit" class="px-24">
                    


                        <div id="postHeaders" class=" capitalize">
                            <div class="form-group py-3 flex flex-row" >
                                <label for="title" class="text-lg w-1/12 mr-2">Title:</label>
                                <input type="text"  name="title" id="title" class="w-11/12 px-4 py-3 rounded" v-model="form.title" />
                            </div>
                            <div class="form-group py-3 flex flex-row">
                                <label for="slug" class="text-lg w-1/12 mr-2">Slug:</label>
                                <input type="text" id="slug" name="slug" class="w-11/12 px-4 py-3 rounded" v-model="form.slug">
                            </div>
                            <div class="form-group py-3 text-gray-600 flex flex-row">
                                <label for="author" class="text-sm w-1/12">author:</label>
                                <input type="text" id="author" name="author" class="w-11/12 text-sm bg-transparent border-0" v-model="form.author">   
                            </div>   
                            <div class="form-group py-3 flex flex-row">
                                <label for="categories" class="text-lg w-1/12 mr-2">Category:</label>
                                <div class="w-11/12">
                                    <select name="categories" id="categories" class="w-full py-3 rounded "  v-model="form.category">
                                        <template  v-for="(category, index) in categories" :key="category.id" :index="index">
                                        <option :value="index">{{category}}</option>
                                        </template>
                                    </select>   
                                </div>
                            </div> 
                        </div>
                        

                        <div class="form-group py-3 flex flex-row">
                            <label for="short_text" class="text-lg w-1/12 mr-2">Short Text:</label>
                            <textarea id="short_text" name="short_text" class="w-11/12 px-4 py-3 rounded" v-model="form.short_text"></textarea>
                            
                        </div>
                        <div class="form-group py-3 flex flex-row">
                            <label for="content"  class="text-lg w-1/12 mr-2">Content:</label>
                            <div class="w-11/12 ">
                                 <ckeditor :editor="editor" v-model="form.content"  :config="editorConfig"  tag-name="textarea" ></ckeditor>
                            </div>
                        </div>

                        <div class="form-group py-3 flex flex-row">
                            <label for="image" class="text-lg w-1/12 mr-2">Select Image:</label>
                            <div class="w-11/12 relative">
                                <input type="file" id="image" name="image" class="border border-gray-500 px-4 py-3 rounded" @change="selectFile">
                                <span class="mx-4">Or</span>
                                <span class="text-blue-700 cursor-pointer" >
                                     <button @click.prevent="openLibrary" class="transition duration-500 ease-in-out bg-blue-600 hover:bg-red-600 transform hover:-translate-y-1 hover:scale-110 ">
                                    Choose from Media Library
                                    </button>
                                    </span>
                                <div class="py-8 px-4 w-full absolute" v-if="chooseLibrary">
                                        <div class="flex flex-wrap -mx-4 -mb-8">
                                            <div v-for="(media, index) in medias" :key="index" :index="index" class="lg:w-1/4 m-w-1/4  h-16 max-h-16 px-4 mb-8">
                                            
                                                <img v-if="media" class="rounded shadow-md object-contain h-48 w-full" :src="media" :alt="index">
                                                {{index }}
                                            </div>
                                         </div>
                                    </div>
                            </div>
                        </div>
                         <div class="form-group py-3 flex w-full justify-end">
                        <input type="submit" class=" px-4 py-3 rounded w-36 text-white text-lg bg-green-600 hover:bg-green-200 hover:text-black transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110" value="Save" />
                         </div>
                    </form>

              </div>
          </div> 
        </div>
    </div>

 
</template>

<script>
import AppHeaderSmall from "./../../../Partials/AppHeaderSmall";
import AppSidebar from "./../../../Partials/AppSidebar";
import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
import {inject, reactive, computed} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {usePage} from "@inertiajs/inertia-vue3";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
    name: "Create",
       props: {
        errors: Object
    },
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        const form = reactive({
            title: null,
            slug: null,
            short_text:null,
            author: null,
            content: null,
            image: null,
            category:null,
            _token: usePage().props.value.csrf_token
        });
        
        const route = inject('$route');

        function selectFile($event) {
            form.image = $event.target.files[0];
        }

        function submit() {
            Inertia.post(route('post.store'), form, {
                forceFormData: true
            });
        }
        const categories = computed(() => usePage().props.value.categories);
        const medias = computed(() => usePage().props.value.medias);
        console.log(medias)
        return {
            form, categories,submit, selectFile,user,medias
        }
    },
    mounted(){
        this.form.author = this.user.name
    }, 
    methods: {
        openLibrary(){
           alert('tehee');
           this.chooseLibrary != this.chooseLibrary
        },
    },
    data: () => ({
            chooseLibrary:true,
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
    components: {
        ErrorsAndMessages,
        AppHeaderSmall,
        AppSidebar
    },
    
}
</script>

<style scoped>
    form {
        margin-top: 20px;
    }
</style>
