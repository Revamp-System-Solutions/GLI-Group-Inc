<template>
  <errors-and-messages :errors="errors"></errors-and-messages>
  <app-admin-header :current-user="user" @updatePage="onUpdatePage"/>


  <div class="rvmp-container h-auto space-y-0  relative">
    <div class="py-8 px-8 w-full ">
	
	</div>
    
    <div class="w-full static">
	<app-header /><!-- CHANGE/MAKE ADMIN VIEW -->
	</div>
    <div
      class="w-full bg-origin-border bg-cover bg-center bg-local"
      :style="`background-image: url('${pageSection.head_banner.img_url}')`"
    >
      <div
        class="
          h-40
          mx-auto
          2xl:px-40
          xl:px-16
          px-8
          flex
          lg:flex-wrap lg:content-center
          justify-center
          rvmp-banner-bg
          bg-opacity-80
          relative
        "
      >
      <span class="absolute  bottom-0 right-0 ">
             <label for="image-hb" class="p-5 relative cursor-pointer bg-gray-100 rounded-full font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
            <span><i class="fas fa-file-image text-2xl text-blue-400 cursor-pointer group-hover:text-blue-700 "></i>   </span>
            <input id="image-hb" name="image-hb" type="file" class="sr-only" @change="selectFile"/>
      </label>
      </span>
 
        <div class="lg:w-full lg:self-start self-center">
          <template v-if="target === 'head_banner'">
            <div class="relative flex flex-wrap box-border bg-gray-300">
              <span class="absolute -top-6 -right-2 space-x-2">
                <i
                  class="
                    fas
                    fa-check
                    text-2xl text-blue-400
                    cursor-pointer
                    hover:text-blue-700
                  "
                  id="about-lead-text-btn"
                  @click="target = null"
                ></i>
                <i
                  class="
                    fas
                    fa-times
                    text-2xl text-red-400
                    cursor-pointer
                    hover:text-red-700
                  "
                  id="about-lead-text-btn"
                  @click="target = null"
                ></i>
              </span>
              <textarea
                v-model="pageSection.head_banner.text"
                class="
                  static
                  h-14
                  w-full
                  resize-none
                  border-gray-400 border-2
                  px-5
                  brand-text
                  uppercase
                  lg:mt-0
                  mt-8
                  xl:text-3xl
                  text-xl
                  font-bold
                  bg-transparent
                "
              ></textarea>
            </div>
          </template>
          <template v-else>
            <div class="relative">
              <i
                class="
                  fas
                  fa-pen
                  text-2xl text-blue-400
                  absolute
                  -top-2
                  -right-2
                  cursor-pointer
                  group-hover:text-blue-700
                "
                id="about-lead-text-btn"
                @click="editTarget('head_banner')"
              ></i>

              <h1
                class="
                  static
                  border-gray-400 border-2
                  px-5
                  brand-text
                  capitalize
                  cursor-pointer
                  lg:mt-0
                  mt-8
                  xl:text-3xl
                  text-xl
                  font-bold
                  group-hover:bg-gray-200
                  rvmp-banner-text-color
                "
                id="about-lead-text"
                @click="editTarget('head_banner')"
              >
                {{ pageSection.head_banner.text }}
              </h1>
            </div>
          </template>
        </div>
      </div>
    </div>
    <div class="h-auto 2xl:px-64 xl:px-56 lg:px-24">
      <div class="flex lg:flex-row flex-col-reverse h-auto z-0 relative">
        <div class="w-full h-2/3 lg:py-12 lg:pl-0 p-6 static">
          <div class="lg:py-36 lg:my-12 static">
            <div
              class="
                rvmp-bg-alt
                bg-opacity-75
                lg:absolute lg:top-0
                xl:px-16
                lg:pr-28 lg:py-16 lg:my-20 lg:w-7/12
                w-full
                -left-24
                xl:ml-0
                lg:ml-12
              "
            >
            
              <blockquote
                className="self-start border-l-8 rvmp-brand-border-highlight my-2"
              >
                <template v-if="target === 'about_title'">
                  <div class="relative flex flex-row box-border bg-gray-300">
                    <span class="absolute -top-6 -right-2 space-x-2">
                      <i
                        class="
                          fas
                          fa-check
                          text-2xl text-blue-400
                          cursor-pointer
                          hover:text-blue-700
                        "
                        id="company-name-text1-btn"
                        @click="target = null"
                      ></i>
                      <i
                        class="
                          fas
                          fa-times
                          text-2xl text-red-400
                          cursor-pointer
                          hover:text-red-700
                        "
                        id="company-name-text1-btn"
                        @click="target = null"
                      ></i>
                    </span>

                    <textarea
                      v-model="pageSection.about_title.top"
                      class="
                        static
                        h-14
                        resize-none
                        border-gray-400 border-2
                        px-5
                        uppercase
                        lg:mt-0
                        mt-8
                        xl:text-3xl
                         brand-logo-text
                        text-3xl
                        font-semibold
                        bg-transparent
                      "
                    ></textarea>
                    <textarea
                      v-model="pageSection.about_title.bottom"
                      class="
                        static
                        h-14
                        resize-none
                        border-gray-400 border-2
                        px-5
                       
                        uppercase
                        lg:mt-0
                        mt-8
                        xl:text-3xl
                        text-xl
                         brand-logo-text
                              font-thin
                              rvmp-brand-color-highlight
                        bg-transparent
                      "
                    ></textarea>
                  </div>
                </template>
                <template v-else>
                  <div class="relative">
                    <i
                      class="
                        fas
                        fa-pen
                        text-2xl text-blue-400
                        absolute
                        -top-2
                        -right-2
                        cursor-pointer
                        group-hover:text-blue-700
                      "
                      id="company-name-text1-btn"
                      @click="editTarget('about_title')"
                    ></i>

                    <h2
                      class="
                        ml-5
                        brand-logo-text
                        text-3xl
                        font-semibold
                        cursor-pointer
                      "
                      id="company-name-text1"
                    
                    >
                      {{ pageSection.about_title.top }}

                       <span
                            class="
                              brand-logo-text
                              font-thin
                              rvmp-brand-color-highlight
                            
                            "
                            id="company-name-text2"
                           
                            >{{ pageSection.about_title.bottom }}</span
                          >
                  
                    </h2>
                  </div>
                </template>
              </blockquote>

              <template v-if="target === 'about_caption'">
                <div class="relative flex flex-wrap box-border bg-gray-300">
                  <span class="absolute -top-6 -right-2 space-x-2">
                    <i
                      class="
                        fas
                        fa-check
                        text-2xl text-blue-400
                        cursor-pointer
                        hover:text-blue-700
                      "
                      id="lead-subtext-btn"
                      @click="target = null"
                    ></i>
                    <i
                      class="
                        fas
                        fa-times
                        text-2xl text-red-400
                        cursor-pointer
                        hover:text-red-700
                      "
                      id="lead-subtext-btn"
                      @click="target = null"
                    ></i>
                  </span>
                  <textarea
                    v-model="pageSection.about_caption"
                    class="
                      static
                      h-32
                      resize-none
                      border-gray-400 border-2
                      px-5
                      brand-text
                      w-full
                      lg:mt-0
                      mt-8
                    text-justify
                      2xl:text-lg
                      text-sm
                      font-light
                      bg-transparent
                    "
                  ></textarea>
                </div>
              </template>
              <template v-else>
                <div class="relative">
                  <i
                    class="
                      fas
                      fa-pen
                      text-2xl text-blue-400
                      absolute
                      -top-2
                      -right-2
                      cursor-pointer
                      group-hover:text-blue-700
                    "
                    id="lead-subtext-btn"
                    @click="editTarget('about_caption')"
                  ></i>

                  <p
                    class="
                      text-justify
                      2xl:text-lg
                      text-sm
                      brand-text
                      font-light
                      lg:pr-3
                      cursor-pointer
                    "
                 
                   
                  >
                    {{ pageSection.about_caption }}
                  </p>
                </div>
              </template>
            </div>
          </div>
        </div>
        <div
          class="
            w-full
            z-30
            lg:h-auto
            static
            flex flex-wrap
            content-center
            justify-center
            xl:mr-0
            lg:-mr-12
          "
        >
      
      
        <div class="relative">
            <div class="absolute w-full h-full bg-gray-300 z-30 bg-opacity-75  flex justify-center items-center" >
   
                <input type="text" v-model="pageSection.video_url" class="text-black text-sm border-dashed border-blue-400 border-2 font-normal w-full bg-transparent" :disabled="!(target==='video_url')">
                 <i class="fas fa-link text-2xl text-blue-400 cursor-pointer  hover:text-blue-700" id="lead_btn1_slug_btn" @click="editTarget('video_url');" v-if="!(target==='video_url')"></i>
                 <span v-else>
                  <i
                      class="
                        fas
                        fa-check
                        text-2xl text-blue-400
                        cursor-pointer
                        hover:text-blue-700
                      "
                      id="lead-subtext-btn"
                      @click="target = null"
                    ></i>
                    <i
                      class="
                        fas
                        fa-times
                        text-2xl text-red-400
                        cursor-pointer
                        hover:text-red-700
                      "
                      id="lead-subtext-btn"
                      @click="target = null"
                    ></i>
                 </span>
            </div>
            <div class="z-20">
              <YouTube 
                :src="pageSection.video_url" 
                
                width="560"
                    height="314"
                ref="youtube" />
            </div>

        </div>
         
         
        </div>
      </div>
    </div>
    <div class="h-auto w-full bg-transparent">
      <div
        class="flex lg:flex-row flex-col bg-cover bg-no-repeat bg-top bg-local"
        :style="`background-image: url('${pageSection.banner.img_url}')`"
      >
        <div class="w-full py-14 h-auto rvmp-banner-bg bg-opacity-70 relative">
           <span class="absolute  top-0 right-0 ">
             <label for="image-cta" class="p-5 relative cursor-pointer bg-gray-100 rounded-full font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
            <span><i class="fas fa-file-image text-2xl text-blue-400 cursor-pointer group-hover:text-blue-700 "></i>   </span>
            <input id="image-cta" name="image-cta" type="file" class="sr-only" @change="selectFile"/>
      </label>
      </span>
          <div
            class="
              h-44
              text-center
              mt-auto
              w-full
              flex flex-col
              justify-center
              items-center
              rvmp-banner-text-color
              bg-transparent
            "
          >
          <h2 class="brand-logo-text lg:text-3xl text-xl py-2 uppercase">
            <span class="brand-logo-text" id="client-brand">
              <template v-if="target==='banner_title'">
                <div class="relative px-4 max-w-max">
                  <span class="absolute -top-6 -right-2 space-x-2">
                        <i
                          class="
                            fas
                            fa-check
                            text-2xl text-blue-400
                            cursor-pointer
                            hover:text-blue-700
                          "
                          id="mid-text1-btn"
                          @click="target = null"
                        ></i>
                        <i
                          class="
                            fas
                            fa-times
                            text-2xl text-red-400
                            cursor-pointer
                            hover:text-red-700
                          "
                          id="mid-text1-btn"
                          @click="target = null"
                        ></i>
                      </span>
                      <textarea
                        v-model="pageSection.banner.top"
                        class="
                          static
                          h-14
                          resize-none
                          border-gray-400 border-2
                          px-5
                          uppercase
                          lg:mt-0
                          mt-8
                      font-thin
                      brand-logo-text lg:text-3xl text-xl
                          bg-transparent
                        "
                      ></textarea>
                      <textarea
                        v-model="pageSection.banner.bottom"
                        class="
                          static
                          h-14
                          resize-none
                          border-gray-400 border-2
                          px-5
                          uppercase
                          lg:mt-0
                          mt-8
                      font-semibold
                      brand-logo-text lg:text-3xl text-xl
                          bg-transparent
                        "
                      ></textarea>
                <!-- <span class="font-semibold">{{pageSection.banner.top}}</span> -->
                <!-- <span class="font-thin">&nbsp;{{pageSection.banner.bottom}}</span> -->
                </div>
              </template>
              <template v-else>
                <div class="relative px-4 max-w-max" >
                    <i
                      class="
                        fas
                        fa-pen
                        text-2xl text-blue-400
                        absolute
                        -top-2
                        -right-2
                        cursor-pointer
                        group-hover:text-blue-700
                      "
                      id="lead-subtext-btn"
                      @click="editTarget('banner_title')"
                    ></i>
                <span class="font-semibold">{{pageSection.banner.top}}</span>
                <span class="font-thin">&nbsp;{{pageSection.banner.bottom}}</span>
                </div>
              </template>
            </span>
          </h2>  
          <template v-if="target==='banner_caption'">
            <div class="relative px-4 ">
              <span class="absolute -top-6 -right-2 space-x-2">
                    <i
                      class="
                        fas
                        fa-check
                        text-2xl text-blue-400
                        cursor-pointer
                        hover:text-blue-700
                      "
                      id="mid-text1-btn"
                      @click="target = null"
                    ></i>
                    <i
                      class="
                        fas
                        fa-times
                        text-2xl text-red-400
                        cursor-pointer
                        hover:text-red-700
                      "
                      id="mid-text1-btn"
                      @click="target = null"
                    ></i>
                  </span>
                
                  <textarea
                    v-model="pageSection.banner.caption"
                    class="
                      static
                      h-24
                      resize-none
                      border-gray-400 border-2
                      px-5 w-full
                      uppercase
                      lg:mt-0
                      mt-8
                brand-text lg:text-5xl text-xl font-light capitalize
                      bg-transparent
                    "
                  ></textarea>
                  
           
            </div>
          </template>
          <template v-else>
              <div class="relative px-4 max-w-max" >
                  <i
                    class="
                      fas
                      fa-pen
                      text-2xl text-blue-400
                      absolute
                      -top-2
                      -right-2
                      cursor-pointer
                      group-hover:text-blue-700
                    "
                    id="lead-subtext-btn"
                    @click="editTarget('banner_caption')"
                  ></i>
                <h2 class="brand-text lg:text-5xl text-xl font-light capitalize">{{pageSection.banner.caption}}</h2>
              </div>
          </template>
          <template  v-if="target ==='lead_btn1'">
                <div class="relative group mt-5 ">
                    <span class="absolute -top-4 -right-2 space-x-2">
                    <i class="fas fa-check text-2xl text-blue-400 cursor-pointer  hover:text-blue-700" id="lead_btn1_save_btn" @click="target=null;targetChangeUrl=false"></i>
                    <i class="fas fa-times text-2xl text-red-400 cursor-pointer  hover:text-red-700" id="lead_btn1_discard_btn" @click="target=null;targetChangeUrl=false"></i>   
                </span>
                <textarea v-if="!targetChangeUrl" v-model="pageSection.banner.btn.text" class="static h-14 resize-none  border-gray-400 border-2 w-full font-light italic bg-gray-50"></textarea>
                <textarea v-else v-model="pageSection.banner.btn.slug" class="static h-14 resize-none  border-gray-400 border-2 w-full font-light italic bg-gray-50"></textarea>
                </div>
                
            </template>
            <template  v-else>
                <div class="relative group mt-5">
                    
                        <span class="absolute -top-3 -right-2 space-x-2">
                            <i class="fas fa-link text-2xl text-blue-400 cursor-pointer  hover:text-blue-700" id="lead_btn1_slug_btn" @click="editTarget('lead_btn1');targetChangeUrl=true"></i>
                                <i class="fas fa-pen text-2xl text-blue-400  cursor-pointer  hover:text-blue-700" id="lead_btn1_btn" @click="editTarget('lead_btn1');targetChangeUrl=false"></i> 
                        </span>

                    <p class="static border-gray-400 border-2 cursor-pointer rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300"  @click="editTarget('lead_btn1')">{{pageSection.banner.btn.text}}</p>
                </div>
            </template>
          
        </div>
        </div>
      </div>
    </div>
   
    <!-- <div class="h-auto w-full bg-transparent">
      <div
        class="flex lg:flex-row flex-col bg-cover bg-center bg-local"
        style="background-image: url('/images/pages/groups.jpeg')"
      >
        <div class="w-full relative py-10 h-auto">
          <div
            class="
              py-4
              h-56
              text-center
              mt-auto
              w-full
              flex flex-col
              justify-center
              rvmp-text-alt
              bg-transparent
            "
          ></div>
        </div>
      </div>
    </div> -->
  </div>
  <app-footer-contact-form />
