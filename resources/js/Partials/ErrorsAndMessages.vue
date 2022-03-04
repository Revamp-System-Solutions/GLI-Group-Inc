<template> 
<TransitionRoot appear :show="onerror && errorOpen">
        <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0">
        <div class="w-1/3 bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 absolute right-0 top-0 z-50" role="alert"  >
          <p class="font-bold"><i class="fas fa-exclamation-triangle mr-8"></i> Error</p>
          <p class="text-sm">
              <ul class="alert alert-danger" >
                <li v-for="error in errors" :key="error">{{error}}</li>
              </ul>
          </p>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" @click="$page.props.flash.success=null">
              <i class="fa fa-times"></i>
          </span>
        </div>
    </TransitionChild>
  </TransitionRoot>
  <TransitionRoot appear :show="success">
        <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0">
      <div class="w-1/3 bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 absolute right-0 top-0 z-50" role="alert"  >
        <p class="font-bold">{{$page.props.flash.success!==null ? ($page.props.flash.success.split("|>><<|")[0]): '' }}</p>
        <p class="text-sm">{{$page.props.flash.success!==null ? ($page.props.flash.success.split("|>><<|")[1]): '' }}.</p>

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
      errorOpen: false
  	}),
    components: { TransitionRoot, TransitionChild },
    setup() {
      const isShowing = ref(false)

      return {
        isShowing,
      }
    },
    computed:{
        success() {
              setTimeout(function () {  this.$page.props.flash.success = null }.bind(this), 15000)
             return this.$page.props.flash.success!==null ? true:false;
        },
        onerror(){
            setTimeout(function () { this.errorOpen = false }.bind(this), 10000)
            this.errorOpen = true
            return Object.keys(this.errors).length > 0 ? true:false;
        }
    },
    mounted(){
     
    },
    methods:{

    }
    
}
</script>
