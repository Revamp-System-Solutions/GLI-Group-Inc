<template>
  <errors-and-messages :errors="errors"></errors-and-messages>
  <app-admin-header :current-user="user" @updatePage="onUpdatePage"/>

  <div class="rvmp-container h-full bg-gray-100 relative">
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
                  id="contact-lead-text-btn"
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
                  id="contact-lead-text-btn"
                  @click="target = null"
                ></i>
              </span>
              <textarea
                v-model="pageSection.contact_form.lead_text"
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
                id="contact-lead-text-btn"
                @click="editTarget('lead_text')"
              ></i>

              <h1
                class="
                  px-5
                  brand-text
                  xl:text-3xl
                  text-xl
                  font-bold
                  rvmp-banner-text-color
                  capitalize
                  lg:mt-0
                  mt-8
                  cursor-pointer
                  static
                  border-gray-400 border-2
                  group-hover:bg-gray-200
                "
                id="contact-lead-text"
                @click="editTarget('lead_text')"
              >
                {{ pageSection.contact_form.lead_text }}
              </h1>
            </div>
          </template>
        </div>
      </div>
    </div>
    <div class="h-auto 2xl:px-64 xl:px-56 lg:px-28 py-4 px-4">
      <form
        class="
          grid grid-cols-6
          gap-y-3
          overflow-hidden
          bg-transparent
          2xl:px-40
          xl:px-16
          lg:px-8
        "
        method="post"
        @submit.prevent="sendMessage()"
      >
        <div class="col-span-6">
          <template v-if="target === 'follow_text'">
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
                  id="contact-follow-text-btn"
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
                  id="contact-follow-text-btn"
                  @click="target = null"
                ></i>
              </span>
              <textarea
                v-model="pageSection.contact_form.follow_text"
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
                id="contact-follow-text-btn"
                @click="editTarget('follow_text')"
              ></i>

              <h2
                class="
                  text-3xl
                  font-semibold
                  leading-6
                  mb-2
                  brand-text
                  rvmp-footer-text
                  capitalize
                  text-center
                  lg:mt-0
                  mt-8
                  cursor-pointer
                  static
                  border-gray-400 border-2
                  group-hover:bg-gray-200
                "
                id="contact-follow-text"
                @click="editTarget('follow_text')"
              >
                {{ pageSection.contact_form.follow_text }}
              </h2>
            </div>
          </template>
          <template v-if="target === 'follow_subtext'">
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
                  id="contact-follow-subtext-btn"
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
                  id="contact-follow-subtext-btn"
                  @click="target = null"
                ></i>
              </span>
              <textarea
                v-model="pageSection.contact_form.subfollow_text"
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
                id="contact-follow-subtext-btn"
                @click="editTarget('follow_subtext')"
              ></i>

              <p
                class="
                  brand-text
                  text-center
                  hiddentext-lg
                  px-10
                  lg:mt-0
                  mt-8
                  cursor-pointer
                  static
                  border-gray-400 border-2
                  group-hover:bg-gray-200
                "
                id="contact-follow-subtext"
                @click="editTarget('follow_subtext')"
              >
                {{ pageSection.contact_form.follow_subtext }}
              </p>
            </div>
          </template>
        </div>
        <div class="col-span-6">
          <label
            for="first-name"
            class="text-sm font-medium rvmp-footer-text capitalize hidden"
            >Full name</label
          >
          <input
            type="text"
            name="first-name"
            id="first-name"
            placeholder="Full name"
            autocomplete="off"
            class="
              rounded-md
              focus:ring-indigo-500 focus:border-indigo-500
              w-full
              shadow-sm
              sm:text-sm
              border-gray-300
            "
            v-model="form.fullName"
          />
        </div>
        <div class="col-span-6">
          <label
            for="email-address"
            class="text-sm font-medium rvmp-footer-text capitalize hidden"
            >Email address</label
          >
          <input
            type="email"
            name="email-address"
            id="email-address"
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            required
            placeholder="Email Address"
            autocomplete="off"
            class="
              rounded-md
              focus:ring-indigo-500 focus:border-indigo-500
              w-full
              shadow-sm
              sm:text-sm
              border-gray-300
            "
            v-model="form.email"
          />
        </div>
        <div class="col-span-6">
          <label
            for="street-address"
            class="text-sm font-medium rvmp-footer-text capitalize hidden"
            >Message</label
          >
          <textarea
            type="text"
            name="street-address"
            id="street-address"
            placeholder="Message"
            autocomplete="off"
            class="
              rounded-md
              focus:ring-indigo-500 focus:border-indigo-500
              block
              w-full
              shadow-sm
              sm:text-sm
              border-gray-300
              resize-none
            "
            v-model="form.message"
          ></textarea>
        </div>
        <div class="col-span-6">
          <button
            class="
              bg-green-600
              text-white
              px-4
              py-1.5
              rounded-md
              hover:bg-green-700
              w-full
              transition
              ease-in-out
              duration-300
            "
            type="submit"
          >
            Sumbit
          </button>
        </div>
      </form>
    </div>
    <div
      class="
        h-auto
        2xl:px-64
        xl:px-56
        lg:px-28
        px-4
        py-4
        flex
        lg:flex-row
        flex-col
        lg:space-x-6
        space-x-0
        lg:space-y-0
        space-y-6
      "
    >
      <div
        class="
          lg:w-1/3
          w-full
          lg:h-56
          h-44
          shadow-md
          rounded-md
          bg-white
          text-center
          flex flex-col
          space-y-3
          lg:p-10
          p-6
        "
      >
        <i
          class="
            fas
            fa-map-marker-alt
            rvmp-brand-color-main
            2xl:text-3xl
            text-2xl
          "
        ></i>
        <h3
          class="
            text-xl
            font-semibold
            leading-6
            mb-2
            brand-text
            rvmp-footer-text
            uppercase
          "
        >
          our location
        </h3>
        <p class="brand-text italic 2xl:text-base text-xs text-center">
          <span class="block">{{
            pageSection.contact_details.address_line_1
          }}</span>
          <span class="block">{{
            pageSection.contact_details.address_line_2
          }}</span>
          <span class="block"
            >{{ pageSection.contact_details.postal_code }}
            {{ pageSection.contact_details.town }},
            {{ pageSection.contact_details.state }}</span
          >
          <span class="block">{{ pageSection.contact_details.country }}</span>
        </p>
      </div>
      <div
        class="
          lg:w-1/3
          w-full
          lg:h-56
          h-44
          shadow-md
          rounded-md
          bg-white
          text-center
          flex flex-col
          space-y-3
          lg:p-10
          p-6
        "
      >
        <i
          class="
            fas
            fa-phone-volume
            transform
            -rotate-45
            rvmp-brand-color-main
            2xl:text-3xl
            text-2xl
          "
        ></i>
        <h3
          class="
            text-xl
            font-semibold
            leading-6
            mb-2
            brand-text
            rvmp-footer-text
            uppercase
          "
        >
          let's talk
        </h3>
        <p class="brand-text italic 2xl:text-base text-xs text-center">
          <span class="block"
            >Phone: {{ pageSection.contact_details.phone }}</span
          >
        </p>
      </div>
      <div
        class="
          lg:w-1/3
          w-full
          lg:h-56
          h-44
          shadow-md
          rounded-md
          bg-white
          text-center
          flex flex-col
          space-y-3
          lg:p-10
          p-6
        "
      >
        <i
          class="
            fas
            fa-envelope-open
            rvmp-brand-color-main
            2xl:text-3xl
            text-2xl
          "
        ></i>
        <h3
          class="
            text-xl
            font-semibold
            leading-6
            mb-2
            brand-text
            rvmp-footer-text
            uppercase
          "
        >
          email us
        </h3>
        <p class="brand-text italic 2xl:text-base text-xs text-center">
          <span class="block">{{ pageSection.contact_details.email }}</span>
        </p>
      </div>
    </div>
    <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28 px-4 py-4">
      <div
        class="
          w-full
          flex
          md:flex-row
          flex-col
          lg:space-x-6
          justify-center
          overflow-hidden
          bg-transparent
          2xl:px-40
          xl:px-16
          px-16
        "
        id="social-links"
      >
        <a
          href="https://www.linkedin.com/company/gli-group-inc/"
          target="_blank"
          class="
            fab
            fa-linkedin
            text-blue-700
            group
            hover:rvmp-brand-color-main
            2xl:text-2xl
            xl:text-xl
            text-base text-center
            social-link
          "
          ><span
            class="
              px-2
              text-sm
              brand-logo-text
              group-hover:rvmp-brand-color-main
              rvmp-footer-text
            "
            ><span class="font-thin">GLI Group Inc.</span></span
          ></a
        >
        <a
          href="https://www.facebook.com/gligroupinc"
          target="_blank"
          class="
            fab
            fa-facebook
            text-blue-600
            group
            hover:rvmp-brand-color-main
            2xl:text-2xl
            xl:text-xl
            text-base text-center
            social-link
          "
          ><span
            class="
              px-2
              text-sm
              brand-logo-text
              group-hover:rvmp-brand-color-main
              rvmp-footer-text
            "
            ><span class="font-semibold">GLI</span>
            <span class="font-thin"> Group Inc.</span>
          </span></a
        >
        <a
          href="https://www.facebook.com/GLidesignstudio"
          target="_blank"
          class="
            fab
            fa-facebook
            text-blue-600
            group
            hover:rvmp-brand-color-main
            2xl:text-2xl
            xl:text-xl
            text-base text-center
            social-link
          "
          ><span
            class="
              px-2
              text-sm
              brand-logo-text
              group-hover:rvmp-brand-color-main
              rvmp-footer-text
            "
            ><span class="font-thin">Design Studio</span></span
          ></a
        >
        <a
          href="https://www.facebook.com/GLI-Builders-102946945203186"
          target="_blank"
          class="
            fab
            fa-facebook
            text-blue-600
            group
            hover:rvmp-brand-color-main
            2xl:text-2xl
            xl:text-xl
            text-base text-center
            social-link
          "
          ><span
            class="
              px-2
              text-sm
              brand-logo-text
              group-hover:rvmp-brand-color-main
              rvmp-footer-text
            "
            ><span class="font-thin">Builders</span></span
          ></a
        >
        <a
          href="https://www.facebook.com/glimodularcabinets"
          target="_blank"
          class="
            fab
            fa-facebook
            text-blue-600
            group
            hover:rvmp-brand-color-main
            2xl:text-2xl
            xl:text-xl
            text-base text-center
            social-link
          "
          ><span
            class="
              px-2
              text-sm
              brand-logo-text
              group-hover:rvmp-brand-color-main
              rvmp-footer-text
            "
            ><span class="font-thin">Modular Cabinets</span></span
          ></a
        >
      </div>
    </div>
    <div class="w-full h-auto pt-4">
      <!-- <div
                class="w-full h-96 bg-cover bg-top bg-local"
                style="background-image: url('/images/pages/map.png')"
            >
                &nbsp;
            </div> -->
      <google-map-plugin />
    </div>
  </div>
  <app-footer-small></app-footer-small>
