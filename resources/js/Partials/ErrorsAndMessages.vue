<template>
    <ul class="alert alert-danger" v-if="errors && Object.keys(errors).length > 0">
        <li v-for="error in errors" :key="error">{{error}}</li>
    </ul>

    <div class="animate-pulse w-1/3 bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 absolute right-0 top-0 z-20" role="alert"  v-show="success">
        <p class="font-bold">{{$page.props.flash.success}}</p>
        <!-- <p class="text-sm">Some additional text to explain said message.</p> -->
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" @click="$page.props.flash.success=''">
            <i class="fa fa-times"></i>
        </span>
    </div>
</template>

<script>
export default {
    name: "ErrorsAndMessages",
    props: ["errors"],
    data: () => ({
    	successState: false,
  	}),
    computed:{
        success() {
              setTimeout(function () { this.closeAlert() }.bind(this), 10000)
             return this.$page.props.flash.success;
        },
    },
    mounted(){
    
    },
    methods:{
        closeAlert(){
            this.$page.props.flash.success = ''
        }
    }
    
}
</script>

<style scoped>

</style>
