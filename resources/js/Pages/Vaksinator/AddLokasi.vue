<template>
    <Sidebar @toggleChildClass="toggleChildClass" />
    <div ref="homeContent" class="p-4 sm:ml-64">
        <div
            class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700"
        >
            <form @submit.prevent="buatJadwal">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6" >
                            <div class="sm:col-span-3">
                                <label
                                    for="kecamatan"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                    >Kecamatan</label
                                >
                                <div class="mt-2">
                                    <input
                                        type="text"
                                        v-model="form.kecamatan"
                                        id="kecamatan"
                                        autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                                <div
                                    v-if="form.errors.kecamatan"
                                    v-text="form.errors.kecamatan"
                                    class="text-xs text-red-500 mt-2"
                                ></div>
                            </div>

                            <div class="sm:col-span-3">
                                <label
                                    for="desa"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                    >Desa / Kelurahan</label
                                >
                                <div class="mt-2">
                                    <input
                                        type="text"
                                        name="desa"
                                       
                                        v-model="form.desa"
                                        autocomplete="family-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                                <div
                                    v-if="form.errors.desa"
                                    v-text="form.errors.desa"
                                    class="text-xs text-red-500 mt-2"
                                ></div>
                            </div>

                            <div class="sm:col-span-6">
                                <label
                                    for="alamat"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                    >Alamat</label
                                >
                                <div class="mt-2">
                                    <input
                                        id="alamat"
                                        name="text"
                                        type="alamat"
                                        v-model="form.alamat"
                                        autocomplete="alamat"
                                        class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                                <div
                                    v-if="form.errors.alamat"
                                    v-text="form.errors.alamat"
                                    class="text-xs text-red-500 mt-2"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <Link
                        :href="route('index.lokasi')"
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
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import CKEditor from "@ckeditor/ckeditor5-vue"
export default {
    components: {
        Sidebar,
        Link,
        ckeditor: CKEditor.component
    },

    props: {
        dataVaksin: {
            type: Array,
        },
    },

    setup() {
        const form = useForm({
            kecamatan: "",
            desa: "",
            alamat: "",

        });

        const buatJadwal = () => {
            form.post(route("lokasi.saveLokasi"));
        };

        return {
            form,
            buatJadwal,
            editor: ClassicEditor,

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
