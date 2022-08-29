<template>

            <form method="post" @submit.prevent="submit">
                
                 

                <div   class="flex flex-row my-2">
                    <!-- <label class="text-lg w-1/12 mr-2" for="media_name">Media Name</label>
                    <input type="text" class="w-full px-4 py-3 rounded"  name="media_name" id="media_name" v-model="form.media_name" /> -->
                   
                    <template v-for="itm of urls" >
                    <div class="mx-2 flex flex-col items-center">
                        <img :src="itm.url" class="w-8 h-8">
                        <span >{{itm.name}}</span>
                    </div>
                    </template>
                </div>

                <div >
                    <label class="text-lg w-1/12 mr-2" for="image">Images </label>
                    <input type="file" id="image" name="image" class="w-full px-4 py-3 rounded"  :multiple="form.type !== 'RVMP_CLIENT_FILE'" @change="selectFile">
                </div>
                <div class=" py-3 flex w-full justify-end">
                    <input type="submit" class=" px-4 py-3 rounded w-36 text-white text-lg bg-green-600 hover:bg-green-200 hover:text-black transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110" value="Save" />
                </div>
            </form>

</template>

<script>
import { reactive, ref } from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "UploadMedia",
    components: {

    },
    inheritAttrs: false,
    props: ["stageImage","type"],
    setup(props,{ emit }) {
        const form = reactive({
            media_name: [],
            image: [],
            type: (Buffer.from(props.type, 'base64')).toString(),
            _token: usePage().props.value.csrf_token
        });
        console.log(form.type)
        const urls = ref(new Array());
        const checkType = (form.type).startsWith('RVMP') ? false: true

        function selectFile($event) {

            // if ($event.target.files) {
                    //  form.image = $event.target.files;
                    for (let i = 0; i < $event.target.files.length; i++) {
                        var file = $event.target.files[i];
                            //    alert('hey')
                               
                        var reader = new FileReader();
                        reader.onload = (function(currFile, x, total) {
                            var fileName = currFile.name
                            return function(event){
                              if(form.type === 'RVMP_CLIENT_FILE')
                                urls.value = []
                                urls.value.push({url: event.target.result, name: `${fileName}`, type: currFile.type})
                                
                                 updateImageList()
                            };
                        })(file, i,$event.target.files.length).bind(this);
                        reader.readAsDataURL($event.target.files[i]);
                    }
            //   }         
        }
    function updateImageList(){
          console.log(form.image)
             form.image = []
              $.each(urls.value, function(i, img){     
                loadXHR(img.url).then(function(blob) {
                form.image[i] = new File([blob], img.name, { type: img.type, });
                });
            });
            console.log(form.image)
        }
         function loadXHR(url) {
            return new Promise(function(resolve, reject) {
                try {
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", url);
                    xhr.responseType = "blob";
                    xhr.onerror = function() {reject("Network error.");};
                    xhr.onload = function() {
                        if (xhr.status === 200) {resolve(xhr.response);}
                        else {reject("Loading error:" + xhr.statusText);}
                    };
                    xhr.send();
                }
                catch(err) {reject(err.message);}
            });
        }
        function submit() {
            form.media_name = !(form.type).startsWith('RVMP') ? form.media_name:props.stageImage.media_name
            emit('submitImage', form)
        }

        return {
            form, 
            submit,
            selectFile,
            checkType,
            urls
        }
    },

}
</script>
