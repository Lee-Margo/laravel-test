<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import mandarin from '/images/mandarin.jpg';
import PublicBtn from '@/Components/PublicBtn.vue';
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
        }
    },
    data() {
        return {
            mandarin: mandarin,
            name: '',
            description: '',
            image: '',
            imageUrl: null,
        }
    },
    methods: {
        uploadImg(e) {
            this.image = e.target.files[0];
            // Preview the image immediately after selecting
            this.imageUrl = URL.createObjectURL(this.image);
        },
        addLesson() {
            this.$inertia.post('/lesson-1', {
                name: this.name,
                description: this.description,
                image: this.image,
            },
                {
                    onSuccess: (res) => {
                        const msg = res.props.flash.message;
                        alert(msg);
                    },
                });
            this.name = '';
            this.description = '';
            this.image = '';
            this.imageUrl = null;
        },
    },
}
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">新增課程</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <form class="">
                        <ul>
                            <li class="flex flex-col">
                                <label for="name">課程名稱</label>
                                <input id="name" type="text" class="mb-2" v-model="name">
                            </li>
                            <li class="flex flex-col">
                                <label for="description">課程簡介</label>
                                <input id="description" type="text" class="mb-2" v-model="description">
                            </li>
                            <li class="flex flex-col">
                                <label for="img">課程照片</label>
                                <div class="relative">
                                    <a v-if="imageUrl"
                                        class="mb-2 bg-white relative flex items-center justify-center rounded-lg"
                                        style="height: 300px;">
                                        <img :src="imageUrl" alt="" class="max-h-full max-w-full">
                                        <input id="img" type="file" accept="image/*"
                                            class="absolute top-0 left-0 opacity-0 cursor-pointer" @change="uploadImg" style="height: 300px; width:100%;">
                                    </a>
                                    <a v-else
                                        class="mb-2 bg-gray-200 relative flex items-center justify-center rounded-lg"
                                        style="height: 300px;">
                                        點擊上傳圖片
                                        <input id="img" type="file" accept="image/*"
                                            class="absolute top-0 left-0 opacity-0 cursor-pointer" @change="uploadImg" style="height: 300px; width:100%;">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </form>
                    <div class="flex justify-center">
                        <Link :href="route('dashboard_2')" :active="route().current('dashboard_2')">
                        <PublicBtn bg-color="bg-slate-500" content="返回列表"></PublicBtn>
                        </Link>
                        <PublicBtn bg-color="bg-blue-500" content="儲存" @click="addLesson"></PublicBtn>
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