<template>
    <Sidebar @toggleChildClass="toggleChildClass" />
    <div ref="homeContent" class="p-4 sm:ml-64">
        <div class="p-4  rounded-lg dark:border-gray-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Jadwal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Lokasi
                            </th>


                            <th scope="col" class="px-6 py-3">
                                Jumlah sapi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama vaksin
                            </th>
                            <!-- <th scope="col" class="px-6 py-3">
                                Jumlah vaksin
                            </th> -->
                            <th scope="col" class="px-6 py-3">
                                status
                            </th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in jadwal" :key="item" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ item.jadwal }} {{ item.waktu }}
                            </th>
                            <td class="px-6 py-4">
                                {{ item.lokasi }}
                            </td>

                            <td class="px-6 py-4">
                                {{ item.pendaftaran_vaksin_sum_jumlah_hewan }}
                            </td>

                            <td class="px-6 py-4">
                                {{ item.nama_vaksin.nama_vaksin }}
                            </td>
                            <!-- <td class="px-6 py-4">
                              <div class="w-[10%]">
                                <input v-model="item.jumlah_vaksin" type="number"  class="text-sm border-none outline-none focus:ring-0">
                              </div>
                              <div v-if="$page.props.flash.message == 'stok_'+item.id" class="text-xs text-red-500 mt-2">Stok vaksin tidak cukup</div>
                            </td> -->
                            <td class="px-6 py-4">
                                <div class="sm:col-span-3">
                                    <div class="mt-2">
                                        <select @change="change(item)" id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option :selected="item.status === 0" value="0" >New Jadwal</option>
                                            <option :selected="item.status === 1" value="1" >Progress</option>
                                            <option :selected="item.status === 2" value="2">Done</option>
                                        </select>
                                    </div>
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
        
        const change = (i) => {
          const status = event.target.value;
          router.post('/add-jumlah-vaksin', {id: i.id,status  , jumlahVaksin : 1},)

        //   router.post('/add-jumlah-vaksin', {id: i.id,status  , jumlahVaksin : i.jumlah_vaksin},)
        }

        return {
          change
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
