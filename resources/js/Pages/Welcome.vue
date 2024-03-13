<script>
import { Head, Link } from '@inertiajs/vue3';
import school from '/images/school.png';
export default{
    components:{
        Head,
        Link,
    },
    data(){
        return{
            school:school,
        }
    },
}
</script>

<template class="w-full h-screen flex">
    <Head title="Welcome" />
        <div class="p-6 text-end">
            <Link
                :href="route('login')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >登入</Link>

            <Link
                :href="route('register')"
                class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >註冊</Link>
        </div>

        <div class="flex justify-center items-center flex-col m-4">
            <img :src="school" alt="" class="w-[180px] h-[180px]">
            <div class="text-center mt-5">
                <div class="mb-4 flex text-center h-[38px]">
                    <select class="block appearance-none w-1/2 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mr-5" id="class">
                    <option>113學年度上學期</option>
                    <option>113學年度下學期</option>
                    </select>
                    <label class="leading-[38px] text-gray-700 text-sm font-bold mb-2" for="class">
                        <p>學期課表</p>
                    </label>
                </div>

                <table class="w-[800px] text-center border-collapse border border-slate-400">
                <thead>
                    <tr>
                        <th class="border border-slate-400">序號</th>
                        <th class="border border-slate-400">課程名稱</th>
                        <th class="border border-slate-400">授課教師</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-slate-400">1</td>
                        <td class="border border-slate-400">數學</td>
                        <td class="border border-slate-400">Kevin</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400">2</td>
                        <td class="border border-slate-400">英語</td>
                        <td class="border border-slate-400">Tony</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>

</template>