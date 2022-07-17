<template>
 
    <div class="w-full w-full text-black antialiased flex flex-col  items-center  max-h-full h-screen">
      
     
        <img
          class="max-w-xs w-28"
          src="/images/brand-logo-small.png"
          alt="Revamp Logo"
          style=""
        />
    
    
        <h1 class="font-bold md:text-8xl text-4xl ">THANK YOU!</h1>
     
   
       <img
          src="/images/smiley.png"
          alt="Smiley face"
          class="lg:m-2 md:h-auto h-32"
          style=""
        />
  


  <span class="h-full w-full">       
      <p class="m-1 text-center">
        Thanks a bunch for filling that out. It means a lot to us, just like
        you do!
      </p>
      <p class="m-1 text-center">You will be automatically redirected to the homepage.</p>
  </span>
       
       <AppFooterSmall />
    </div>

</template>



<script>

import {Inertia} from "@inertiajs/inertia";
import {usePage} from "@inertiajs/inertia-vue3";
import {computed, inject,ref, reactive} from "vue";
import AppFooterSmall from "../Partials/AppFooterSmall";
export default {
    name: "Thank you",
    setup() {
        const form = reactive({
            title: null,
            fullName: null,
            email: null,
            contact: null,
            projectType: null,
            bookingDate: null,
            bookingTime: null,
            details: null,
            assignedto: null,
            _token: usePage().props.value.csrf_token,
        });
        const route = inject("$route");
        function sendMessage() {
            const data = new FormData();
            data.append("formTitle", this.form.title);
            data.append("fullName", this.form.fullName);
            data.append("email", this.form.email);
            data.append("contact", this.form.contact);
            data.append("projectType", this.form.projectType);
            data.append("bookingDate", this.form.bookingDate);
            data.append("bookingTime", this.form.bookingTime);
            data.append("details", this.form.details);
            data.append("assignedTo", this.form.assignedto);
            Inertia.post(route("form.submission"), data, {
                forceFormData: true,
            });
        }
        return {
            form,
            sendMessage
        };
    },
    created() {
        let uri = window.location.search.substring(1);
        let params = new URLSearchParams(uri);
        if (Array.from(params).length > 5) {
            this.form.title = params.get("event_type_name");
            this.form.assignedto = params.get("assigned_to");
            this.form.fullName = params.get("invitee_full_name");
            this.form.email = params.get("invitee_email");
            this.form.contact = params.get("answer_1");
            this.form.projectType = params.get("answer_2");
            this.form.details = params.get("answer_3");
            let ev_s = new Date(params.get("event_start_time"));
            let ev_e = new Date(params.get("event_end_time"));
            this.form.bookingDate = `${ev_s.getFullYear()}-${ev_s.getMonth() < 10 ? "0" + ev_s.getMonth() : ev_s.getMonth()}-${ev_s.getDate() < 10 ? "0" + ev_s.getDate() : ev_s.getDate()}`;
            this.form.bookingTime = `${ev_s.getHours() < 10 ? "0" + ev_s.getHours() : ev_s.getHours()}:${ev_s.getMinutes() < 10 ? "0" + ev_s.getMinutes() : ev_s.getMinutes()} - ${ev_e.getHours() < 10 ? "0" + ev_e.getHours() : ev_e.getHours()}:${ev_e.getMinutes() < 10 ? "0" + ev_e.getMinutes() : ev_e.getMinutes()}`;
            setTimeout(() => this.sendMessage(), 5000);
        }else{
          setTimeout(() => Inertia.visit("/"), 5000);
        }
    },
    components: { AppFooterSmall }
};
</script>
