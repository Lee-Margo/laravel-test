<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PublicBtn from '@/Components/PublicBtn.vue';
// import NavLink from '@/Components/NavLink.vue';
export default {
    components: {
        Head,
        AuthenticatedLayout,
        Link,
        PublicBtn,
    },
    props: {
        response: {
            type: Object,
        },
    },
    data() {
        return {
            imageUrl:null,
        }
    },
    methods: {
        getImagePath(filename) {
            return new URL('../../' + filename, import.meta.url).href;
        },
        uploadImg(e) {
            this.response.image = e.target.files[0];
            // Preview the image immediately after selecting
            this.imageUrl = URL.createObjectURL(this.response.image);
        },
        editLesson(){
            this.$inertia.post('/lesson-edit-2', {
                lesson_id: this.response.lesson_id,
                name: this.response.name,
                description: this.response.description,
                image: this.response.image,
            });
        },
    },
}
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">編輯課程</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form action="">
                        <ul>
                            <li class="flex flex-col">
                                <label for="name">課程名稱</label>
                                <input id="name" type="text" class="mb-2" v-model="response.name">
                            </li>
                            <li class="flex flex-col">
                                <label for="description">課程簡介</label>
                                <input id="description" type="text" class="mb-2" v-model="response.description">
                            </li>
                            <li class="flex flex-col">
                                <label for="img">課程照片</label>
                                <div class="relative">
                                    <a v-if="imageUrl"
                                        class="mb-2 bg-white relative flex items-center justify-center rounded-lg"
                                        style="height: 300px;">
                                        <img :src="imageUrl" alt="" class="max-h-full max-w-full">
                                        <input id="img" type="file" accept="image/*"
                                            class="absolute top-0 left-0 opacity-0 cursor-pointer" @change="uploadImg"
                                            style="height: 300px; width:100%;">
                                    </a>
                                    <a v-else class="mb-2 bg-white relative flex items-center justify-center rounded-lg"
                                        style="height: 300px;">
                                        <img :src="getImagePath(response.image)" alt="" class="max-h-full max-w-full">
                                        <input id="img" type="file" accept="image/*"
                                            class="absolute top-0 left-0 opacity-0 cursor-pointer" @change="uploadImg"
                                            style="height: 300px; width:100%;">
                                    </a>
                                </div>

                            </li>
                        </ul>
                    </form>
                    <div class="flex justify-center">
                        <Link :href="route('dashboard_2')" :active="route().current('dashboard_2')">
                        <PublicBtn bg-color="bg-slate-500" content="返回列表"></PublicBtn>
                        </Link>

                        <PublicBtn bg-color="bg-blue-500" content="儲存" @click="editLesson"></PublicBtn>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
li a input {
    opacity: 0;
}
</style>