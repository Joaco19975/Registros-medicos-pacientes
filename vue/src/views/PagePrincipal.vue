<!-- This example requires Tailwind CSS v3.0+ -->
<template>
    <div class="isolate bg-white">
      <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" >
        <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678">
          <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
          <defs>
            <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
              <stop stop-color="#9089FC" />
              <stop offset="1" stop-color="#FF80B5" />
            </linearGradient>
          </defs>
        </svg>
      </div>
      <div class="px-6 pt-6 lg:px-8">
        <nav class="flex items-center justify-between" aria-label="Global">
          <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
              <span class="sr-only">Your Company</span>
              <img class="h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
            </a>
          </div>
          <div class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = true">
              <span class="sr-only">Open main menu</span>
              <Bars3Icon class="h-6 w-6" aria-hidden="true" />
            </button>
          </div>
          <div class="hidden lg:flex lg:gap-x-12">
            <a v-for="item in navigation" :key="item.name" :href="item.href" class="text-sm font-semibold leading-6 text-gray-900">{{ item.name }}</a>
          </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
              <router-link :to="{name:'Login'}" class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">
                Log in
              </router-link>
              
            </div>
          
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <router-link :to="{name:'Register'}" class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">
                          Register for free
                </router-link>
              </div>


        </nav>
        <Dialog as="div" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
          <DialogPanel focus="true" class="fixed inset-0 z-10 overflow-y-auto bg-white px-6 py-6 lg:hidden">
            <div class="flex items-center justify-between">
              <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
              </a>
              <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = false">
                <span class="sr-only">Close menu</span>
                <XMarkIcon class="h-6 w-6" aria-hidden="true" />
              </button>
            </div>
            <div class="mt-6 flow-root">
              <div class="-my-6 divide-y divide-gray-500/10">
                <div class="space-y-2 py-6">
                  <a v-for="item in navigation" :key="item.name" :href="item.href" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">{{ item.name }}</a>
                </div>
                <div class="py-6">
                    <router-link :to="{name:'Login'}" class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">
                        Log in
                    </router-link>
                    <router-link :to="{name:'Register'}" class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">
                        Register for free
                    </router-link>
                </div>
              </div>
            </div>
          </DialogPanel>
        </Dialog>
      </div>
      <main>
        <div class="relative px-6 lg:px-8">
          <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">

            <div class="text-center">
              <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">For the world we want.</h1>
              <h2  class="text-4xl">We offer hospitals a web application for the control and registration of patients, medicines, and the control of medicines given to each patient</h2>
              <p class="mt-6 text-lg leading-8 text-gray-600">Fear, worry, and stress are normal responses at times when we are faced with uncertainty, the unknown, or situations of change or crisis.</p>
              <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-1.5 text-base font-semibold leading-7 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                <a href="#" class="text-base font-semibold leading-7 text-gray-700">Learn more <span aria-hidden="true">→</span></a>
              </div>
            </div>
          </div>
          <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
            <svg class="relative left-[calc(50%+3rem)] h-[21.1875rem] max-w-none -translate-x-1/2 sm:left-[calc(50%+36rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678">
              <path fill="url(#ecb5b0c9-546c-4772-8c71-4d3f06d544bc)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
              <defs>
                <linearGradient id="ecb5b0c9-546c-4772-8c71-4d3f06d544bc" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#9089FC" />
                  <stop offset="1" stop-color="#FF80B5" />
                </linearGradient>
              </defs>
            </svg>
          </div>
        </div>
      </main>
      
    </div>
    <div class="contact-tittle">
      <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Contact us</h1>
    </div>
    <div class="contact-container">
      <div class="manage-img">
        <a href=""><img src="../assets/gmail.png" alt="Gmail"></a>
        <a href=""><img src="../assets/whatsapp.png" alt="Whatsapp"></a>
        <a href=""><img src="../assets/facebook.png" alt="Facebook"></a>
        <a href=""><img src="../assets/instagram.png" alt="Instagram"></a>
      </div>
    </div>
    <div class="img-container">
      <img src="../assets/MentalHealthy.png" alt="MentalHealthy" >
    </div>
    <div class="mt-10 flex items-center justify-center gap-x-6">
      <button class="rounded-md bg-indigo-600 px-3.5 py-1.5 text-base font-semibold leading-7 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" style="height: 70px;width: 140px;font-size: x-large;">Donate</button>
    </div>
    <div class="tittle-map">
      <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Where are us?</h1>
    </div>
    <div class="map-container">
      <div class="scuare">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0167132768506!2d-58.383759084293054!3d-34.60373888045936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4aa9f0a6da5edb%3A0x11bead4e234e558b!2sObelisco!5e0!3m2!1ses!2sar!4v1676675724115!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    </div>
      </div>
</template>
<style scoped>

  .contact-tittle{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 70px;
  }

  .contact-container{
    display: flex;
    justify-items: center;
    align-items: center;
    margin-bottom: 70px;
  }

  .manage-img>img{
    object-fit: cover;
  }

  .manage-img>a{
    display: flex;
    object-fit: cover;
    height: 100%;
    width: 100px;
  }

  .manage-img{
    display: flex;
    margin: auto;
    height: 100px;
    width: 800px;
    justify-content: space-around;
  }
  .img-container{
    display: flex;
    align-content: center;
    justify-content: center;
    padding: 50px 0px;
    height: 600px;
    width: 100vw;
    margin: auto;
    background-color: #4e46e594;
  }

  .button-container{
    display: flex;
    align-content: center;
    justify-content: center;
    margin-top: 30px;
  }

  .tittle-map{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 40px;
    font-weight: bold;
    margin-top: 50px;
    height: 200px;
  }

  .map-container{
    display: flex;
    align-content: center;
    justify-content: center;
    margin-top: 30px;
    margin-bottom: 50px
  }

  .scuare{
    border: 1px black solid;
    padding: 4px;
    border-radius: 15px;
    box-shadow: 0px 3px 5px rgba(15,15,15,.5);
  }

</style>
  
<script setup>
  import { ref } from 'vue'
  import { Dialog, DialogPanel } from '@headlessui/vue'
  import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'

  const navigation = [
    { name: 'Company', href: '#' },
  ]

  const mobileMenuOpen = ref(false)
</script>