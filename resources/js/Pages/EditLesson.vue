<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import mandarin from '/images/mandarin.jpg';
import PublicBtn from '@/Components/PublicBtn.vue';
// import NavLink from '@/Components/NavLink.vue';
export default{
    components:{
        Head,
        AuthenticatedLayout,
        Link,
        PublicBtn,
        // NavLink,
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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">編輯課程</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form action="">
                        <ul>
                            <li class="flex flex-col">
                                <label for="name">課程名稱</label>
                                <input id="name" type="text" class="mb-2">
                            </li>
                            <li class="flex flex-col">
                                <label for="description">課程簡介</label>
                                <input id="description" type="text" class="mb-2">
                            </li>
                            <li class="flex flex-col">
                                <label for="img">課程照片</label>
                                <a class="mb-2 relative bg-gray-200 h-[150px] w-1/3 text-center leading-[150px] text-gray-500">點擊上傳圖片
                                    <img :src="mandarin" alt="" class="absolute top-0">
                                    <input id="img" type="file" accept="image/*" class="absolute left-0 h-[150px] w-full cursor-pointer">
                                </a>
                            </li>
                        </ul>
                    </form>
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

<style>
li a input{
    opacity: 0;
}
</style>