<template>
    <div class="flex min-h-full flex-col justify-center h-screen bg-gray-50 px-6 py-12 lg:px-8">
        <div class="bg-white w-[50%] p-5 mx-auto rounded">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-24 w-auto" src="https://upload.wikimedia.org/wikipedia/commons/b/b7/Official_Logo_of_Sidenreng_Rappang_Regency.png" alt="Your Company">
                
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form  @submit.prevent="submitLogin" class="space-y-6" action="#" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input v-model="form.email" @input="clearErrors('email')" name="email" type="email" autocomplete="email"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div v-if="form.errors.email" v-text="form.errors.email" class="text-xs text-red-500 mt-2"></div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                   
                    </div>
                    <div class="mt-2">
                        <input v-model="form.password" @input="clearErrors('password')" name="password" type="password" autocomplete="current-password"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div v-if="form.errors.password" v-text="form.errors.password" class="text-xs text-red-500 mt-2"></div>
                    </div>
                </div>

                <div>
                    <button :disabled="form.processing" type="submit" class="flex w-full justify-center rounded-md bg-[#3b5998] hover:bg-[#3b5998]/90 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    import { Link } from '@inertiajs/vue3';
    import { useForm } from '@inertiajs/vue3';

    export default {
      components: {
          Link
      },

      setup(){
        const form = useForm({
            email: '',
            password: '',
        });

        const submitLogin = () => {
          form.post('/login-store');
        };

        const clearErrors = (field) => {
        form.clearErrors(field)
        };
        
        return {
          form,
          submitLogin,
          clearErrors
        };
      }



    }

</script>