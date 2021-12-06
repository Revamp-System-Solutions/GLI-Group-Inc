<template>
    <ul class="alert alert-danger" v-if="errors && Object.keys(errors).length > 0">
        <li v-for="error in errors" :key="error">{{error}}</li>
    </ul>
  <TransitionRoot appear :show="success">
        <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0"
    >
      <div class="w-1/3 bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 absolute right-0 top-0 z-20" role="alert"  >
        <p class="font-bold">{{$page.props.flash.success}}</p>
        <!-- <p class="text-sm">Some additional text to explain said message.</p> -->
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" @click="$page.props.flash.success=null">
            <i class="fa fa-times"></i>
        </span>
    </div>
    </TransitionChild>
    
  </TransitionRoot>
</template>

<script>
 import { ref } from 'vue'
  import { TransitionRoot, TransitionChild } from '@headlessui/vue'
export default {
    name: "ErrorsAndMessages",
    props: ["errors"],
    data: () => ({
    
  	}),
    components: { TransitionRoot, TransitionChild },
    setup() {
      const isShowing = ref(true)

      return {
        isShowing,
      }
    },
    computed:{
        success() {
              setTimeout(function () { this.closeAlert() }.bind(this), 15000)
             return this.$page.props.flash.success!==null ? true:false;
        },
    },
    mounted(){
    
    },
    methods:{
        closeAlert(){
            this.$page.props.flash.success = null
        }
    }
    
}
</script>

<style scoped>

</style>
