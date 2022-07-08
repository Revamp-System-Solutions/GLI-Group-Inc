<template>

        
    <div id="SAMPLEdivID" class="absolute w-full h-screen">
        

</div>
        
</template>

<script>

export default {
    name: "CalendlyPlugin",
    components: {

},
    props: {

   },
    setup() {
        // `<div class="calendly-inline-widget" data-url="https://calendly.com/rvmpsystemssolution/test-events?hide_event_type_details=1&hide_gdpr_banner=1" style="height:320px"/>`


		return {

         
		
		};
	},
    mounted() {

           window.Calendly.initInlineWidget({
 url: 'https://calendly.com/rvmpsystemssolution/test-events ',
 parentElement: document.getElementById('SAMPLEdivID'),
 prefill: {
    name: 'Alamein',
    email: 'abc@gmaoil.com',
    customAnswers: {
        a1:'yes'
    } 
},
 utm: {}
});
        

       
    }
}
</script>
