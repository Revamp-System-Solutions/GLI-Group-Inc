<template>
    <footer class="footer !rvmp-footer-bg relative pt-1 " ondragstart="return false;">
        <app-footer-small/>
    </footer>
</template>

<script>
import AppFooterSmall from "./AppFooterSmall"

export default {
    name: "DefaultFooter",
    components:{
        AppFooterSmall
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
