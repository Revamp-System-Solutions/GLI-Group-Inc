<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<app-header-small></app-header-small>
  <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28">
      <h2 class="font-semibold text-3xl my-4">Site Settings</h2>
      <Disclosure v-slot="{ open }" > <!-- CATEGORY SECTION -->
        <DisclosureButton class="my-2 flex justify-between w-full py-4 px-6 font-medium text-left text-white bg-gray-700 rounded-lg">
          <span class="text-xl"><i class="fas fa-bookmark mx-2"></i> Category</span>
          <span class="fas " :class="[open ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-white ']" aria-hidden="true"></span>
        </DisclosureButton>
        <DisclosurePanel class="lg:px-6 lg:pt-4 lg:pb-2 grid gap-0 lg:grid-cols-3 grid-cols-1 divide-y divide-gray-200 bg-opacity-50 bg-gray-100 text-sm rounded-lg">

              <template v-for="(category,index) in categories" :key="category" :index="index">
                <div class="p-6 lg:col-span-1">
                  <span class="text-base text-gray-900">{{ index }}</span> 
                   <span  class="ml-4 inline-block border py-1 px-3 rounded border-green-700 text-green-700 text-base font-normal hover:bg-green-700 hover:text-white cursor-pointer" @click="stageCat=index; openModal('category')" ><i class="fas fa-plus-circle"></i> Add New </span>
                </div>
                <div class="p-6  lg:col-span-2 ">
                  <div class="grid gap-0 grid-cols-2 divide-y divide-gray-200">
                  <template v-for="subcategory in category.data" :key="subcategory" :index="subcategory.name">
                    <div class="p-6 ">
                      <span class="text-base text-gray-900">{{subcategory.name}}</span> 
                      <div class="text-sm text-gray-500">{{ subcategory.description }}</div>
                    </div>
                    <div class="p-6 grid gap-4 grid-cols-2 place-items-center" >
                      <span class="action-btn capitalize cursor-pointer" v-if="subcategory.defined_permission!=''" @click="stageCat=subcategory; openModal('category')" v-html="subcategory.defined_permission[0]"> </span>
                      <span class="action-btn capitalize cursor-pointer" v-if="subcategory.defined_permission!=''" @click="deleteCat(subcategory.name)" v-html="subcategory.defined_permission[1]"> </span>
                    </div>
                  </template>
                  </div>
                   <nav aria-label="Page navigation" v-if="category.total > category.per_page" style="margin-top: 20px" class="w-1/5 mx-auto">
                  <ul class="pagination  flex flex-row justify-between">
                      <!-- Previous link -->
                      <li :class="'page-item' + (category.links[0].url == null ? ' disabled' : '')">
                          <inertia-link :href="category.links[0].url == null ? '#' : category.links[0].url" class="page-link" v-html="category.links[0].label" preserve-state preserve-scroll></inertia-link>
                      </li>
                      
                      <!-- Numbers
                      <li v-for="item in colorLinks" :class="'page-item' + (item.active ? ' disabled' : '')" :key="item">
                          <inertia-link :href="item.active ? '#' : item.url" class="page-link" v-html="item.label"></inertia-link>
                      </li> -->

                      <!-- Next link -->
                      <li :class="'page-item' + (category.links[category.links.length - 1].url == null ? ' disabled' : '')">
                          <inertia-link :href="category.links[category.links.length - 1].url == null ? '#' : category.links[category.links.length - 1].url" class="page-link" v-html="category.links[category.links.length - 1].label" preserve-state preserve-scroll></inertia-link>
                      </li>
                  </ul>
              </nav>
                </div>
              </template>
        </DisclosurePanel>
      </Disclosure>
      <Disclosure v-slot="{ open }" > <!-- COLORS SECTION -->
        <DisclosureButton class="my-2 flex justify-between w-full py-4 px-6 font-medium text-left text-white bg-gray-700 rounded-lg">
          <span class="text-xl"><i class="fas fa-palette mx-2"></i> Site Colors</span>
          <span class="fas " :class="[open ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-white ']" aria-hidden="true"></span>
        </DisclosureButton>
        <DisclosurePanel class="lg:px-6 lg:pt-4 lg:pb-2 bg-opacity-50 bg-gray-100 text-sm rounded-lg">
            <div class=" grid gap-0 lg:grid-cols-2 grid-cols-1 divide-y divide-gray-200">
              <template v-for="system_color in system_colors.data" :key="system_color">
                <div class="p-6 lg:bg-transparent bg-gray-300">
                  <div class="text-base text-gray-900">{{ system_color.alias }} </div>
                  <div class="text-sm text-gray-500">{{ system_color.description }}</div>
                </div>
                <div class="lg:p-6 py-4 pl-8">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 rounded-full h-11 w-11 border border-black" :style="rgba2hex('rgba('+system_color.value+')', 'style')">

                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900 capitalize">
                        <span class="block">{{ system_color.value }}</span>
                        <span class="block">{{ rgba2hex('rgba('+system_color.value+')', 'hex') }}</span>
                        <span @click="
                            openModal('color');
                            color = 'rgba('+system_color.value+')';
                            stageColor = system_color;
                            oldColor.alias = system_color.alias;
                            oldColor.value = system_color.value;
                          " class="block text-gray-500 cursor-pointer"> <i class="fas fa-edit text-green-600"> </i>change color</span>
            
                      </div>
                    </div>
                  </div>
                </div>
              </template>
              </div>
              <nav aria-label="Page navigation" v-if="system_colors.total > system_colors.per_page" style="margin-top: 20px" class="w-1/5 mx-auto">
                  <ul class="pagination  flex flex-row justify-between">
                      <!-- Previous link -->
                      <li :class="'page-item' + (system_colors.links[0].url == null ? ' disabled' : '')">
                          <inertia-link :href="system_colors.links[0].url == null ? '#' : system_colors.links[0].url" class="page-link" v-html="system_colors.links[0].label" preserve-state preserve-scroll></inertia-link>
                      </li>
                      
                      <!-- Numbers -->
                      <li v-for="item in colorLinks" :class="'page-item' + (item.active ? ' disabled' : '')" :key="item">
                          <inertia-link :href="item.active ? '#' : item.url" class="page-link" v-html="item.label" preserve-state preserve-scroll></inertia-link>
                      </li>

                      <!-- Next link -->
                      <li :class="'page-item' + (system_colors.links[system_colors.links.length - 1].url == null ? ' disabled' : '')">
                          <inertia-link :href="system_colors.links[system_colors.links.length - 1].url == null ? '#' : system_colors.links[system_colors.links.length - 1].url" class="page-link" v-html="system_colors.links[system_colors.links.length - 1].label" preserve-state preserve-scroll></inertia-link>
                      </li>
                  </ul>
              </nav>
        </DisclosurePanel>
      </Disclosure>
      <Disclosure v-slot="{ open }" >  <!-- BRANDING SECTION -->
          <DisclosureButton class="my-2 flex justify-between w-full py-4 px-6 font-medium text-left text-white bg-gray-700 rounded-lg">
            <span class="text-xl"><i class="fas fa-images mx-2"></i> Site Branding</span>
            <span class="fas " :class="[open ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-white ']" aria-hidden="true"></span>
          </DisclosureButton>
          <DisclosurePanel class="lg:px-6 lg:pt-4 lg:pb-2 grid gap-0 lg:grid-cols-2 grid-cols-1 divide-y divide-gray-200 bg-opacity-50 bg-gray-100 text-sm rounded-lg">

                <template v-for="static_image in static_images" :key="static_image">
                  <div class="p-6">
                    <span class="text-base text-gray-900">{{ static_image.media_name }} 
                     </span>
                    <p>{{ static_image.description }}</p>
                  </div>
                  <div class="p-6">
                      <img v-if="static_image.image_url" class="rounded shadow-md object-contain h-48 w-full mb-4" :src="static_image.image_url" :alt="static_image.media_name">
                       <span @click="
                      openModal('brand');
                      stageImg=static_image" class="cursor-pointer"><i class="fas fa-sync text-green-600"> </i> Update Current Image</span>
                  </div>
                </template>
            </DisclosurePanel>
				</Disclosure>
    </div>

  <TransitionRoot appear :show="isOpen">
    <Dialog as="div" @close="closeModal">
      <div class="fixed inset-0 z-30 overflow-y-auto bg-gray-600 bg-opacity-30 ">
        <div class="min-h-screen px-4 text-center">
          <TransitionChild  
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0">
            <DialogOverlay class="fixed inset-0" />
          </TransitionChild>
          <span class="inline-block h-2/4 align-middle" aria-hidden="true">
            &#8203;
          </span>
          <TransitionChild
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95">
            <div v-if="caller==='color'" class="inline-block w-full max-w-xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
              <DialogTitle as="h3" class="text-lg font-medium  p-6 leading-6 text-white bg-gray-700">
                {{stageColor.alias}}
              </DialogTitle>
              <div class="mt-2">
                  <div class="cover grid lg:grid-cols-2 lg:gap-4  grid-cols-1 gap-0 px-6">
                    <ColorPicker
                    class="!w-56 col-span-1"
                    theme="dark"
                    :color="color"
                    :sucker-hide="true"
                    :sucker-canvas="suckerCanvas"
                    :sucker-area="suckerArea"
                    @changeColor="changeColor"
                    @openSucker="false"/>
                     <div class="col-span-1  grid grid-cols-2 gap-2">
                       <span>
                         <span class="block text-center">New Color</span>
                          <div class="mx-auto rounded-full h-11 w-11 border border-black" :style="rgba2hex(color, 'style')"></div>
                          <span class="block"> {{stageColor.value}}</span>
                          <span class="block">{{ rgba2hex('rgba('+oldColor.value+')', 'hex') }}</span>
                       </span>
                       <span>
                         <span class="block text-center">Current Color</span>
                          <div class="mx-auto rounded-full h-11 w-11 border border-black" :style="rgba2hex('rgba('+oldColor.value+')', 'style')"></div>
                          <span class="block"> {{oldColor.value}}</span>
                          <span class="block">{{ rgba2hex('rgba('+oldColor.value+')', 'hex') }}</span>
                       </span>
                      </div>
                </div>
              </div>

              <div class="mt-4 p-6 w-full flex justify-end">
                <button type="button"  @click="setFormColor" class="  px-4 py-3 rounded w-36 text-white text-lg bg-green-600 hover:bg-green-200 hover:text-black transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110" > Save </button>
              </div>
            </div>
            <div v-if="caller!=='color'" class="inline-block w-full max-w-xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
              <DialogTitle as="h3" class="text-lg font-medium  p-6 leading-6 text-white bg-gray-700">
                {{caller==='brand'? 'Change '+stageImg.media_name:caller==='category' ?  (typeof this.stageCat === 'object') ? 'Update Sub-Category: '+stageCat.name: stageCat+': Add new Sub-Category' :''}}
              </DialogTitle>
              <div class="mt-2 p-6">
                <upload-media :stage-image="stageImg" :type="iType" @submit-image="setNewBrandImage" v-if="caller==='brand'"/>
                 <create-category  :stage-category="stageCat" @submit-category="setNewCategory" v-if="caller==='category'"/>
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
import UploadMedia from '../Media/UploadMedia';
import CreateCategory from '../Category/CreateCategory';
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject, reactive, ref} from "vue";
import { ColorPicker } from 'vue-color-kit'
import { TransitionRoot, TransitionChild, Dialog, DialogOverlay, DialogTitle, Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'

export default {
    name: "SiteSetting",
    components: {
        ErrorsAndMessages,     
        AppHeaderSmall,
        UploadMedia,
        CreateCategory,
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
        ColorPicker,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,

    },
    props: {
        errors: Object,
        stageImage: {
            Type: Object,
            default: null
          },
        type: String,
        stageCategory: {
            Type: Object,
            default: null
          },
    },
    data: () => ({
        oldColor:{
            alias: null,
            value: null
        },
        
        stageColor: [],
        stageImg: [],
        iType:'UlZNUF9DTElFTlRfRklMRQ==',
        success:false,
        color: '#59c7f9',
        suckerCanvas: null,
        suckerArea: [],
        isOpenSucker: false,
  	}),
    methods: {
       rgba2hex(rgba, ch) {
        rgba = rgba.match(
            /^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i
        );
        var prefix = ch=='style' ? 'background: ': '';
        return rgba && rgba.length === 4
            ? prefix+"#"+
                ("0" + parseInt(rgba[1], 10).toString(16)).slice(-2) +
                ("0" + parseInt(rgba[2], 10).toString(16)).slice(-2) +
                ("0" + parseInt(rgba[3], 10).toString(16)).slice(-2)
            : "";
        },
         changeColor(color) {
        const { r, g, b, a } = color.rgba
        this.color = `rgba(${r}, ${g}, ${b})`
 
        this.stageColor.value=`${r}, ${g}, ${b}`
        console.log(this.stageColor)
        },
        setFormColor (){
            this.newcolor.alias = this.stageColor.alias
            this.newcolor.color = this.stageColor.value
            this.submitColor()
            
        },
        setNewBrandImage(value){
          this.newBrandImage.media_name = value.media_name;
           this.newBrandImage.image = value.image;
           this.newBrandImage.type = value.type;
            this.submitBrandImg()
        },
       
     
    },
    setup() {
        const newcolor = reactive({
            alias: null,
            color: null,
            _token: usePage().props.value.csrf_token
        });

        const newBrandImage = reactive({
            media_name  : null,
            type: null,
            image: null,
            _token: usePage().props.value.csrf_token
        });
        const newCategory = reactive({
            name  : null,
            description: null,
            category: null,
            action:null,
            _token: usePage().props.value.csrf_token
        });
        const isOpen = ref(false)
        const caller = ref(null)
        const stageCat= ref(null)

        const route = inject('$route');
        
        const system_colors = computed(() => usePage().props.value.system_colors);
        const colorLinks = system_colors.value.links.filter((v, i) => i > 0 && i < system_colors.value.links.length - 1);

        const static_images = computed(() => usePage().props.value.static_images);
        
        const categories = computed(() => usePage().props.value.categories);

        const user = computed(() => usePage().props.value.auth.user);

        function submitColor() {
            Inertia.post(route('settings.color.change', {'sys_color': newcolor.alias}), newcolor, {
                forceFormData: true,
                preserveState:true,
                onError: (event) =>{console.log(event)},
                onFinish: () =>{
                  isOpen.value = false
                }
            });
        }
        function submitBrandImg() {    
            Inertia.post(route('settings.branding.change'), newBrandImage, {
                  forceFormData: true,
                  preserveState:true,
                  preserveScroll: true,
                   onError: (event) =>{console.log(event)},
                  onFinish: () =>{
                    isOpen.value = false
                  }
            });         
        }
         function submitCat() {  
             Inertia.post(route(newCategory.action=='new' ? 'settings.subcat.new' : 'settings.subcat.update'), newCategory, {
                  forceFormData: true,
                  preserveState:true,
                  preserveScroll: true,
                  onError: (event) =>{console.log(event)},
                  onFinish: () =>{
                    isOpen.value = false
                  }
            });
         }
          const deleteCat = (subcat) => {
           
            Inertia.delete(route('settings.subcat.destroy', {subcat}));
        }
      
        return {
            newcolor,
            caller,
            stageCat,
            newBrandImage,
            colorLinks,
            system_colors,
            newCategory,
            submitColor,
            submitBrandImg,
            submitCat,
            user,
            static_images,
            categories,
            isOpen,
            deleteCat,
            closeModal() {
                isOpen.value = false

                
            },
            openModal(cb) {
                isOpen.value = true
                caller.value=cb
            },
            setNewCategory(value){
                newCategory.name = value.name;
                newCategory.description = value.description;
                newCategory.category = (typeof stageCat.value === 'object') ? stageCat.value.name: stageCat.value;
                console.log(stageCat.value.name)
                newCategory.action = value.action;
                submitCat()
           },
            
            
        }
    },
  
}
</script>