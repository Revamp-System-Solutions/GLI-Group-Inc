<template>
    <app-header></app-header>
    <div class="rvmp-container h-full bg-gray-100">
        <div class="w-full bg-origin-border bg-cover bg-center bg-local" :style="`background-image: url('${page_content.head_banner.img_url}')`">
            <div class="h-40 mx-auto 2xl:px-40 xl:px-16 px-8 flex lg:flex-wrap lg:content-center justify-center rvmp-banner-bg bg-opacity-80">
                <div class="lg:w-full lg:self-start self-center">
                    <h1 class="px-5 brand-text xl:text-3xl text-xl font-bold rvmp-banner-text-color capitalize">{{page_content.head_banner.text}}</h1>
                </div>
            </div>
        </div>
        <div class="h-auto 2xl:px-64 xl:px-56 lg:px-28 py-4 px-4">
            <form
                class="grid grid-cols-6 gap-y-3 overflow-hidden bg-transparent 2xl:px-40 xl:px-16 lg:px-8"
                method="post"
                @submit.prevent="sendMessage()"
            >
                <div class="col-span-6">
                    <h2
                        class="text-3xl font-semibold leading-6 mb-2 brand-text rvmp-footer-text capitalize text-center"
                    >
                        {{page_content.contact_form.title}}
                    </h2>
                    <p class="brand-text text-center hiddentext-lg px-10" v-html="page_content.contact_form.caption">
                       
                    </p>
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
                        class="rounded-md focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300"
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
                        class="rounded-md focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300"
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
                        class="rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 resize-none"
                        v-model="form.message"
                    ></textarea>
                </div>
                <div class="col-span-6">
                    <button
                        class="bg-green-600 text-white px-4 py-1.5 rounded-md hover:bg-green-700 w-full transition ease-in-out duration-300"
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
        2xl:px-56
        xl:px-48
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
            page_content.contact_details.address_line_1
          }}</span>
          <span class="block">{{
            page_content.contact_details.address_line_2
          }}</span>
          <span class="block"
            >{{ page_content.contact_details.postal_code }}
            {{ page_content.contact_details.town }},
            {{ page_content.contact_details.state }}</span
          >
          <span class="block">{{ page_content.contact_details.country }}</span>
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
        <p class="brand-text italic 2xl:text-base text-xs text-center flex flex-col">
          <span class="block"
            >Phone: {{ page_content.contact_details.phone }}</span
          >
          <span class="block"
            >Tele: {{ page_content.contact_details.telephone }}</span
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
          <span class="block">{{ page_content.contact_details.email }}</span>
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
      <template v-for="(links, index) in sc_lnk">
        <a v-for="link in links"
          :href="link.link"
          target="_blank"
          :class="`fab ${social_icons[index]}`"
          class="
            text-blue-700
            group
            hover:rvmp-brand-color-main
            2xl:text-2xl
            xl:text-xl
            text-base text-center
            social-link
          "
          >
          <div class="flex
            flex-col">
            <i
            class="
              px-2
              text-sm
              brand-logo-text
              group-hover:rvmp-brand-color-main
              rvmp-footer-text
            "
            ></i><span class="px-2
              text-sm
              brand-logo-text
              group-hover:rvmp-brand-color-main
              rvmp-footer-text font-thin">{{link.alias}}</span>
          </div></a>
      </template>
      
      </div>
    </div>
        <div class="w-full h-auto pt-4">
            <!-- <div
                class="w-full h-96 bg-cover bg-top bg-local"
                style="background-image: url('/images/pages/map.png')"
            >
                &nbsp;
            </div> -->
            <google-map-plugin/>
        </div>
    </div>
    <app-footer-small></app-footer-small>
</template>

<script>
import AppHeader from "../Partials/AppHeader";
import AppFooterSmall from "../Partials/AppFooterSmall";
import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import GoogleMapPlugin from "../Components/Plugins/GoogleMapPlugin";
import { usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed, inject, reactive, ref } from "vue";

export default {
    name: "Home",
    components: {
        ErrorsAndMessages,
        AppHeader,
        AppFooterSmall,
        GoogleMapPlugin,
    },
    props: {
        errors: Object,
    },
    data: () => ({
        social_icons:{
          '0_fb' : 'fa-facebook',
          '0_ig' : 'fa-instagram',
          '0_yt' : 'fa-youtube',
          '0_twttr' : 'fa-twitter',
          '0_lnkdn' : 'fa-linkedin'
        }
    }),
    setup() {
        const form = reactive({
            fullName: null,
            email: null,
            message: null,
            _token: usePage().props.value.csrf_token,
        });
        const route = inject("$route");
        function sendMessage() {
            const data = new FormData();

            data.append("formTitle", 'get-in-touch')
            data.append("fullName", this.form.fullName);
            data.append("email", this.form.email);
            data.append("message", this.form.message);

            Inertia.post(route("form.submission"), data, {
                forceFormData: true,
            });
        }
       const site_profile = usePage().props.value.site_profile;
        const sp_val = JSON.parse(site_profile[0].value);
        const socials = usePage().props.value.socials;
        const sc_lnk = JSON.parse(socials[0].value);
        const pdata = computed(() => usePage().props.value.page.data);
        const page_content = JSON.parse(pdata.value.page_content)
        page_content['contact_details'] = sp_val
        return{
            page_content,
            sc_lnk,
            form,
            sendMessage,
        };
    },
    methods: {},
};
</script>
