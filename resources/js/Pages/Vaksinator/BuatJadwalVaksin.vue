<template>
    <Sidebar @toggleChildClass="toggleChildClass" />
    <div ref="homeContent" class="p-4 sm:ml-64">
        <div
            class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700"
        >
            <form @submit.prevent="buatJadwal">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2
                            class="text-base font-semibold leading-7 text-gray-900"
                        >
                            Buat jadwal vaksin
                        </h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">
                            Jadwal vaksin akan ditampilkan di halaman home
                        </p>

                        <div
                            class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                        >
                            <div class="sm:col-span-3">
                                <label
                                    for="jadwal"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                    >Jadwal tanggal</label
                                >
                                <div class="mt-2">
                                    <input
                                        type="date"
                                        name="jadwal"
                                        v-model="form.jadwal"
                                        id="jadwal"
                                        autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                                <div
                                    v-if="form.errors.jadwal"
                                    v-text="form.errors.jadwal"
                                    class="text-xs text-red-500 mt-2"
                                ></div>
                            </div>

                            <div class="sm:col-span-3">
                                <label
                                    for="waktu"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                    >Jadwal waktu</label
                                >
                                <div class="mt-2">
                                    <input
                                        type="time"
                                        name="waktu"
                                        id="waktu"
                                        v-model="form.waktu"
                                        autocomplete="family-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                                <div
                                    v-if="form.errors.waktu"
                                    v-text="form.errors.waktu"
                                    class="text-xs text-red-500 mt-2"
                                ></div>
                            </div>

                            <div class="sm:col-span-4">
                                <label
                                    for="lokasi"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                    >Lokasi vaksinani</label
                                >
                                <div class="mt-2">
                                    <input
                                        id="lokasi"
                                        name="text"
                                        type="lokasi"
                                        v-model="form.lokasi"
                                        autocomplete="lokasi"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                                <div
                                    v-if="form.errors.lokasi"
                                    v-text="form.errors.lokasi"
                                    class="text-xs text-red-500 mt-2"
                                ></div>
                            </div>
                            <div class="sm:col-span-2">
                                <label
                                    for="nama_vaksin"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                    >Nama Vaksin</label
                                >
                                <div class="mt-2">
                                    <select
                                        id="nama_vaksin"
                                        autocomplete="nama_vaksin"
                                        v-model="form.nama_vaksin"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                    >
                                        <option
                                            v-for="item in dataVaksin"
                                            :key="item"
                                            :value="item.id"
                                        >
                                            {{ item.nama_vaksin }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label
                                    for=""
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                    >Keterangan</label
                                >
                                <div class="mt-2">
                                    <textarea 
                                     name="keterangan" 
                                     id="" 
                                     cols="30" 
                                     rows="10"
                                      v-model="form.keterangan"
                                     class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                     >


                                    </textarea>
                                         
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <Link
                        :href="route('jadwal.index')"
                        type="button"
                        class="text-sm font-semibold leading-6 text-gray-900"
                        >Cancel</Link
                    >
                    <button
                        :disabled="form.processing"
                        type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Sidebar from "../Layouts/Sidebar.vue";
import { Link } from "@inertiajs/vue3";
import { router, useForm } from "@inertiajs/vue3";

export default {
    components: {
        Sidebar,
        Link,
    },

    props: {
        dataVaksin: {
            type: Array,
        },
    },

    setup() {
        const form = useForm({
            jadwal: "",
            waktu: "",
            lokasi: "",
            nama_vaksin: "",
            keterangan:""
        });

        const buatJadwal = () => {
            form.post(route("jadwal.storeJadwal"));
        };

        return {
            form,
            buatJadwal,
        };
    },

    methods: {
        toggleChildClass() {
            this.$refs.homeContent.classList.toggle("sm:ml-64");
        },
    },
    // Logika komponen lain
};
</script>
