<template>
    <div class="p-3 rounded-xl bg-white flex flex-col gap-4 drop-shadow mb-10">
        <!-- Title Pages -->
        <title-pages> Create Blog/News/Posting/Info </title-pages>
        <!-- Endt Title Pages -->
        <div class="px-5">
            <div
                v-if="this.imageBaru != null"
                class="flex justify-between gap-2"
            >
                <img
                    class="rounded-md max-w-lg"
                    :src="imagesShow(this.imageBaru)"
                    alt=""
                />
            </div>
            <div v-else>
                <img
                    class="rounded-md max-w-lg"
                    :src="'/storage/img/blog-news/' + this.image"
                    alt=""
                />
            </div>
        </div>
        <div>
            <form
                @submit.prevent="submitForm"
                class="p-5 flex flex-col w-full gap-5"
            >
                <div class="flex flex-col gap-2">
                    <label class="text-gray-700">Title Post</label>
                    <input
                        class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                        type="text"
                        name=""
                        placeholder="Title Konten"
                        v-model="form.title"
                    />
                    <div class="text-xs px-1 text-red-600" v-if="errors.title">
                        {{ errors.title }}
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-700">Main Content</label>
                    <Editor
                        api-key="gjbf1w1gssuy4vmn0tdcsds2pl6diikuxv1fkqe24jmmt60x"
                        :init="{
                            plugins:
                                'lists link image table code help wordcount',
                        }"
                        v-model="form.content"
                    />
                    <div
                        class="text-xs px-1 text-red-600"
                        v-if="errors.content"
                    >
                        {{ errors.content }}
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
                <div v-if="updateMode" class="flex justify-strat">
                    <div
                        v-if="this.imageBaru != null"
                        class="flex justify-between gap-2"
                    >
                        <img
                            class="rounded-md max-w-sm max-h-60"
                            :src="imagesShow(this.imageBaru)"
                            alt=""
                        />
                    </div>
                </div>
                <div v-else>
                    <img
                        v-if="this.imageBaru != null"
                        class="rounded-md max-w-sm max-h-60"
                        :src="imagesShow(this.imageBaru)"
                        alt=""
                    />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-700">Images Content</label>
                    <input
                        class="text-sm"
                        type="file"
                        @input="
                            form.image = $event.target.files[0];
                            uploadFoto();
                        "
                    />
                    <div class="text-xs px-1 text-red-600" v-if="errors.image">
                        {{ errors.image }}
                    </div>
                </div>

                <div class="flex w-full justify-around gap-3" v-if="updateMode">
                    <button
                        class="flex-1 bg-yellow-400 hover:bg-yellow-700 text-white py-1 rounded-md drop-shadow-sm"
                        type="submit"
                    >
                        Update
                    </button>
                    <button
                        class="flex-1 bg-red-400 hover:bg-red-700 text-white py-1 rounded-md drop-shadow-sm"
                        type="button"
                        @click="deleteButton(this.singelData[0].id)"
                    >
                        Delete
                    </button>
                </div>

                <button
                    v-else
                    class="bg-blue-400 hover:bg-blue-700 text-white py-1 rounded-md drop-shadow-sm"
                    type="submit"
                >
                    Buat Data
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import DashboardLayout from "../../Layouts/DashboardLayout.vue";
import TitlePages from "../../Widgets/TitlePages.vue";
import { useForm, router } from "@inertiajs/vue3";
import Editor from "@tinymce/tinymce-vue";

export default {
    name: "Create",
    data() {
        return {
            modal: false,
            updateMode: false,
            imageBaru: null,
            singelData: [],
            image: "",
        };
    },
    components: {
        TitlePages,
        DashboardLayout,
        Editor,
    },
    props: {
        errors: Object,
    },
    setup() {
        const form = useForm({
            title: "",
            content: "Isi Content",
            image: "",
            meta_title: "",
            meta_description: "",
            meta_keyword: "",
        });

        return { form };
    },
    layout: DashboardLayout,
    methods: {
        uploadFoto() {
            this.imageBaru = this.form.image;
        },
        imagesShow(img) {
            return URL.createObjectURL(img);
        },
    },
};
</script>

<style lang="scss" scoped></style>
