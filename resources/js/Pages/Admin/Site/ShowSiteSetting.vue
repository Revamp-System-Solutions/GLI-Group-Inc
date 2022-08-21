<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<div class="flex bg-gray-100">
    <app-header-small :user="user" :menu-links="menuLinks" :menu-sub-links="menuSubLinks" />
    <!-- content -->
    <div id="content-area" class="max-w-7xl md:w-9/12 mx-auto ">
      <span class="text-xl inline-block p-3 font-semibold text-gray-700">
                    Site Settings
      </span>
      <Disclosure v-slot="{ open }" >  <!-- GENERAL -->
          <DisclosureButton class="my-2 flex justify-between w-full py-4 px-6 font-medium text-left text-white bg-gray-700 rounded-lg">
            <span class="text-xl"><i class="fa-solid fa-sliders mx-2"></i> General</span>
            <span class="fas " :class="[open ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-white ']" aria-hidden="true"></span>
          </DisclosureButton>
          <div v-show="open">
          <DisclosurePanel class="lg:px-6 lg:pt-2 lg:pb-2 text-sm rounded-lg text-black space-y-2" static>

             <template v-for="(setting,index) of settings" :key="index">
                  <div  class="flex flex-col pb-2 border-b border-gray-700 space-y-2" v-for="(s,i) of setting"  :key="i">                                 
                      <div class="text-lg font-bold text-gray-900 py-2 px-4 w-full border-b-2 rounded rvmp-brand-border-highlight bg-gray-700 bg-opacity-40">{{s.attribute}}</div>
                      <form  method="post" :id="index+'frm'" @submit.prevent="submitGenSetting(s)" class="text-sm font-bold text-gray-700 grid grid-cols-2 w-full gap-2">
                          <template v-for="(value,i2) in s.value" :key="i2" >
                          
                            <span class="flex flex-col justify-center items-start w-full" :class="i2.startsWith('0_')? 'col-span-2':'col-span-1'" >
                              <iframe v-if="s.short_name==='gmap_noapi'" class="w-full h-112 bg-cover bg-top bg-local" id="gmap_canvas" src="https://google-map-generator.com/" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                <label :for="i2" class="block uppercase font-normal text-xs">{{formatLabel(i2)}}</label>
                                
                                <input type="text" v-if="i2 !== 'pin_position_latitude' && i2 !== 'pin_position_longitude' && i2 !== 'zoom' && s.short_name!=='social_links' " :name="i2" :id="i2"  class="min-w-max w-full rounded-md" :value="value"  @input="setFormData($event.target.value, s.value,i2)">
                                <input type="number" step="any" v-else-if="(i2 === 'pin_position_latitude' || i2 == 'pin_position_longitude' || i2 == 'zoom') && s.short_name!=='social_links'" :name="i2" :id="i2"  class="min-w-max w-full rounded-md" :value="parseFloat(value)"  @input="setFormData($event.target.value, s.value,i2)">

                                <div v-else-if="s.short_name==='social_links'" class="w-full flex flex-col space-y-2">
                                  <div class="flex flex-wrap space-x-2 gap-y-2">
                                    <div v-for="(tag, index) in value"  :key="tag" class="flex bg-gray-700 bg-opacity-30 font-normal text-xs max-w-max rounded-md text-blue-700 group">
                                      <div class="p-2 cursor-pointer text-white  bg-black bg-opacity-70 hover:bg-red-700 text-center rounded-l-md border-r-2 rvmp-brand-border-highlight" @click="removeLink(value,index)">x</div>
                                      <div class="p-2 group cursor-pointer" @click="editLink(value, index, i2)"> <span class="group-hover:hidden block">{{ tag.alias }}</span> <span class="group-hover:block hidden">{{ tag.link }}</span> </div>
                                    </div>
                                  </div>
                                    <div class="flex space-x-2">
                                        <input type="hidden" :id="`${i2}-lnk-ind`"/>
                                        <input type="text" :id="`${i2}-lnk-nm`" class="w-1/3 rounded-md" placeholder="Input Link alias " @keydown.enter.prevent=""/>
                                        <input type="text" :id="`${i2}-lnk`" class="w-2/3 rounded-md" placeholder="Paste Link and Press Enter to add link " @keydown.enter.prevent="addLink(value,$event)"/>
                                    </div>
                                    
                                </div>
                                 
                            
                            </span>
                            
                          </template>
                          <span>

                          </span>
                          <span class="flex justify-end">
                            <button type="submit" class="px-4 py-2 rounded w-36 text-white text-lg bg-green-600 hover:bg-green-200 hover:text-black transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">Save</button>
                          </span>
                          
                      </form>
                  </div>                                
               </template>
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
       <Disclosure v-slot="{ open }" >  <!-- SERVICES SECTION -->
          <DisclosureButton class="my-2 flex justify-between w-full py-4 px-6 font-medium text-left text-white bg-gray-700 rounded-lg">
            <span class="text-xl"><i class="fas fa-hand-holding-heart mx-2"></i> Services</span>
            <span class="fas " :class="[open ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-white ']" aria-hidden="true"></span>
          </DisclosureButton>
          <div v-show="open">
            <DisclosurePanel class="lg:px-6 lg:pt-4 lg:pb-2 grid gap-0 lg:grid-cols-2 grid-cols-1 divide-y divide-gray-200 bg-opacity-50 bg-gray-100 text-sm rounded-lg" static>

          
            </DisclosurePanel>
          </div>
      </Disclosure>
      <Disclosure v-slot="{ open }" >  <!-- MENU LINKS SECTION -->
          <DisclosureButton class="my-2 flex justify-between w-full py-4 px-6 font-medium text-left text-white bg-gray-700 rounded-lg">
            <span class="text-xl"><i class="fas fa-link mx-2"></i> Menu Links</span>
            <span class="fas " :class="[open ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-white ']" aria-hidden="true"></span>
          </DisclosureButton>
          <div v-show="open">
            <DisclosurePanel class="lg:px-6 lg:pt-4 lg:pb-2 grid gap-0 lg:grid-cols-2 grid-cols-1 divide-y divide-gray-200 bg-opacity-50 bg-gray-100 text-sm rounded-lg" static>

          
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
      linkEditMode: false,
        stageColor: [],
        stageImg: [],
        iType:'UlZNUF9DTElFTlRfRklMRQ==',
        success:false,
        socialN:{
          '0_fb' : 'facebook',
          '0_ig' : 'instagram',
          '0_yt' : 'youtube',
          '0_twttr' : 'twitter',
          '0_lnkdn' : 'LinkedIn'
        }
  	}),
    setup() {
        const newcolor = reactive({
            alias: null,
            color: null,
            _token: usePage().props.value.csrf_token
        });
        const formSettings = reactive({
            id:null,
            attribute:null,
            short_name: null,
            value: null,
            _token: usePage().props.value.csrf_token,
            _method: "POST"
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
        const currentlyChanging = ref(null)
        const route = inject('$route');

        const system_colors = computed(() => usePage().props.value.system_colors);
        
        const colorLinks = null;

        const static_images = computed(() => usePage().props.value.static_images);

        const categories = computed(() => usePage().props.value.categories);

        const user = computed(() => usePage().props.value.auth.user);

        const settings = computed(() => usePage().props.value.settings);
        

        var site_profile = settings.value['00_client_inf'][0]['value']
       
      var full_address = (site_profile['0_site_name'].split(" ")).join('%20')+ ',%20'+ (site_profile['address_line_1'].split(" ")).join('%20')+ ',%20'+ (site_profile['address_line_2'].split(" ")).join('%20') + ',%20' + (site_profile['town'].split(" ")).join('%20') + ',%20' + (site_profile['postal_code'].split(" ")).join('%20')+ '%20' + (site_profile['state'].split(" ")).join('%20')
      const embed_url = `https://maps.google.it/maps?q=${full_address}&t=&z=19&ie=UTF8&iwloc=&output=embed`

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
        function submitGenSetting(sn) {
              formSettings.id = sn.id
              formSettings.attribute = sn.attribute
              formSettings.short_name =  sn.short_name
              formSettings.value = JSON.stringify(sn.value)
              Inertia.post(route('settings.general.update'), formSettings, {
                  forceFormData: true,
                  preserveState:true,
                  replace:false,
                  onError: (event) =>{console.log(event)},
                  onSuccess: () =>{
                    //
                  }
                });   
        }
        const deleteCat = (subcat) => {
            Inertia.delete(route('settings.subcat.destroy', {subcat}));
        }
        const isHashSiteColor = location.hash === '#SiteColors'
       const menuLinks = computed(() => usePage().props.value.page_links.parentLinks);
		const menuSubLinks = computed(() => usePage().props.value.page_links.subLinks);
		
        return {
            menuLinks,
			    menuSubLinks,
            newcolor,
            caller,
            stageCat,
            newBrandImage,
            formSettings,
            system_colors,
            newCategory,
            settings,
            submitColor,
            submitBrandImg,
            submitCat,
            submitGenSetting,
            user,
            static_images,
            categories,
            isOpen,
            currentlyChanging,
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
    methods:{
      setFormData(value,arr, index){
        arr[index]=value
      },
      formatLabel(lbl){
        return ['0_fb','0_ig','0_yt','0_twttr','0_lnkdn'].includes(lbl) ? this.socialN[lbl] : (lbl.includes('_') ? (lbl.startsWith('0_')? (lbl.substring(2)).split('_').join(' '):lbl.split('_').join(' ')):lbl)
      },
      addLink(arr,ev){
       
        var ln_id = $(`#${ev.target.id}`).prev().attr('id')
      var ln_nm = $(`#${ln_id}`).val()
          if(ln_nm !== ''){
            
      
          var ln_dt = {alias: ln_nm, link: ev.target.value}
          this.linkEditMode ? this.setEdit(arr, ln_dt, ln_id): arr.push(ln_dt)
        $(`#${ln_id}`).val('')
          ev.currentTarget.value = ""
        }
        
      },
      setEdit(arr, ln_dt, ln_id){
        var ind_id = $(`#${ln_id}`).prev().attr('id')
        var index = $(`#${ind_id}`).val()
        arr[parseInt(index)]['alias'] = ln_dt.alias
        arr[parseInt(index)]['link'] = ln_dt.link
         this.linkEditMode = false
      },
      removeLink(arr,index){
        arr.splice(index,1)
      },
       editLink(arr,index,cat){
        this.linkEditMode = true
         $(`#${cat}-lnk-ind`).val(index)
        $(`#${cat}-lnk-nm`).val(arr[index]['alias'])
        $(`#${cat}-lnk`).val(arr[index]['link'])
      },

    }

}
</script>
<style scoped>
  /* .tag-input {
    width: 100%;
    border: 1px solid #eee;
    font-size: 0.9em;
    height: 50px;
    box-sizing: border-box;
    padding: 0 10px;
  }

  .tag-input__tag {
    height: 30px;
    float: left;
    margin-right: 10px;
    background-color: #eee;
    margin-top: 10px;
    line-height: 30px;
    padding: 0 5px;
    border-radius: 5px;
  }

  .tag-input__tag > span {
    cursor: pointer;
    opacity: 0.75;
  }

  .tag-input__text {
    border: none;
    outline: none;
    font-size: 0.9em;
    line-height: 50px;
    background: none;
  } */
</style>