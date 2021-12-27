<template>
    <footer class="footer !rvmp-footer-contact-bg relative " ondragstart="return false;">
         <div class="container mx-auto bg-transparent">
            <div class=" lg:grid lg:grid-cols-5 border-gray-100 items-center bg-transparent">
                <div class="col-span-2 w-full lg:text-left text-center  lg:py-6 py-3 relative bg-transparent">
                    <p class="text-sm rvmp-footer-contact-text font-semibold mb-2 uppercase brand-logo-text inline-block">
                       <span class="inline-block"> © {{ new Date().getFullYear() }} | GLI <span class='font-light'>Group Inc.</span></span> <span class="brand-text font-normal capitalize lg:inline-block block">By Revamp System Solutions</span>
                    </p>
                    
                </div>
                <div class="lg:col-span-3 col-span-1 w-full brand-text font-light lg:text-right text-center lg:py-6 relative bg-transparent lg:text-base text-xs">
                    <a href="#" class="px-3 lg:inline-block block">Privacy Policy</a>
                    <a href="#" class="px-3 lg:inline-block block">Terms And Condition</a>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>

export default {
    name: "MiniFooter",
    components:{

    },
    data: () => ({

  	}),
    setup() {
       

        return {
            
        }
    },
    mounted() {

    }
   
}
</script>
