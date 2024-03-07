<template>
    <div class="p-3 rounded-xl bg-white flex flex-col gap-4">
        <!-- Title Pages -->
        <title-pages :backto="'/dashboard/konfigurasi'">
            Konfigurasi Meta Site
        </title-pages>
        <!-- Endt Title Pages -->

        <!-- Mesasge -->
        <div
            v-if="$page.props.flash.message"
            class="mx-3 h-12 bg-green-400 rounded-lg flex flex-col justify-center"
        >
            <div class="mx-4 flex justify-between py-2">
                <div class="my-auto font-semibold text-white">
                    {{ $page.props.flash.message }}
                </div>
                <div class="flex gap-3">
                    <button
                        class="bg-white my-auto text-xs rounded-lg font-semibold py-2 px-3 text-green-400 hover:drop-shadow-sm"
                        @click="$page.props.flash.message = null"
                    >
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- End Message -->

        <!-- Main Page -->
        <div class="my-2 text-gray-700 flex justify-between mx-4">
            <form
                @submit.prevent="submitForm"
                class="p-5 flex flex-col w-full gap-5"
            >
                <div class="flex flex-col gap-2">
                    <label class="text-gray-700 font-semibold"
                        >Meta Title</label
                    >
                    <input
                        class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                        type="text"
                        name=""
                        placeholder="Meta Title & The Title for Web Site"
                        v-model="form.meta_title"
                        required
                    />
                    <div
                        class="text-xs px-1 text-red-600"
                        v-if="errors.meta_title"
                    >
                        {{ errors.meta_title }}
                    </div>
                    <div
                        class="rounded-lg drop-shadow-sm text-sm bg-slate-100 text-yellow-600 p-3"
                    >
                        <div>
                            Maksimal Karakter Pada Title Website anda adalah 30
                            - 65 Karakter | Anda telah memberikan
                            {{ this.form.meta_title.length }}
                        </div>
                        <div
                            v-if="
                                this.form.meta_title.length < 30 ||
                                this.form.meta_title.length > 65
                            "
                            class="text-red-600"
                        >
                            <i class="fas fa-times"></i> Karakter Tidak Sesuai
                        </div>
                        <div v-else class="text-green-600">
                            <i class="fas fa-check"></i> Oke
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-700 font-semibold"
                        >Meta Desciption</label
                    >
                    <textarea
                        class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                        name=""
                        id=""
                        cols="30"
                        required
                        rows="3"
                        v-model="form.meta_description"
                        placeholder="Website Description, Describe About Your Website"
                    ></textarea>
                    <div
                        class="text-xs px-1 text-red-600"
                        v-if="errors.meta_description"
                    >
                        {{ errors.meta_description }}
                    </div>
                    <div
                        class="rounded-lg drop-shadow-sm text-sm bg-slate-100 text-yellow-600 p-3"
                    >
                        <div>
                            Maksimal Karakter Pada Title Website anda adalah 120
                            - 320 Karakter | Anda telah memberikan
                            {{ this.form.meta_description.length }}
                        </div>
                        <div
                            v-if="
                                this.form.meta_description.length < 120 ||
                                this.form.meta_description.length > 320
                            "
                            class="text-red-600"
                        >
                            <i class="fas fa-times"></i> Karakter Tidak Sesuai
                        </div>
                        <div v-else class="text-green-600">
                            <i class="fas fa-check"></i> Oke
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-700 font-semibold"
                        >Meta Keyword</label
                    >
                    <textarea
                        class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                        name=""
                        id=""
                        cols="30"
                        rows="3"
                        required
                        v-model="form.meta_keyword"
                        placeholder="Website Keyword, Describe About Your Website Keyword"
                    ></textarea>
                    <div
                        class="text-xs px-1 text-red-600"
                        v-if="errors.meta_keyword"
                    >
                        {{ errors.meta_keyword }}
                    </div>
                    <div
                        class="rounded-lg drop-shadow-sm text-sm bg-slate-100 text-yellow-600 p-3"
                    >
                        <div>
                            Idealnya Pada Sebuah Halaman Website ada 10 Keyword
                            Maksimal sebagai kata kunci pencarian di google
                            dipisahkan dengan , Contoh :
                            <span class="text-gray-700">
                                Halaman web tentang cara membuat kue cokelat:
                                "resep kue cokelat", "cara membuat kue cokelat",
                                "kue cokelat terbaik", "resep kue cokelat
                                mudah"</span
                            >
                        </div>
                    </div>
                </div>
                <button
                    class="bg-blue-400 hover:bg-blue-700 text-white py-1 rounded-md drop-shadow-sm"
                    type="submit"
                >
                    Save
                </button>
            </form>
        </div>
        <!-- End Main Pag -->
    </div>
</template>

<script>
import Navigasi from "../../../Widgets/Navigasi.vue";
import DashboardLayout from "../../../Layouts/DashboardLayout.vue";
import TitlePages from "../../../Widgets/TitlePages.vue";
import { useForm, router } from "@inertiajs/vue3";
export default {
    // setup
    setup() {
        const form = useForm({
            meta_title: "",
            meta_description: "",
            meta_keyword: "",
        });

        return { form };
    },
    // props from data route
    props: {
        errors: Object,
        meta_data: Object,
    },
    components: {
        Navigasi,
        DashboardLayout,
        TitlePages,
    },
    layout: DashboardLayout,
    methods: {
        loadData() {
            this.form.meta_title = this.meta_data.data[0].meta_title;
            this.form.meta_description =
                this.meta_data.data[0].meta_description;
            this.form.meta_keyword = this.meta_data.data[0].meta_keyword;
        },
        submitForm() {
            router.post("/dashboard/konfigurasi/meta/update", this.form, {
                preserveScroll: true,
            });
        },
    },
    mounted() {
        this.loadData();
    },
};
</script>

<style></style>
