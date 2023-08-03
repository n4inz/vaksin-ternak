<template>
    <Sidebar @toggleChildClass="toggleChildClass" />
    <div ref="homeContent" class="p-4 sm:ml-64">
        <div class="mb-5 flex items-center justify-end space-x-2">
            <select v-model="selectedOption" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <option value="Minggu">Minggu</option>
            <option value="Bulan">Bulan</option>
            <option value="Tahun">Tahun</option>
            </select>

            <a  @click="export_pdf()" type="button" class="hover:cursor-pointer text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-1.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                </svg>
                <span>Export Pdf</span> 
            </a>
        </div>
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
                                {{ formatDate(item.updated_at) }}
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
                                <div class="sm:col-span-3 text-green-500">
                                   Selesai
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
import { router } from '@inertiajs/vue3'
import { ref} from 'vue';

import dayjs from 'dayjs';

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
        const selectedOption = ref('Minggu'); 
        const formatDate = (date) => {
        return dayjs(date).format('YYYY/DD/MM');

        }

       const export_pdf = () => {
            window.location.href = '/export-pdf?data='+selectedOption.value;

        }



        return {
            myInput,
            formatDate,
            selectedOption,
            export_pdf
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
