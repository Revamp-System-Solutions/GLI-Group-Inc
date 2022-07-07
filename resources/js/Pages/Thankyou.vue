<template>
  <div class="text-center">
    <div class="p-5 min-w-300 text-black antialiased">
      <img
        class="max-w-xs"
        src="../../../public/images/brand-logo-small.png"
        alt="Revamp Logo"
        style="margin-left: 42rem; max-width: 150px"
      />
      <br />
      <div class="font-bold text-8xl">
        <h1>THANK YOU!</h1>
      </div>

      <div class="m-auto max-w-3xl text-l">
        <img
          src="../../../public/images/smiley.png"
          alt="Smiley face"
          class="m-2"
          style="margin-left: 270px"
        />
        <p class="m-1">
          Thanks a bunch for filling that out. It means a lot to us, just like
          you do!
        </p>
        <p>You will automatically be redirected to the homepage.</p>
      </div>

      <div class="m-auto p-0 max-w-3xl">
        <br /><br /><br /><br />
        <p class="text-base font-light" style="margin-top: 20px">
          Copyright ©2014 | All Rights Reserved
        </p>
      </div>
    </div>
  </div>
</template>



<script>
import { Inertia } from "@inertiajs/inertia";

export default {
  name: "Thank you",
  created() {
    setTimeout(() => Inertia.visit("/"), 5000);
  },
};
</script>
