<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import mandarin from '/images/mandarin.jpg';
import PublicBtn from '@/Components/PublicBtn.vue';
export default{
    components:{
        Head,
        AuthenticatedLayout,
        Link,
        PublicBtn,
    },
    data(){
        return{
            mandarin:mandarin,
        }
    },
}
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">編輯教師</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    
                    <div>
                        <Link :href="route('teacherAdd')" :active="route().current('teacherAdd')">
                            <PublicBtn bg-color="bg-green-500" content="新增"></PublicBtn>
                        </Link>

                    </div>
                    
                    
                    <table class="w-full text-center border-collapse border border-slate-400">
                        <thead>
                            <tr>
                                <th class="border border-slate-400">序號</th>
                                <th class="border border-slate-400 w-2/3">教師姓名</th>
                                <th class="border border-slate-400">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-slate-400">1</td>
                                <td class="border border-slate-400">Stanley</td>
                                <td class="border border-slate-400">
                                    <Link :href="route('teacherEdit')" :active="route().current('teacherEdit')">
                                        <PublicBtn bg-color="bg-blue-500" content="編輯"></PublicBtn>
                                    </Link>
                                    <button class="bg-red-500 text-white p-2 m-2 rounded-md">刪除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-slate-400">2</td>
                                <td class="border border-slate-400">Tony</td>
                                <td class="border border-slate-400">
                                    <Link :href="route('teacherEdit')" :active="route().current('teacherEdit')">
                                        <PublicBtn bg-color="bg-blue-500" content="編輯"></PublicBtn>
                                    </Link>
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
