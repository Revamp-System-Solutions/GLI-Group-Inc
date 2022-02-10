<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<div class="flex bg-gray-100">
    <app-header-small></app-header-small>
    <!-- content -->
    <div id="content-area" class="max-w-7xl md:w-9/12 mx-auto ">
      <span class="text-xl inline-block p-3 font-semibold text-gray-700">
                    Site Settings
      </span>
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
      <Disclosure  > <!-- COLORS SECTION -->
        <DisclosureButton @click="isHashSiteColor=!isHashSiteColor" class="my-2 flex justify-between w-full py-4 px-6 font-medium text-left text-white bg-gray-700 rounded-lg" >
          <span class="text-xl"><i class="fas fa-palette mx-2"></i> Site Colors</span>
          <span class="fas " :class="[isHashSiteColor ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-white ']" aria-hidden="true"></span>
        </DisclosureButton>
         <div v-show="isHashSiteColor" id="SiteColors">
        <DisclosurePanel class="lg:px-6 lg:pt-4 lg:pb-2 bg-opacity-50 bg-gray-100 text-sm rounded-lg" static>
            <div class=" grid grid-cols-2 gap-y-2">
              <div v-for="(system_color_group,index) in system_colors" :index="index" :key="system_color_group" :class="index=='CLIENT BRANDING' ? 'col-span-2':'col-span-1'" class="border-b border-gray-500 border-dotted">
                <div class="px-6 lg:bg-transparent bg-gray-300">
                  <span class="text-base font-semibold text-gray-900 normal-case">{{ index }}</span>
                </div>
                <div class="flex lg:p-6 py-4 pl-8 space-x-8" >
                  <div class="flex flex-col"  v-for="(system_color,index) in system_color_group" :index="index" :key="system_color">
                      <div class="flex-shrink-0 rounded-full h-11 w-11 border border-black self-center" :style="rgba2hex('rgba('+system_color.value+')', 'style')"></div>
                      <div class="text-sm text-black">{{ system_color.alias }}</div>
                      <div class="text-sm font-medium text-gray-900 capitalize">
                          <span @click="
                              openModal('color');
                              stageColor = system_color;
                            " class="block text-gray-500 cursor-pointer"> <i class="fas fa-edit text-green-600 mr-2"> </i> change color</span>
                      </div>
                  </div>
                </div>
              </div>
              </div>
        </DisclosurePanel>
         </div>
      </Disclosure>
      <Disclosure v-slot="{ open }" >  <!-- BRANDING SECTION -->
          <DisclosureButton class="my-2 flex justify-between w-full py-4 px-6 font-medium text-left text-white bg-gray-700 rounded-lg">
            <span class="text-xl"><i class="fas fa-images mx-2"></i> Site Branding</span>
            <span class="fas " :class="[open ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-white ']" aria-hidden="true"></span>
          </DisclosureButton>
          <div v-show="open">
          <DisclosurePanel class="lg:px-6 lg:pt-4 lg:pb-2 grid gap-0 lg:grid-cols-2 grid-cols-1 divide-y divide-gray-200 bg-opacity-50 bg-gray-100 text-sm rounded-lg" static>

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
          </div>
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

            <div  class="inline-block w-full max-w-xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
              <DialogTitle as="h3" class="text-lg font-medium  p-6 leading-6 text-white bg-gray-700">
                {{caller==='brand'? 'Change '+stageImg.media_name:caller==='category' ?  (typeof this.stageCat === 'object') ? 'Update Sub-Category: '+stageCat.name: stageCat+': Add new Sub-Category' :stageColor.alias}}
              </DialogTitle>
              <div class="mt-2 p-6">
                <upload-media :stage-image="stageImg" :type="iType" @submit-image="setNewBrandImage" v-if="caller==='brand'"/>
                 <create-category  :stage-category="stageCat" @submit-category="setNewCategory" v-if="caller==='category'"/>
                 <color-picker :stage-colors="stageColor" @submit-color="setFormColor" v-if="caller==='color'"/>
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
import UploadMedia from '../Media/UploadMedia';
import CreateCategory from '../Category/CreateCategory';
import ColorPicker from './ColorPicker';
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject, reactive, ref} from "vue";
import { TransitionRoot, TransitionChild, Dialog, DialogOverlay, DialogTitle, Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'

export default {
    name: "SiteSetting",
    components: {
        ErrorsAndMessages,
        AppHeaderSmall,
        UploadMedia,
        CreateCategory,
        ColorPicker,
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
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
        stageColors: {
          Type: Object,
          default: null
        },
    },
    data: () => ({
        stageColor: [],
        stageImg: [],
        iType:'UlZNUF9DTElFTlRfRklMRQ==',
        success:false,
  	}),
    methods: {


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
        console.log(system_colors.value)
        const colorLinks = null;

        const static_images = computed(() => usePage().props.value.static_images);

        const categories = computed(() => usePage().props.value.categories);

        const user = computed(() => usePage().props.value.auth.user);

        function submitColor() {
            Inertia.post(route('settings.color.change'), newcolor, {
                forceFormData: true,
                replace:false,
                preserveState: true,
                onSuccess: () =>{
                    isOpen.value = false
                }
            });
        }
        function submitBrandImg() {
            Inertia.post(route('settings.branding.change'), newBrandImage, {
                  forceFormData: true,
                  preserveState:true,
                  onError: (event) =>{console.log(event)},
                  onSuccess: () =>{
                    isOpen.value = false
                  }
            });
        }
         function submitCat() {
            if(newCategory.action=='new'){
              Inertia.post(route('settings.subcat.new'), newCategory, {
                  forceFormData: true,
                  preserveState:true,
                  replace:false,
                  onError: (event) =>{console.log(event)},
                  onSuccess: () =>{
                    isOpen.value = false
                  }
              });
            }else{
              Inertia.post(route('settings.subcat.update', {'action':newCategory.action}), newCategory, {
                  forceFormData: true,
                  preserveState:true,
                  replace:false,
                  onError: (event) =>{console.log(event)},
                  onSuccess: () =>{
                    isOpen.value = false
                  }
                });
            }

         }
          const deleteCat = (subcat) => {

            Inertia.delete(route('settings.subcat.destroy', {subcat}));
        }
        const isHashSiteColor = location.hash === '#SiteColors'
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
            isHashSiteColor,
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
                newCategory.action = value.action;
                submitCat()
           },
            setFormColor (ncolor){
              newcolor.alias = ncolor.alias
              newcolor.color = ncolor.color
              submitColor()

            },
            setNewBrandImage(value){
              newBrandImage.media_name = value.media_name;
              newBrandImage.image = value.image;
              newBrandImage.type = value.type;
              submitBrandImg()
            },
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

          }
    },

}
</script>
