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
      style="background-image: url('/images/pages/house.jpg')"
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
        "
      >
        <div class="lg:w-full lg:self-start self-center">
          <template v-if="target === 'lead_text'">
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
                v-model="pageSection.about.lead_text"
                class="
                  static
                  h-32
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
                @click="editTarget('lead_text')"
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
                @click="editTarget('lead_text')"
              >
                {{ pageSection.about.lead_text }}
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
                <template v-if="target === 'company_name_text1'">
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
                      v-model="pageSection.about.company_name_text1"
                      class="
                        static
                        h-32
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
                      id="company-name-text1-btn"
                      @click="editTarget('company_name_text1')"
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
                      @click="editTarget('company_name_text1')"
                    >
                      {{ pageSection.about.company_name_text1 }}

                      <template v-if="target === 'company_name_text2'">
                        <div
                          class="relative flex flex-row box-border bg-gray-300"
                        >
                          <span class="absolute -top-6 -right-2 space-x-2">
                            <i
                              class="
                                fas
                                fa-check
                                text-2xl text-blue-400
                                cursor-pointer
                                hover:text-blue-700
                              "
                              id="company-name-text2-btn"
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
                              id="company-name-text2-btn"
                              @click="target = null"
                            ></i>
                          </span>

                          <textarea
                            v-model="pageSection.about.company_name_text2"
                            class="
                              static
                              h-32
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
                            id="company-name-text2-btn"
                            @click="editTarget('company_name_text2')"
                          ></i>

                          <span
                            class="
                              brand-logo-text
                              font-thin
                              rvmp-brand-color-highlight
                              cursor-pointer
                            "
                            id="company-name-text2"
                            @click="editTarget('company_name_text2')"
                            >{{ pageSection.about.company_name_text2 }}</span
                          >
                        </div>
                      </template>
                    </h2>
                  </div>
                </template>
              </blockquote>

              <template v-if="target === 'lead_subtext'">
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
                    v-model="pageSection.about.lead_subtext"
                    class="
                      static
                      h-32
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
                    id="lead-subtext-btn"
                    @click="editTarget('lead_subtext')"
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
                    id="lead-subtext"
                    @click="editTarget('lead_subtext')"
                  >
                    {{ pageSection.about.lead_subtext }}
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
          <iframe
            src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fgligroupinc%2Fvideos%2F729918478044185%2F&show_text=false&width=560&t=0&autoplay=1"
            width="560"
            height="314"
            style="border: none; overflow: hidden"
            scrolling="no"
            frameborder="0"
            allowfullscreen="true"
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
          ></iframe>
        </div>
      </div>
    </div>
    <div class="h-auto w-full bg-transparent">
      <div
        class="flex lg:flex-row flex-col bg-cover bg-no-repeat bg-top bg-local"
        style="background-image: url('/images/pages/house.jpg')"
      >
        <div class="w-full py-14 h-auto rvmp-banner-bg bg-opacity-70">
          <div
            class="
              h-44
              text-center
              mt-auto
              w-full
              flex flex-col
              justify-center
              rvmp-banner-text-color
              bg-transparent
            "
          >
            <h2 class="brand-logo-text lg:text-3xl text-xl py-2 uppercase">
              <span class="brand-logo-text" id="client-brand">
                <template v-if="target === 'mid_text1'">
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
                      v-model="pageSection.about.mid_text1"
                      class="
                        static
                        h-32
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
                      id="mid-text1-btn"
                      @click="editTarget('mid_text1')"
                    ></i>

                    <span
                      class="font-semibold cursor-pointer"
                      id="mid-text1"
                      @click="editTarget('mid_text1')"
                      >{{ pageSection.about.mid_text1 }}</span
                    >
                  </div>
                </template>

                <template v-if="target === 'mid_text2'">
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
                        id="mid-text2-btn"
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
                        id="mid-text2-btn"
                        @click="target = null"
                      ></i>
                    </span>
                    <textarea
                      v-model="pageSection.about.mid_text2"
                      class="
                        static
                        h-32
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
                      id="mid-text2-btn"
                      @click="editTarget('mid_text2')"
                    ></i>

                    <span
                      class="font-thin cursor-pointer"
                      id="mid-text2"
                      @click="editTarget('mid_text2')"
                      >{{ pageSection.about.mid_text2 }}</span
                    >
                  </div>
                </template>
              </span>
            </h2>

            <template v-if="target === 'mid_subtext'">
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
                    id="mid-subtext-btn"
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
                    id="mid-subtext-btn"
                    @click="target = null"
                  ></i>
                </span>
                <textarea
                  v-model="pageSection.about.mid_subtext"
                  class="
                    static
                    h-32
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
                  id="mid-subtext-btn"
                  @click="editTarget('mid_subtext')"
                ></i>

                <h2
                  class="
                    brand-text
                    lg:text-5xl
                    text-xl
                    font-light
                    cursor-pointer
                    capitalize
                  "
                  id="mid-subtext"
                  @click="editTarget('mid_subtext')"
                >
                  {{ pageSection.about.mid_subtext }}
                </h2>
              </div>
            </template>
          </div>
        </div>
      </div>
    </div>
    <!-- <div  class="h-auto 2xl:px-80 xl:px-56 lg:px-28 rvmp-bg-main">
        <div class="flex lg:flex-row-reverse flex-col h-auto relative">
            <div class="w-full lg:h-2/3 h-full lg:py-20 lg:pl-10 lg:pr-0 p-6 lg:static absolute lg:bg-transparent rvmp-bg-alt lg:bg-opacity-0 bg-opacity-80">
                    <div class="w-full h-full lg:static grid grid-cols-1 place-content-center">
                        <div class="col-span-1 mb-4 text-3xl uppercase lg:text-left text-center">
                            <h2 class="brand-text font-light lg:block inline-block lg:mr-0 mr-2">OUR COMPANY'S</h2>
                            <h2 class="brand-text font-semibold rvmp-brand-color-highlight lg:block inline-block">MISSION</h2>
                        </div>
                        <p class="col-span-1 font-light text-justify 2xl:text-lg lg:text-sm text-xs brand-text ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque egestas nec ipsum ac mollis. Duis at lorem sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur felis lacus, venenatis non maximus vitae, laoreet sit amet risus. Vivamus id ex magna. Vestibulum nibh elit, vestibulum ac mauris a, ornare sodales lorem. Aenean turpis velit, hendrerit eget dui sed, accumsan molestie libero. Donec sapien magna, egestas vel congue vel, accumsan et erat. Etiam nisi odio, pretium sit amet nunc at, dapibus vehicula augue.</p>
                    </div>
            </div>
            <div class="w-full lg:h-auto lg:py-10 lg:pr-10">
                <div class="w-full lg:h-full h-96 bg-origin-border bg-cover bg-no-repeat bg-center bg-local" style="background-image: url('/images/pages/mission.jpg')">
                        &nbsp;
                </div>
            </div>
        </div>
    </div>
    <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28 rvmp-bg-alt">
         <div class="flex lg:flex-row flex-col h-auto relative">
            <div class="w-full lg:h-2/3 h-full lg:py-20 lg:pl-10 lg:pr-0 p-6 lg:static absolute lg:bg-transparent rvmp-bg-main lg:bg-opacity-0 bg-opacity-80">
                    <div class="w-full h-full lg:static grid grid-cols-1 place-content-center">
                        <div class="col-span-1 mb-4 text-3xl uppercase lg:text-left text-center">
                            <h2 class="brand-text font-light  lg:block inline-block mr-2">OUR COMPANY'S</h2>
                            <h2 class="brand-text font-semibold rvmp-brand-color-highlight lg:block inline-block">Vision</h2>
                        </div>
                        <p class="col-span-1 font-light text-justify 2xl:text-lg lg:text-sm text-xs brand-text ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque egestas nec ipsum ac mollis. Duis at lorem sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur felis lacus, venenatis non maximus vitae, laoreet sit amet risus. Vivamus id ex magna. Vestibulum nibh elit, vestibulum ac mauris a, ornare sodales lorem. Aenean turpis velit, hendrerit eget dui sed, accumsan molestie libero. Donec sapien magna, egestas vel congue vel, accumsan et erat. Etiam nisi odio, pretium sit amet nunc at, dapibus vehicula augue.</p>
                    </div>
            </div>
            <div class="w-full lg:h-auto lg:py-10 lg:pl-10">
                <div class="w-full lg:h-full h-96 bg-origin-border bg-cover bg-no-repeat bg-center bg-local" style="background-image: url('/images/pages/vision.jpg')">
                        &nbsp;
                </div>
            </div>
        </div>
    </div>

   <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28 rvmp-bg-main">
         <div class="flex lg:flex-row-reverse flex-col h-auto relative">
            <div class="w-full lg:h-2/3 h-full lg:py-20 lg:pl-10 lg:pr-0 p-6 lg:static absolute lg:bg-transparent rvmp-bg-alt lg:bg-opacity-0 bg-opacity-80">
                    <div class="w-full h-full lg:static grid grid-cols-1 place-content-center">
                        <div class="col-span-1 mb-4 text-3xl uppercase lg:text-left text-center">
                            <h2 class="brand-text font-light  lg:block inline-block mr-2">OUR COMPANY'S</h2>
                            <h2 class="brand-text font-semibold rvmp-brand-color-highlight lg:block inline-block">Values</h2>
                        </div>
                        <p class="col-span-1 font-light text-justify 2xl:text-lg lg:text-sm text-xs brand-text ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque egestas nec ipsum ac mollis. Duis at lorem sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur felis lacus, venenatis non maximus vitae, laoreet sit amet risus. Vivamus id ex magna. Vestibulum nibh elit, vestibulum ac mauris a, ornare sodales lorem. Aenean turpis velit, hendrerit eget dui sed, accumsan molestie libero. Donec sapien magna, egestas vel congue vel, accumsan et erat. Etiam nisi odio, pretium sit amet nunc at, dapibus vehicula augue.</p>
                    </div>
            </div>
            <div class="w-full lg:h-auto lg:py-10 lg:pr-10">
                <div class="w-full lg:h-full h-96 bg-origin-border bg-cover bg-no-repeat bg-center bg-local" style="background-image: url('/images/pages/value.jpg')">
                        &nbsp;
                </div>
            </div>
        </div>
    </div> -->
    <div class="h-auto w-full bg-transparent">
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
    </div>
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
import { computed, inject, reactive } from "vue";

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
    const pageSection = reactive({
      about: {
        lead_text: "About GLI Group Inc.",
        company_name_text1: "GLI",
        company_name_text2: "GROUP INC.",
        lead_subtext:
          "GLI Group Inc. is a Design & Build Firm with Architectural & Engineering Design Services, Construction Services, and Cabinetry Fabrication teams with 10 years experience in the industry.",
        mid_text1: "GLI",
        mid_text2: "GROUP INC.",
        mid_subtext: "Building a better built environment together",
      },
    });
    function postUpdatePage(){
        Inertia.post(route('page.change.save', {'slug':'about'}), pageSection, {
            forceFormData: true,
        });
    }
    return {
      pageSection,
      postUpdatePage
    };
  },
  methods: {
     onUpdatePage() {
            this.postUpdatePage()
        },
  },
};
</script>