</template>

<script>
import AppHeader from "./../../../../../Partials/AppHeader";
import AppAdminHeader from "./../../../../../Partials/AppAdminHeader";
import AppFooterContactForm from "./../../../../../Partials/AppFooterContactForm";
import ErrorsAndMessages from "./../../../../../Partials/ErrorsAndMessages";
import { usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed, inject, reactive,ref } from "vue";
import { bottom } from "@popperjs/core";

export default {
  name: "AboutAdmin",
  components: {
    ErrorsAndMessages,
    AppHeader,
    AppAdminHeader,
    AppFooterContactForm,
  },
  props: {
    errors: Object,
    carouselSettings: {
      Type: Object,
      default: null,
    },
    carouselBreakpoints: {
      Type: Object,
      default: null,
    },
    carouselTestimonials: {
      Type: Object,
      default: null,
    },
    currentUser: {
      Type: Object,
      default: null,
    },
  },
  setup() {
    const page_data = computed(() => usePage().props.value.page.data);
    const data = JSON.parse(page_data.value.page_content)
    const pageSection = reactive(data);

    pageSection.head_banner['image'] = null
    pageSection.banner['image'] = null
    const target = ref(null);
    const targetChangeUrl = ref(false);
    const user = computed(() => usePage().props.value.auth.user);
    function selectFile($event) {
                    var evt_src = $event.target.id
                  
                    if(evt_src === "image-hb"){
                        pageSection.head_banner.image = $event.target.files[0];
                    }else
                        pageSection.banner.image = $event.target.files[0];
      
                    
                    var file = $event.target.files[0];
                            
                    var reader = new FileReader();
                    reader.onload = (function(currFile, x, total, evtsrc) {
                  
                        return function(event){
                            
                            if(evt_src === "image-hb"){
                                pageSection.head_banner.img_url = event.target.result
                        
                            }else{
                                pageSection.banner.img_url = event.target.result
                            }
    
                        };
                    })(file, 0,$event.target.files.length, evt_src).bind(this);
                    reader.readAsDataURL($event.target.files[0]);
              
    }
    function postUpdatePage(){
        Inertia.post(route('page.change.save', {'slug':'about'}), pageSection, {
            forceFormData: true,
        });
    }
    return {
      user,
      pageSection,
      target,
      targetChangeUrl,
      selectFile,
      postUpdatePage,
      editTarget(data){
              // console.log(target.value)
              target.value = data
              // console.log('new '+target.value)
          },
    };
  },
  methods: {
     onUpdatePage() {
            this.postUpdatePage()
      },
      onReady() {
          this.$refs.youtube.playVideo()
      },
  },
};
</script>
