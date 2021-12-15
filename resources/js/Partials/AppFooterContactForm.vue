<template>
    <footer class="footer bg-white relative pt-1 " ondragstart="return false;">
    <div class="container mx-auto px-6">
        <div class="flex mt-8 bg-gray">
            <div class="mt-0 w-full lg:px-8 flex flex-col justify-center border-t-2 border-gray-100">

                <div class="mt-4 px-4 sm:px-0">
                  <h3 class="text-lg font-medium leading-6 text-gray-900 uppercase semibold">Tell us about your project</h3>
                </div>

                <form action="#" method="POST" class="my-4">
                  <div class="overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                          <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                          <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 " />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                          <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 " />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                          <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                          <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 " />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                          <label for="email-address" class="block text-sm font-medium text-gray-700">Subject</label>
                          <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 " />
                        </div>

                        <div class="col-span-6">
                          <label for="street-address" class="block text-sm font-medium text-gray-700">Message</label>
                          <textarea type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 " ></textarea>
                        </div>

                      </div>
                    </div>
                    <div class="px-4 py-3  text-center sm:px-6">
                       <button class="bg-green-600 text-white px-4 py-1.5 hover:bg-green-700 transition ease-in-out duration-300">
                            Sumbit
                        </button>
                    </div>
                  </div>
                </form>
 
                <div class="flex flex-col">
                    <span class="text-center mb-3"><img src="/images/brand-logo.png" class="mx-auto lg:w-36 w-24 "></span>
                    <div class="flex lg:flex-row flex-col text-center text-xs lg:text-base mx-auto uppercase font-semibold brand-logo-text">
                        <span class="mx-2">
                            <a v-if="!switchInertia" href="#designstudio" class="text-black hover:text-green-600">Design Studio</a>
                            <inertia-link v-if="switchInertia" :href="$route('guest.studio') " class="text-black hover:text-green-600 ">
								Design Studio
							</inertia-link></span>
                        <span class="mx-2">
                            <a v-if="!switchInertia" href="#builders" class="text-black hover:text-green-600">Builders</a>
                            <inertia-link v-if="switchInertia" :href="$route('guest.builders') " class="text-black hover:text-green-600 ">
								Builders
							</inertia-link>
                            </span>
                        <span class="mx-2">
                            <a v-if="!switchInertia" href="#modularcabinets" class="text-black hover:text-green-600">Modular Cabinets</a>
                            <inertia-link v-if="switchInertia" :href="$route('guest.modcabinet') " class="text-black hover:text-green-600 ">
								Modular Cabinets
							</inertia-link>
                            </span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container mx-auto px-6">
        <div class="mt-8 border-t-2 border-gray-100 flex flex-col items-center">
            <div class="w-full text-center py-6 relative">
                <p class="text-sm text-gray-400 font-semibold mb-2 uppercase brand-logo-text">
                    © {{ new Date().getFullYear() }} | GLI <span class='brand-logo-text font-light'>Group Inc.</span> 
                </p>
                <img src="/images/revamp-system-solutions.png" oncontextmenu="return false;" class="mx-auto w-1/3 lg:w-36 ">
            </div>
        </div>
    </div>
</footer>
</template>

<script>




export default {
    name: "ContactForm",
    components:{

    },
    data: () => ({
		switchInertia: false,
  	}),
    setup() {
       

        return {
            
        }
    },
    mounted() {
     if(window.location.pathname !== "/home"){
			this.switchInertia = true
		}
    }
   
}
</script>