<template>
    <Sidebar @toggleChildClass="toggleChildClass" />
    <div ref="homeContent" class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            <div class="flex flex-col space-y-2 mb-5 bg-wite shadow w-96 p-5">
                <span class="text-neutral-800">
                    Vaksinator bertugas : 
                    <span class="font-semibold" v-if="daftarVaksin.user !== null">{{daftarVaksin.user.name}}</span>
                    <span class="font-semibold" v-if="daftarVaksin.user == null">-</span>
                </span>
                <span class="text-neutral-800">Status: 
                    <span class="font-semibold" v-if="daftarVaksin.status == 0">New Jadwal</span>
                    <span class="font-semibold" v-if="daftarVaksin.status == 1">Progress</span>
                    <span class="font-semibold" v-if="daftarVaksin.status == 2">Done</span>
                </span>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3 pl-5">
                                Nik
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor HP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Pemilik
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kecamatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Desa
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah sapi
                            </th>
                            <th scope="col" class="px-6 w-40 py-3">
                                Umur
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in daftarVaksin.pendaftaran_vaksin" :key="item" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ item.nik }}
                            </th>
                            <td class="px-6 py-4">
                                <span v-if="item.no_hp">{{ item.no_hp }}</span>
                              
                            </td>
                            <td class="px-6 py-4">
                               {{ item.nama_pemilik }}
                            </td>
                            <td class="px-6 py-4">
                               {{ item.desa }}
                            </td>
                            <td class="px-6 py-4">
                               {{ item.kecamatan }}
                            </td>
                            <td class="px-6 py-4">
                               {{ item.alamat }}
                            </td>
                            <td class="px-6 py-4">
                                {{ item.jumlah_hewan }}
                            </td>
                            <td class="px-6 py-4">
                               {{ item.umur_jumlah }} {{ item.umur_bulan }}
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
        daftarVaksin: {
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
