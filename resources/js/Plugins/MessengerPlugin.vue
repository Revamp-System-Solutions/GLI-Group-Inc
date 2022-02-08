<template>
 <!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat"></div>
</template>
<script>
export default {
    name: "MessengerPlugin",
    components:{

    },
    setup() {
        const page_id = "110535994631911"
        const app_id = "468041464709531"
    },
    mounted() {
         var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", this.page_id);
        chatbox.setAttribute("attribution", "biz_inbox");

        window.fbAsyncInit = function() {
            FB.init({
            appId            : this.app_id,
            xfbml            : true,
            version          : 'v12.0',
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            js.crossorigin = "anonymous";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        return {
            page_id, app_id
        }
    }
}
</script>
