<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import leftArrow from '/images/left_arrow.png';
import rightArrow from '/images/right_arrow.png';
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
            leftArrow: leftArrow,
            rightArrow: rightArrow,
        }
    },
}
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">新增課表</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex w-full mb-4">
                        <div class="flex flex-col w-1/2 mr-1">
                            <label for="year">學年度</label>
                            <input id="year" type="text" class="mb-2 border-slate-300">
                        </div>
                        <div class="flex flex-col w-1/2 ml-1">
                            <label for="semester">學期</label>
                            <input id="semester" type="text" class="mb-2 border-slate-300">
                        </div>
                    </div>
                    <div class="flex w-full mb-4">
                        <table class="w-full text-center border-collapse rounded-md h-[400px]">
                            <thead class=" border-2 border-black">
                                <tr>
                                    <th colspan="2" class=" bg-gray-300 py-1">全部課程</th>
                                </tr>
                            </thead>
                            <tbody class="border-2 border-black ">
                                <tr class=" bg-gray-300 font-bold border-2 border-black h-[20px]">
                                    <td class="py-1">課程</td>
                                    <td class="py-1">教師</td>                                
                                </tr>
                                <tr class="border border-b-slate-200 h-[20px]">
                                    <td class="py-1">國語</td>
                                    <td class="py-1">Stanley</td>
                                </tr>
                                <tr class="border border-b-slate-200 h-[20px]">
                                    <td class="py-1">英語</td>
                                    <td class="py-1">Tony</td>
                                </tr>
                                <tr>
                                </tr>

                            </tbody>
                        </table>
                        <div class="flex flex-col justify-center align-middle flex-wrap content-center">
                            <img :src="leftArrow" alt="" class="w-1/2 m-4 mb-6 cursor-pointer">
                            <img :src="rightArrow" alt="" class="w-1/2 m-4 mt-6 cursor-pointer">
                        </div>

                        <table class="w-full text-center border-collapse rounded-md h-[400px]">
                            <thead class=" border-2 border-black">
                                <tr>
                                    <th colspan="2" class=" bg-gray-300 py-1">全部課程</th>
                                </tr>
                            </thead>
                            <tbody class="border-2 border-black ">
                                <tr class=" bg-gray-300 font-bold border-2 border-black h-[20px]">
                                    <td class="py-1">課程</td>
                                    <td class="py-1">教師</td>                                
                                </tr>                                
                                <tr>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- button -->
                    <div class="flex justify-center">
                        <Link :href="route('dashboard_2')" :active="route().current('dashboard_2')">
                            <PublicBtn bg-color="bg-slate-500" content="返回列表"></PublicBtn>
                        </Link>
                        
                        <PublicBtn bg-color="bg-blue-500" content="儲存"></PublicBtn>
                    </div>


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
