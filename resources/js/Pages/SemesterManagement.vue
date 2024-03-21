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
    data() {
        return {
            mandarin: mandarin,
        }
    },
    methods: {
        sendEmail() {
            this.$inertia.get(route('send.mail'));
        }
    }
}
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">課表列表</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                    <div>
                        <Link :href="route('semesterAdd')" :active="route().current('semesterAdd')">
                        <PublicBtn bg-color="bg-green-500" content="新增"></PublicBtn>
                        </Link>

                    </div>


                    <table class="w-full text-center border-collapse border border-slate-400">
                        <thead>
                            <tr>
                                <th class="border border-slate-400">序號</th>
                                <th class="border border-slate-400 w-1/3">學年</th>
                                <th class="border border-slate-400 w-1/3">學期</th>
                                <th class="border border-slate-400">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-slate-400">1</td>
                                <td class="border border-slate-400">113</td>
                                <td class="border border-slate-400">上</td>
                                <td class="border border-slate-400">

                                    <PublicBtn bg-color="bg-green-500" content="寄送" @click="sendEmail"></PublicBtn>

                                    <Link :href="route('semesterEdit')" :active="route().current('semesterEdit')">
                                    <PublicBtn bg-color="bg-blue-500" content="編輯"></PublicBtn>
                                    </Link>
                                    <Link :href="route('semesterEdit')" :active="route().current('semesterEdit')">
                                    <PublicBtn bg-color="bg-red-500" content="刪除"></PublicBtn>
                                    </Link>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-slate-400">2</td>
                                <td class="border border-slate-400">113</td>
                                <td class="border border-slate-400">下</td>
                                <td class="border border-slate-400">

                                    <PublicBtn bg-color="bg-green-500" content="寄送" @click="sendEmail"></PublicBtn>

                                    <Link :href="route('semesterEdit')" :active="route().current('semesterEdit')">
                                    <PublicBtn bg-color="bg-blue-500" content="編輯"></PublicBtn>
                                    </Link>
                                    <Link :href="route('semesterEdit')" :active="route().current('semesterEdit')">
                                    <PublicBtn bg-color="bg-red-500" content="刪除"></PublicBtn>
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
