<template>
    <footer class="footer !rvmp-footer-contact-bg relative pt-1 " ondragstart="return false;">
    <div class="container mx-auto bg-transparent">
            <div class="w-full bg-transparent grid lg:grid-cols-7 grid-cols-1 gap-1 my-4">
                <div class="lg:col-span-2 col-span-1 flex flex-col">
                      <span class="text-center mb-3"><img src="/images/brand-logo.png" class="mx-auto lg:w-24 w-16 "></span>
                      <p class="brand-description-footer lg:text-sm text-xs text-justify lg:px-4 px-3"> <span class="brand-logo-text font-semibold">GLI <span class="font-thin">Group Inc.</span> </span> is A Design & Build Firm with Architectural & Engineering Design Services Team and a Construction Services Team. We also have a cabinetry fabrication team, that caters mostly laminated kitchen cabinets, bedroom closets & office tables and cabinetry works.</p>
                    
                  </div>
                <div class="col-span-1 lg:px-0 px-3">
                  <div class="flex flex-col lg:text-left text-center text-xs lg:text-base mx-auto capitalize font-semibold brand-logo-text space-y-3">
                    <h3 class="text-lg font-medium leading-6 mb-0 brand-text rvmp-footer-contact-text uppercase semibold">Here's what we can offer</h3>
                    <Disclosure v-slot="{ open }">
                      <DisclosureButton
                        class="flex justify-between w-full bg-transaparent focus:outline-none focus-visible:ring focus-visible:ring-green-500 focus-visible:ring-opacity-75">
                        <span class="rvmp-footer-contact-text hover:text-green-600">Design Studio</span>
                      
                         <span class="fas " :class="[open ? 'fa-chevron-up' : 'fa-chevron-down', 'text-black']" aria-hidden="true"></span>
                      </DisclosureButton>
                      <DisclosurePanel class="px-2">
                         <p class="brand-service-description-footer text-xs text-justify font-normal brand-text mb-0 normal-case">
                          The Design Arm, caters to the Architectural & Engineering design requirements for clients.
                         </p>
                      </DisclosurePanel>
                    </Disclosure>
                    <Disclosure v-slot="{ open }">
                      <DisclosureButton
                        class="flex justify-between w-full bg-transaparent focus:outline-none focus-visible:ring focus-visible:ring-green-500 focus-visible:ring-opacity-75">
                        <span class="rvmp-footer-contact-text hover:text-green-600">Builders</span>
                      
                         <span class="fas " :class="[open ? 'fa-chevron-up' : 'fa-chevron-down', 'text-black']" aria-hidden="true"></span>
                      </DisclosureButton>
                      <DisclosurePanel class="px-2">
                         <p class="brand-service-description-footer text-xs text-justify font-normal brand-text mb-0 normal-case">
                         The Construction Arm, caters to new construction, renovation, addition, repair of vertical buildings mainly residential commercial & institutional and other related buildings.
                         </p>
                      </DisclosurePanel>
                    </Disclosure>
                    <Disclosure v-slot="{ open }">
                      <DisclosureButton
                        class="flex justify-between w-full bg-transaparent focus:outline-none focus-visible:ring focus-visible:ring-green-500 focus-visible:ring-opacity-75">
                        <span class="rvmp-footer-contact-text hover:text-green-600">Modular Cabinets</span>
                      
                         <span class="fas " :class="[open ? 'fa-chevron-up' : 'fa-chevron-down', 'text-black']" aria-hidden="true"></span>
                      </DisclosureButton>
                      <DisclosurePanel class="px-2">
                         <p class="brand-service-description-footer text-xs text-justify font-normal brand-text mb-0 normal-case">
                         The  Cabinetry Fabrication Arm, caters spaces, furnitures, and tailored product structures design.
                         </p>
                      </DisclosurePanel>
                    </Disclosure>
                    </div>
                </div>
                <div class="lg:col-span-2 col-span-1 space-y-3 lg:px-6 px-3">
                  <h3 class="text-lg font-medium leading-6 mb-0 brand-text rvmp-footer-contact-text uppercase semibold lg:text-left text-center">Contact Us</h3>
                    <div class="w-full flex flex-row" id="address" >
                          <span class="fas fa-map-marker-alt px-2 rvmp-brand-color-main self-center 2xl:text-3xl xl:text-2xl text-xl text-left"></span>
                            <span class="brand-text italic 2xl:text-sm text-xs text-left ">
                                Unit 3, Uypitching Building<br>Km. 8, Jose Romero Road<br>6215 Valencia, Negros Oriental<br>Philippines
                              </span>
                    </div>
                    <div class="w-full flex flex-row" id="contact-number">           
                              <span class="fas fa-phone-alt px-2 rvmp-brand-color-main self-center 2xl:text-2xl xl:text-xl text-lg text-left"></span>
                              <span class="brand-text italic 2xl:text-sm text-xs text-left">
                                0905-000-0000
                              </span>
                    </div>
                    <div class="w-full flex flex-row" id="contact-email">
                              <span class="fas fa-envelope px-2 rvmp-brand-color-main self-center 2xl:text-2xl xl:text-xl text-lg text-left"></span>
                              <span class="brand-text italic 2xl:text-sm text-xs text-left">
                                client.gli@gmail.com
                              </span>
                        
                      </div>
                       <div class="w-full grid grid-cols-2 gap-y-1" id="social-links">
                      <a href="https://www.facebook.com/gligroupinc" target="_blank" class="fab fa-facebook rvmp-brand-color-main 2xl:text-xl xl:text-lg text-sm text-left social-link"><span class="px-2 text-sm brand-logo-text hover:rvmp-brand-color-main rvmp-footer-contact-text"><span class="font-semibold">GLI</span> <span class="font-thin">Group Inc.</span> </span></a>
                      <a href="https://www.facebook.com/GLidesignstudio" target="_blank" class="fab fa-facebook rvmp-brand-color-main 2xl:text-xl xl:text-lg text-sm text-left social-link"><span class="px-2 text-sm brand-logo-text hover:rvmp-brand-color-main rvmp-footer-contact-text"><span class="font-thin">Design Studio</span></span></a>
                      <a href="https://www.facebook.com/GLI-Builders-102946945203186" target="_blank" class="fab fa-facebook rvmp-brand-color-main 2xl:text-xl xl:text-lg text-sm text-left social-link"><span class="px-2 text-sm brand-logo-text hover:rvmp-brand-color-main rvmp-footer-contact-text"><span class="font-thin">Builders</span></span></a>
                      <a href="https://www.facebook.com/glimodularcabinets" target="_blank" class="fab fa-facebook rvmp-brand-color-main 2xl:text-xl xl:text-lg text-sm text-left social-link"><span class="px-2 text-sm brand-logo-text hover:rvmp-brand-color-main rvmp-footer-contact-text"><span class="font-thin">Modular Cabinets</span></span></a>
                       </div>
                </div>
                <div class="lg:col-span-2 col-span-1 lg:mx-2 px-3">
                    <form action="#" method="POST" class="grid grid-cols-6 gap-y-3 overflow-hidden bg-transparent">
                        <div class="col-span-6">
                          <h3 class="text-lg font-medium leading-6 mb-0 brand-text rvmp-footer-contact-text uppercase semibold lg:text-left text-center">Tell us about your project</h3>
                        </div>
                        <div class="col-span-6">
                          <label for="first-name" class="text-sm font-medium rvmp-footer-contact-text capitalize hidden">Full name</label>
                          <input type="text" name="first-name" id="first-name" placeholder="Full name" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 " />
                        </div>
                        <div class="col-span-6">
                          <label for="email-address" class="text-sm font-medium rvmp-footer-contact-text capitalize hidden">Email address</label>
                          <input type="text" name="email-address" id="email-address" placeholder="Email Address" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 " />
                        </div>
                        <div class="col-span-6">
                          <label for="street-address" class="text-sm font-medium rvmp-footer-contact-text capitalize hidden">Message</label>
                          <textarea type="text" name="street-address" id="street-address" placeholder="Message" autocomplete="off" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 resize-none" ></textarea>
                        </div>
                        <div class="col-span-6">
                          <button class="bg-green-600 text-white px-4 py-1.5  hover:bg-green-700 w-full transition ease-in-out duration-300">Sumbit</button>
                        </div>
                    </form>
                </div>        
          </div>
    </div>
    <div class="container mx-auto bg-transparent">
        <div class=" lg:grid lg:grid-cols-6 flex flex-col border-t-2 border-gray-100 items-center bg-transparent">
           <div class="lg:col-span-1 w-full lg:order-1 order-3 text-center lg:py-6 py-2 relative bg-transparent">
                <img src="/images/revamp-system-solutions.png" oncontextmenu="return false;" class="mx-auto w-1/3 lg:w-36 ">
            </div>
            <div class="lg:col-span-2 w-full lg:text-left text-center  lg:order-2 order-1 lg:py-6 relative bg-transparent">
                <p class="text-sm rvmp-footer-contact-text font-semibold mb-2 uppercase brand-logo-text">
                    © {{ new Date().getFullYear() }} | GLI <span class='brand-logo-text font-light'>Group Inc.</span> 
                </p>

            </div>
            <div class="lg:col-span-3 w-full lg:text-right text-center lg:order-3 order-2 lg:py-6 relative bg-transparent lg:text-base text-xs">
                <a href="#" class="px-3">Privacy Policy</a>
                <a href="#" class="px-3">Terms And Condition</a>
            </div>
        </div>
    </div>
</footer>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'



export default {
    name: "ContactForm",
    components:{
      Disclosure,
      DisclosureButton,
      DisclosurePanel,

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
