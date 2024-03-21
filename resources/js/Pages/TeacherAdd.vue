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
            form:{
                courseId:'',
                name:'',
                description:'',

            }
        }
    },
    methods:{
        this.$inertia.post(route('teacher.store'))
    },
}
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">新增教師</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form action="">
                        <ul>
                            <li class="flex flex-col mb-2">
                                <label for="lesson">課程</label>
                                <select class="block appearance-none w-1/5 bg-white border border-gray-400 hover:border-gray-500 rounded shadow leading-tight focus:outline-none focus:shadow-outline" id="class">
                                    <option value="">請選擇課程</option>
                                    <option>113學年度上學期</option>
                                    <option>113學年度下學期</option>
                                </select>
                            </li>
                            <li class="flex flex-col">
                                <label for="name">教師姓名</label>
                                <input id="name" type="text" class="mb-2">
                            </li>
                            <li class="flex flex-col">
                                <label for="description">教師簡介</label>
                                <input id="description" type="text" class="mb-2">
                            </li>
                        </ul>
                    </form>
                    <div class="flex justify-center">
                        <Link :href="route('TeacherManagement')" :active="route().current('TeacherManagement')">
                            <PublicBtn bg-color="bg-slate-500" content="返回列表"></PublicBtn>
                        </Link>
                        
                        <PublicBtn bg-color="bg-blue-500" content="儲存"></PublicBtn>
                    </div>
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
li a input{
    opacity: 0;
}
</style>