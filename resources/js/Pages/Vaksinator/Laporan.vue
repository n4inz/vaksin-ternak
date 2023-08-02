<template>
    <Sidebar @toggleChildClass="toggleChildClass" />
    <div ref="homeContent" class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Tanggal selesai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kecamatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Desa
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah Pendaftar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah Sapi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in laporan" :key="item" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <span>{{ item.updated_at }}</span>
                            </th>
                            <td class="px-6 py-4">
                                <span v-if="item.kecamatan !== null">{{ item.kecamatan.kecamatan }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span v-if="item.desa !== null">{{ item.desa.desa }}</span>
                            </td>
                            <td class="px-6 py-4">
                               {{ item.pendaftaran_vaksin_count }}
                            </td>
                            <td class="px-6 py-4">
                                {{ item.pendaftaran_vaksin_sum_jumlah_hewan }}
                            </td>
                            <td class="px-2 py-4 flex items-center space-x-2">
                                <div class="sm:col-span-3">
                                    <div class="mt-2">
                                        <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option :selected="item.status === 0"  >New</option>
                                            <option :selected="item.status === 1" >Progress</option>
                                            <option :selected="item.status === 2" >Done</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <Link :href="route('jadwal.detailPendaftar' , item.id)" class="bg-purple-700 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                        </svg>
                                    </Link>
                                </div>
                            </td>
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
// import { Inertia } from '@inertiajs/inertia';


export default {
  components: {
    Sidebar,
    Link
  },

    props: {
        laporan: {
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
            router.delete('/vaksin-delete/'+i)
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
