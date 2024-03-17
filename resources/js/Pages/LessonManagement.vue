<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
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


        }
    },
    methods: {
        getImagePath(filename) {
            return new URL('../../' + filename, import.meta.url).href;
        },
        editBook(lesson) {
            this.$inertia.post('/lesson-edit-1', {
                id: lesson.lesson_id,
                name: lesson.lesson_name,
                description: lesson.lesson_description,
                image: lesson.lesson_picture,
            });
        },
    },
}
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">課程列表</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div>
                        <Link :href="route('lessonAdd')" :active="route().current('lessonAdd')">
                        <PublicBtn bg-color="bg-green-500" content="新增"></PublicBtn>
                        </Link>
                    </div>
                    <table class="w-full text-center border-collapse border border-slate-400">
                        <thead>
                            <tr>
                                <th class="border border-slate-400">序號</th>
                                <th class="border border-slate-400">課程名稱</th>
                                <th class="border border-slate-400">課程照片</th>
                                <th class="border border-slate-400">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="lesson in response.lessons" :key="lesson.lesson_id">
                                <td class="border border-slate-400">{{ lesson.lesson_id }}</td>
                                <td class="border border-slate-400">{{ lesson.lesson_name }}</td>
                                <td class="border flex justify-center">
                                    <img :src="getImagePath(lesson.lesson_picture)" class="border-0"
                                        style="height: 150px;">
                                </td>
                                <td class="border border-slate-400">
                                    <PublicBtn bg-color="bg-blue-500" content="編輯" @click="editBook(lesson)"></PublicBtn>
                                    <button class="bg-red-500 text-white p-2 m-2 rounded-md">刪除</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