</template>

<script>
import AppHeader from "./../../../../../Partials/AppHeader";
import AppAdminHeader from "./../../../../../Partials/AppAdminHeader";
import AppFooterSmall from "../../../../../Partials/AppFooterSmall";
import ErrorsAndMessages from "./../../../../../Partials/ErrorsAndMessages";
import GoogleMapPlugin from "../../../../../Components/Plugins/GoogleMapPlugin";
import { usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed, inject, reactive, ref } from "vue";

export default {
  name: "Home",
  components: {
    ErrorsAndMessages,
    AppHeader,
    AppAdminHeader,
    AppFooterSmall,
    GoogleMapPlugin,
  },
  props: {
    errors: Object,
  },
  data: () => ({}),
  setup() {
    const site_profile = usePage().props.value.site_profile;
    // console.log(sp_val);
    const sp_val = JSON.parse(site_profile[0].value);
    console.log(sp_val);
    const pageSection = reactive({
      contact_form: {
        lead_text: "Contact Us",
        follow_text: "Get In Touch",
        follow_subtext:
          "Send us your inquiries, Our team of Professionals shall provide you a response",
      },
      contact_details: sp_val,
    });
    const form = reactive({
      fullName: null,
      email: null,
      message: null,
      _token: usePage().props.value.csrf_token,
    });
    const route = inject("$route");
    function sendMessage() {
      const data = new FormData();

      data.append("formTitle", "get-in-touch");
      data.append("fullName", this.form.fullName);
      data.append("email", this.form.email);
      data.append("message", this.form.message);

      Inertia.post(route("form.submission"), data, {
        forceFormData: true,
      });
    }
      function postUpdatePage(){
             Inertia.post(route('page.change.save', {'slug':'contact-us'}), pageSection, {
                forceFormData: true,
            });
        }
    return {
      pageSection,
      form,
      postUpdatePage,
      sendMessage,
    };
  },
  methods: {
     onUpdatePage() {
            this.postUpdatePage()
        },
  },
};
</script>
