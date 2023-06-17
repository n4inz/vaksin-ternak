<template>
    <Sidebar @toggleChildClass="toggleChildClass" />
    <div ref="homeContent" class="p-4 sm:ml-64">
        <div class="p-4 border-2 w-1/2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mx-auto">
            
            <h1 class="text-center">Add user</h1>

            <form @submit.prevent="submitRegister">
                <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="name" @input="clearErrors('name')" v-model="form.name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name" >
                <div v-if="form.errors.name" v-text="form.errors.name" class="text-xs text-red-500 mt-2"></div>
              </div>
              <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input type="email" @input="clearErrors('email')" v-model="form.email"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="email" >
                <div v-if="form.errors.email" v-text="form.errors.email" class="text-xs text-red-500 mt-2"></div>
              </div>
              <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input type="password" @input="clearErrors('password')" name="password" v-model="form.password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                <div v-if="form.errors.password" v-text="form.errors.password" class="text-xs text-red-500 mt-2"></div>
              </div>
              <div class="flex items-center justify-center space-x-2">
                <Link :href="route('vaksinator')" type="submit" class="text-center text-slate-700 bg-white border-2  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</Link>

                <button :disabled="form.processing" type="submit" class="text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah account</button>
              </div>

            </form>

        </div>
    </div>
</template>

<script>

import Sidebar from '../Layouts/Sidebar.vue';
import { useForm, Link } from '@inertiajs/vue3'

export default {
  components: {
    Sidebar,
    Link
  },

  setup(){
    const form = useForm({
        name: '',
        username: '',
        email: '',
        password: '',
    });

    const submitRegister = () => {
      form.post('/vaksinator/user/store');
    };

    const clearErrors = (field) => {
      form.clearErrors(field)
    };
    
    return {
      form,
      submitRegister,
      clearErrors
    };
},

  methods: {
    toggleChildClass() {
      this.$refs.homeContent.classList.toggle('sm:ml-64');
    }
  }
  // Logika komponen lain
}


</script>
