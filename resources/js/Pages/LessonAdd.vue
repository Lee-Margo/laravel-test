<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import mandarin from '/images/mandarin.jpg';
import NavLink from '@/Components/NavLink.vue';
export default{
    components:{
        Head,
        AuthenticatedLayout,
        NavLink,
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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">儀表板</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    
                    <div>
                        121231231

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
                            <tr>
                                <td class="border border-slate-400">1</td>
                                <td class="border border-slate-400">國語</td>
                                <td class="border border-slate-400">
                                    <img :src="mandarin" alt="">
                                </td>
                                <td class="border border-slate-400">
                                    <button class="bg-blue-500 text-white p-2 m-2 rounded-md">編輯</button>
                                    <button class="bg-red-500 text-white p-2 m-2 rounded-md">刪除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-slate-400">2</td>
                                <td class="border border-slate-400">英語</td>
                                <td class="border border-slate-400">Tony</td>
                                <td class="border border-slate-400">
                                    <button class="bg-blue-500 text-white p-2 m-2 rounded-md">編輯</button>
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
