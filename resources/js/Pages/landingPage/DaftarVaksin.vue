<template>
<div v-if="!$page.props.flash.message" class="mx-auto m-10 border-2 border-gray-200 w-[80%] p-14 rounded-lg dark:border-gray-700">
    <div  class="relative overflow-x-auto ">
        <form @submit.prevent="daftarVaksin">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Pendaftaran vaksinasi</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600 text-center">Pengisian data diri untuk mengetahui detail hewan yang di vaksin</p>
                

                
                <div class="flex flex-col mt-16 text-slate-500">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Kriteria hewan sapi layak vaksin</h2>
                    <!-- <span>1. Sapi bisa di vaksin mulai umur 2 minggu s/d sapi dewasa</span>
                    <span>2. Sapi sehat</span>
                    <span> 3. Sapi sakit tidak di perbolehkan divaksin</span>
                    <span>4. sapi sakit bisa divaksin 6(enam) bulan setelah kesembuhannya</span> -->
                     <!-- <p class="formatted-text" v-html="jadwal.keterangan"></p> -->
                     <p class="formatted-text">
                        1. Sapi bisa di vaksin mulai umur 2 minggu s/d sapi dewasa <br>
                        2. Sapi sehat <br>
                        3. Sapi sakit tidak di perbolehkan divaksin <br>
                        4. sapi sakit bisa divaksin 6(enam) bulan setelah kesembuhannya
                     </p>
                </div>
               

             
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">Nik</label>
                        <div class="mt-2">
                            <input   type="number" id="nik" v-model="form.nik"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="16" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <div v-if="form.errors.nik" v-text="form.errors.nik" class="text-xs text-red-500 mt-2"></div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="nama_pemilik" class="block text-sm font-medium leading-6 text-gray-900">Nama Pemilik Hewan</label>
                        <div class="mt-2">
                            <input type="text" v-model="form.nama_pemilik" id="nama_pemilik" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <div v-if="form.errors.nama_pemilik" v-text="form.errors.nama_pemilik" class="text-xs text-red-500 mt-2"></div>
                    </div>



                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Lokasi Vaksin</label>
                        <div class="mt-2">
                            <input disabled id="email" name="email" :value="jadwal.lokasi" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>


                    <div class="sm:col-span-1">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900 invisible">Umur</label>
                        <div class="mt-2">
                            <input id="email" v-model="form.umur_jumlah"  type="number" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>


                    <div class="sm:col-span-1">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900 invisible">Umur</label>
                        <div class="mt-2">
                        <select v-model="form.umur_bulan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="" id="">
                            <option value="Bulan">Bulan</option>
                            <option value="Minggu">Minggu</option>
                        </select>

                        </div>
                        
                    </div>



                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Nama Vaksin</label>
                        <div class="mt-2">
                            <input disabled type="text" :value="jadwal.nama_vaksin.nama_vaksin" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>


                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="jumlah_hewan" class="block text-sm font-medium leading-6 text-gray-900">Jumlah hewan</label>
                        <div class="mt-2">
                            <input type="number" v-model="form.jumlah_hewan" id="jumlah_hewan" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <div v-if="form.errors.jumlah_hewan" v-text="form.errors.jumlah_hewan" class="text-xs text-red-500 mt-2"></div>
                    </div>

                    <div class="sm:col-span-2">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Vaksin</label>
                    <div class="mt-2">
                        <input type="text" disabled :value="jadwal.jadwal" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>

                    <div class="sm:col-span-2">
                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">Waktu Vaksin</label>
                    <div class="mt-2">
                        <!-- <input  type="text" :value="jadwal.id"> -->
                        <input disabled :value="jadwal.jadwal" type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <Link :href="route('landingPage.index')" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</Link>
                <button :disabled="form.processing" type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</div>
<div v-if="$page.props.flash.message" class="flex flex-col items-center justify-center  p-14">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-32 h-32 text-slate-700/50 opacity-50">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
    </svg>
    <p class="text-xl max-w-sm text-center mt-5 text-slate-700/100">Pendaftaran vaksin berhasil, Tunjukkan Ktp anda saat melakukan vaksin pada lokasi yang anda pilih</p>
    <Link :href="route('landingPage.index')" class="text-white bg-blue-500 p-2 mt-5 rounded">Kembali</Link>
</div>
</template>

<script>

import Sidebar from '../Layouts/Sidebar.vue';
import { Link , useForm } from '@inertiajs/vue3';

export default {
    components: {
        Sidebar,
        Link
    },
    

    props:{
        jadwal:{
            type:Array
        },
        success:{
            type:Object
        }
    },

    setup(props){
        const form = useForm({
            nik: "",
            jumlah_hewan: "",
            nama_pemilik: "",
            jadwal_vaksin_id: props.jadwal.id,
            umur_jumlah:"",
            umur_bulan:""

        });


        const daftarVaksin = () => {
            form.post('/store-vaksinasi')
        }
        
        return {
            form,
            daftarVaksin,
        }
    },


  // Logika komponen lain
}


</script>

<style scoped>
.formatted-text {
  white-space: pre-line;
}

</style>