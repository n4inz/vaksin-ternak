<template>
    <Sidebar @toggleChildClass="toggleChildClass" />
    <div ref="homeContent" class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            <div class="flex items-center justify-end space-x-2">
                <Link :href="route('jadwal.createJadwal')" type="button" class="hover:cursor-pointer text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2 space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>

                    <span>Buat jadwal</span> 
                </Link>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3">
                                Jadwal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Lokasi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Vaksinator
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah pendaftar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah sapi
                            </th>
                            <!-- <th scope="col" class="px-6 py-3">
                                Umur
                            </th> -->
                            <!-- <th scope="col" class="px-6 py-3">
                                Jumlah vaksin
                            </th> -->
                            <th scope="col" class="px-6 w-40 py-3">
                                status
                            </th>
                            <!-- <th scope="col" class="px-6 py-3">
                                Action
                            </th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in jadwal" :key="item" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex space-x-2 items-center justify-center">
                                    <svg @click="hapus(item.id)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500 hover:cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>

                                    <span>{{ item.jadwal }} {{ item.waktu }}</span>
                                
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ item.lokasi }}
                            </td>
                            <td class="px-6 py-4">
                                {{ item.user ? item.user.name : '' }}
                            </td>
                            <td class="px-6 py-4">
                               {{ item.pendaftaran_vaksin_count }}
                            </td>
                            <td class="px-6 py-4">
                                {{ item.pendaftaran_vaksin_sum_jumlah_hewan }}
                            </td>
                            <!-- <td class="px-6 py-4">
                                {{ item.umur_jumlah }} {{ item.umur_bulan }}
                            </td> -->
                            <!-- <td class="px-6 py-4">
                                {{ item.jumlah_vaksin }}
                            </td> -->
                            <td class="px-6 py-4">
                                <div class="sm:col-span-3">
                                    <div class="mt-2">
                                        <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option :selected="item.status === 0"  >New</option>
                                            <option :selected="item.status === 1" >Progress</option>
                                            <option :selected="item.status === 2" >Done</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                            <!-- <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

import Sidebar from '../Layouts/Sidebar.vue';
import { Link } from '@inertiajs/vue3';
import { router, useForm } from '@inertiajs/vue3'
import { ref ,reactive} from 'vue';

export default {
  components: {
    Sidebar,
    Link
  },

    props: {
        jadwal: {
            type: Object,
        },

    },

    setup(){
        const myInput = ref([]);
        const form = reactive({
            nama_vaksin: [],
                jumlah: [],
        });

        
        const addInput = () => {
            myInput.value.push({ nama_vaksin: '', jumlah: '' });
        }

        const submit = (index) => {
            router.post('/vaksin-store', {nama_vaksin : form.nama_vaksin[index] , jumlah : form.jumlah[index]},{
                onSuccess: (page) => {
                     myInput.value.splice(index, 1);
                },

            })
        }

        const hapus = (i) => {
            router.delete('/delete-jadwal/'+i)
        }
        return {
            myInput,
            addInput,
            form,
            submit,
            hapus
        }
    },

  methods: {
    toggleChildClass() {
      this.$refs.homeContent.classList.toggle('sm:ml-64');
    }
  }
  // Logika komponen lain
}


</script>
